@include('IT_lab.side.header');

<body>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(function() {
            // edit data 
            $("#tbl tr").on('click', '.edit', function() {

                var current_row = $(this).closest('tr');
                var userid = current_row.find("td").eq(3).text();
                var unit = current_row.find("td").eq(1).text();
                // alert(unit);
                $('#unit_upadte').val(unit);
                $('#unit_id_upadte').val(userid);

            });
            // delete data 
            $("#tbl tr").on('click', '.delete', function() {

                var current_row = $(this).closest('tr');
                var userid = current_row.find("td").eq(3).text();
                // var unit = current_row.find("td").eq(1).text();
                // alert(unit);
                // $('#unit_upadte').val(unit);
                $('#delete_unit').val(userid);

            });
        });
    </script>

    @include('IT_lab.side.side_bar');

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Log</h1>
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

                    {{-- <div class="p-4">
                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">
                            create
                        </button>
                    </div> --}}
                </div>
                <div class="datatable-container">
                    <table id="tbl" class="table datatable datatable-table">
                        <thead>
                            <tr>
                                <th data-sortable="true">#</th>
                                <th data-sortable="true">UserName</th>
                                <th data-sortable="true">Item_name</th>
                                <th data-sortable="true">In/Out</th>
                                <th data-sortable="true">Qty</th>
                                <th data-sortable="true">Date</th>
                                <th data-sortable="true">Menu</th>

                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp

                            @foreach ($log as $logs)
                                <tr data-index="0">
                                    <td> {{ $logs->log_id }}</td>
                                    <td> {{ $logs->username }}</td>
                                    <td> {{ $logs->item_model_name }}</td>
                                    
                        @if ($logs->in_and_out == 'Out')
                                    
                                        <td class="text-danger"><i class="bi bi-arrow-down-circle-fill"></i> {{ $logs->in_and_out }} </td>
                                    
                                @else
                                        <td class="text-success"><i class="bi bi-arrow-up-circle-fill"></i> {{ $logs->in_and_out }} </td>
                                    
                         @endif
                            
                            </td>
                            <td> {{ $logs->qty }}</td>
                            <td> {{ $logs->date }}</td>
                            <td> 
                                <a class="btn btn-primary "
                                href="{{ URL::to('lab_logview/' . $logs->log_id) }}"><i
                                    class="bi bi-eye-fill"></i></a>
                            </td>

                            </tr>
                            @php
                                $i++;
                                
                            @endphp
                            @endforeach
                        </tbody>
                    </table>
                    {!! $log->links() !!}
                </div>
                <div class="datatable-bottom">
                    <nav class="datatable-pagination">
                        <ul class="datatable-pagination-list"></ul>
                    </nav>
                </div>
            </div>
            <!-- End Table with stripped rows -->


        </section>

    </main><!-- End #main -->
    {{-- create unit  --}}


    <!-- Button trigger modal -->
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Create category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="category_create" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="" class="form-label">category</label>
                            <input type="text" class="form-control" name="category" id=""
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

    {{-- ===================== --}}
    {{-- update  --}}
    <!-- Modal -->
    <div class="modal fade" id="update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="category_update" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="text" class="form-control" name="cate_upadte" id="unit_upadte">
                        <input type="hidden" class="form-control" name="cate_id_upadte" id="unit_id_upadte">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- =============== --}}
    {{-- delete  --}}
    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="delete_data" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="category_delete" method="POST">
                    @csrf
                    <div class="modal-body">
                        <h5>You really want to delete This data</h5>
                    </div>
                    <input type="hidden" id="delete_unit" name="category_id">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- ======= Footer ======= -->


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
