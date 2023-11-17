@include('IT_lab.side.header');

<body>
    <script>
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(function() {
            var sub = 0;
            var userid = 0;
            var Subtrace = 0;
            $('#alert_number_valid').hide();
            $('#alert_number_valid_Subtract').hide();

            // add more data 
            $("#tbl tr").on('click', '.edit', function() {

                var current_row = $(this).closest('tr');
                userid = current_row.find("td").eq(0).text();
                sub = current_row.find("td").eq(5).text();
                // alert(unit);
                // $('#unit_upadte').val(unit);
                // $('#unit_id_upadte').val(userid);

            })
            $('#alert_btn_close_numvalid').click(function() {
                $('#alert_number_valid').hide();

            });
            $('#add_item').click(function() {
                var add_more = $('#addmore').val();

                if (!add_more.match(/^\d+/)) {
                    $('#alert_number_valid').show();
                } else {
                    if (add_more > 0) {
                        let sub_int = parseInt(sub);
                        let add_int = parseInt(add_more);
                        // alert(sub_int + add_int);
                        var item_addmore = sub_int + add_int;

                        // alert(sub + add_more);
                        $.post('add_more_qty', {
                            qty: item_addmore,
                            userid: userid,
                            add_int: add_int
                        }, function(data) {
                            // alert(data);
                            if (data == 1) {
                                // alert('Success');
                                location.reload();
                            } else {
                                alert('Error');
                            }
                        })
                    } else {
                        $('#alert_number_valid').show();
                    }
                }
            });
            // ========================================================
            // Subtract items
            $("#tbl tr").on('click', '.delete', function() {

                var current_row = $(this).closest('tr');
                userid = current_row.find("td").eq(0).text();
                Subtrace = current_row.find("td").eq(5).text();


            });
            $('#btn_subtract_1').click(function() {
                // alert('Subtract');
                var substaction = $('#substaction').val();

                if (!substaction.match(/^\d+/)) {
                    $('#alert_number_valid_Subtract').show();
                } else {
                    substaction = parseInt(substaction);
                    if (substaction > 0 && substaction < Subtrace) {
                        // alert('hello');
                        Subtrace = parseInt(Subtrace);
                        // substaction = parseInt(substaction);
                        // alert(Subtrace - substaction);
                        var sub_result = Subtrace - substaction;
                        // alert(sub + add_more);
                        $.post('sub_qty', {
                            sub_result: sub_result,
                            userid: userid,
                            sub: substaction
                        }, function(data) {
                            // alert(data);
                            if (data == 1) {
                                // alert('Success');
                                location.reload();
                            } else {
                                alert('Error');
                            }
                        })
                    } else {
                        $('#alert_number_valid_Subtract').show();
                    }
                }
            });
            $('#alert_btn_close_numvalid_sub').click(function() {
                $('#alert_number_valid_Subtract').hide();

            });
            $('#seaerchbtn').click(function() {
               $hrefhere = $('#hrefdata').val();
               $link = 'displaybarcode/';
               window.location.href = $link + $hrefhere;
            });
        });
       
    </script>

    @include('IT_lab.side.side_bar');

    <main id="main" class="main">
        @if (session('barcode') == 'error')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <h5 class="alert-heading">Alert</h5>
            <h4>
                Brcode not found
            </h4>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @php
            session(['barcode' => 'none']);
        @endphp 
    @endif
        <div class="pagetitle">
            <h1>Items</h1>
            <nav>
                <ol class="breadcrumb">
                    {{-- <li class="breadcrumb-item"><a href="/">Home</a></li> --}}
                    {{-- <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Blank</li> --}}
                </ol>
            </nav>
        </div><!-- End Page Title -->
        {{-- book shop  --}}
        <section class="section">
            <!-- Table with stripped rows -->
            <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                <div class="datatable-top">

                    <div class="p-4">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="bi bi-upc-scan"></i>
                          </button>
                        <a href="{{ URL::to('create_item_page')}} " type="button" class="btn btn-success">
                            create
                        </a>
                    </div>
                </div>
                <div class="datatable-container">
                    <table id="tbl" class="table datatable datatable-table">
                        <thead>
                            <tr>
                                <th data-sortable="true">#</th>
                                <th data-sortable="true">Category</th>
                                <th data-sortable="true">ModelName</th>
                                <th data-sortable="true">BrandName</th>
                                <th data-sortable="true">Qty</th>
                                <th data-sortable="true">Unit</th>
                                <th data-sortable="true">Opt</th>

                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                                
                            @endphp

                            @foreach ($lab_item as $items)
                                <tr data-index="0">
                                    <td class="d-none">
                                        {{ $items->item_id }}
                                    </td>
                                    <td> {{ $i }} </td>
                                    <td> {{ $items->category_name }}</td>
                                    <td> {{ $items->item_model_name }}</td>
                                    <td> {{ $items->brands }}</td>
                                    <td> {{ $items->qty_instocked }}</td>
                                    {{-- <td> {{ $items->qty_instocked }}</td> --}}
                                    <td> {{ $items->unit }}</td>
                                    {{-- <td> {{ $items->item_description }}</td> --}}
                                    <td>
                                        <a type="button" class="btn btn-success edit" data-bs-toggle="modal"
                                            data-bs-target="#update">
                                            <i class="ri ri-add-fill"></i>
                                        </a>
                                        <a type="button" class="btn btn-danger delete" data-bs-toggle="modal"
                                            data-bs-target="#delete_data">
                                            <i class="ri ri-subtract-fill fw-bold"></i>
                                        </a>
                                        <a class="btn btn-primary "
                                            href="{{ URL::to('display_now/' . $items->item_id) }}"><i
                                                class="bi bi-eye-fill"></i></a>
                                        {{-- <a href="/item_view/{{ $items->item_id }}">View</a> --}}
                                    </td>

                                </tr>
                                @php
                                    $i++;
                                    
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                    {!! $lab_item->links() !!}
                </div>

            </div>
            <!-- End Table with stripped rows -->


        </section>

    </main><!-- End #main -->
  
    
    {{-- create unit  --}}
    <div class="modal fade" id="unitcreate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Create unit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="unit_create" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="" class="form-label">unit</label>
                            <input type="text" class="form-control" name="unit" id=""
                                aria-describedby="emailHelpId" placeholder="" name="unit">

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- ============================================= --}}
    {{-- update  --}}
    <!-- Modal -->
    <div class="modal fade" id="update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add More</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="">
                    @csrf
                    <div class="modal-body">
                        <div class="my-3"><label for="form-control">How many you want to add More</label></div>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert"
                            id="alert_number_valid">
                            Please enter a number. the number must bigger then 0.
                            <button type="button" class="btn-close" id="alert_btn_close_numvalid"></button>
                        </div>
                        <input type="number" class="form-control" name="unit_upadte" id="addmore">
                        {{-- <input type="hidden" class="form-control" name="unit_id_upadte" id="unit_id_upadte"> --}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" id="add_item" class="btn btn-primary">Find</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- =============== --}}
    {{-- delete  --}}
    <!-- Modal -->
    <div class="modal fade" id="delete_data" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Subtract</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form>
                    @csrf
                    <div class="modal-body">
                        <div class="my-3"><label for="form-control">How many you want to Subtract</label></div>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert"
                            id="alert_number_valid_Subtract">
                            Please enter a number. <br> the number must bigger then 0. <br> the number must bigger then
                            old QTY.
                            <button type="button" class="btn-close" id="alert_btn_close_numvalid_sub"></button>
                        </div>
                        <input type="number" class="form-control" name="unit_upadte" id="substaction">
                        {{-- <input type="hidden" class="form-control" name="unit_id_upadte" id="unit_id_upadte"> --}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger" id="btn_subtract_1">Sub</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ======= search ======= -->
    <!-- Button trigger modal -->

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Barcode search</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="text" class="from-control" id="hrefdata">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" id="seaerchbtn" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  
{{-- ===================================== --}}

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    @if (!session()->has('username'))
        <script>
            window.location.href = '/'
        </script>
    @endif


    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
</body>

</html>
