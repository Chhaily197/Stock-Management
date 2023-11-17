@include('IT_lab.side.header');
<script>
    var sub = 0;
    var id = 0;
    var Subtrace = 0;

    function addmoredata(id, data) {
        // alert(id + ' ' + data);
        id = id;
        sub = data;
        var itemid = document.getElementById('itemid');
        var itemid2 = document.getElementById('itemid2');
        itemid.value = id;
        itemid2.value = id;
        var thedata = document.getElementById('data');
        thedata.value = data;
    }
</script>

<body onload="autoClick();">

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script> --}}
    @include('IT_lab.side.side_bar');

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Item</h1>
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
            <div class="card">
                <div class="card-body bg-light">
                    <div class="row p-2">
                        {{-- button  --}}
                        <div class="col-12 p-2 px-5 d-block justify-content-end">
                            <div class="d-flex justify-content-end">
                                <input type="button" class="btn btn-success m-1 show_hs" id="edit_btn" value="Edit"
                                    data-bs-toggle="modal" data-bs-target="#edit_form">
                                @if (session('admin_id'))
                                    <input type="button" class="btn btn-danger  m-1 show_hs" id="delete"
                                        value="Delete" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                @endif
                            </div>
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-primary m-1" type="button" data-bs-toggle="modal"
                                    data-bs-target="#update"
                                    onclick="addmoredata({{ $lab_item->item_id }},{{ $lab_item->qty_instocked }})">
                                    <i class="ri ri-add-fill"></i>
                                </button>
                                <button type="button" class="btn btn-primary m-1" data-bs-toggle="modal"
                                    data-bs-target="#substract"
                                    onclick="addmoredata({{ $lab_item->item_id }},{{ $lab_item->qty_instocked }})">
                                    <i class="ri ri-subtract-fill fw-bold"></i>

                                </button>
                            </div>
                            {{-- <input type="button" onclick="window.print();" class="btn btn-danger  m-1 show_hs" id="print" value="Print"> --}}
                        </div>
                        {{-- ------- --}}
                        <div class="col-12">
                            <div class="row g-0 imageshow">
                                <div class="col-md-4">
                                    <img src="{{ asset('itlab_img_upload/' . $lab_item->image_url) }}"
                                        class="img-fluid rounded-start" alt="...">
                                    {{-- {{$lab_item->image}}
                                         --}}
                                    {{-- @dd($lab_item->image) --}}
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h3 class="text-dark">Model Name : <span class="text-secondary" id="modelname">
                                                {{ $lab_item->item_model_name }} </span></h3>
                                        <p class="card-text">Description : {{ $lab_item->item_description }}.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- -------------- --}}
                        {{-- <div class="col-12 d-flex justify-content-center p-2">
                            <div class="w-25 d-flex justify-content-center">
                                <img class="w-50 border border-1 border-secondary rounded-1" src="{{ asset('itlab_img_upload/' . $lab_item->image_url) }}" alt="{{$lab_item->image_url}}">
                              
                            </div>    
                            </div> --}}


                        {{-- Item --}}
                        <div class="col-12 col-md-6 p-2 px-5">
                            <label for="" class="my-2">Item Code</label>
                            <h5 class="border rounded-2 p-2 text-secondary fs-6" class="item_id">
                                {{ $lab_item->item_code }} </h5>
                        </div>
                        {{-- category  --}}
                        <div class="col-12 col-md-6 p-2 px-5">
                            <label for="" class="my-2">Category</label>
                            <h5 class="border rounded-2 p-2 text-secondary fs-6  show_hs">
                                {{ $lab_item->category_name }} </h5>

                        </div>
                        {{-- model name --}}
                        {{-- <div class="col-12 col-md-6 p-2 px-5">
                                <label for="" class="my-2">Model Name</label>
                                <h5 class="border rounded-2 p-2 text-secondary fs-6 show_hs">
                                    {{ $lab_item->item_model_name }} </h5>

                            </div> --}}
                        {{-- = --}}
                        <div class="col-12 col-md-6 p-2 px-5">
                            <label for="" class="my-2">Brand Name</label>
                            <h5 class="border rounded-2 p-2 text-secondary fs-6 show_hs">
                                {{ $lab_item->brands }} </h5>


                        </div>
                        {{-- dec --}}
                        {{-- <div class="col-12 col-md-6 p-2 px-5">
                                <label for="" class="my-2">Description</label>
                                <h5 class="border rounded-2 p-2 text-secondary fs-6 show_hs">
                                    {{ $lab_item->item_description }} </h5>


                            </div> --}}
                        {{-- = --}}
                        <div class="col-12 col-md-6 p-2 px-5">
                            <label for="" class="my-2">Qty instocked</label>
                            <h5 class="border rounded-2 p-2 text-secondary fs-6"> {{ $lab_item->qty_instocked }}
                            </h5>
                        </div>
                        {{-- = --}}
                        <div class="col-12 col-md-6 p-2 px-5">
                            <label for="" class="my-2">Qty was removed</label>
                            <h5 class="border rounded-2 p-2 text-secondary fs-6"> {{ $lab_item->qty_was_removed }}
                            </h5>
                        </div>
                        {{-- = --}}
                        <div class="col-12 col-md-6 p-2 px-5">
                            <label for="" class="my-2">Qty all</label>
                            <h5 class="border rounded-2 p-2 text-secondary fs-6"> {{ $lab_item->qty_all }} </h5>
                        </div>
                        {{-- = --}}
                        <div class="col-12 col-md-6 p-2 px-5">
                            <label for="" class="my-2">Unit</label>
                            <h5 class="border rounded-2 p-2 text-secondary fs-6 show_hs"> {{ $lab_item->unit }}
                            </h5>

                        </div>
                        {{-- = --}}
                        <div class="col-12 col-md-6 p-2 px-5">
                            <label for="" class="my-2">Unit price</label>
                            <h5 class="border rounded-2 p-2 text-secondary"> {{ $lab_item->unit_price }} $</h5>

                        </div>
                        <div class="col-12 p-2 px-5" id="">
                            <div id="htmlContent" class="bg-light p-5 overflow-hidden">
                                <label for="" class="my-2">Barcode</label>
                                {!! DNS1D::getBarcodeHTML($lab_item->item_code, 'C39', 2, 50) !!}
                                {{ $lab_item->item_code }}
                            </div>
                            <a id="download" class="btn btn-success">Download Barcode</a>
                        </div>
                    </div>

                </div>

            </div>
    </main><!-- End #main -->
    <!-- Modal -->
    <div class="modal fade" id="edit_form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- <form action="{{ route('display.update', ['display' => $lab_item->item_id]) }}" method="POST"  enctype="multipart/form-data"> --}}
                    <form action="{{ route('display.update', $lab_item->item_id) }}" method="POST"
                        enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        @method('PATCH')
                        @csrf
                        <div class="">
                            {{-- category  --}}
                            <label for="" class="my-2">Image</label>
                            <input type="file" accept=".jpg , .jpeg , .png , .gif" name="profile_image"
                                class="image form-control" id="pic_show" />
                            <label for="" class="my-2">Category</label>
                            <select name="select_category" id="select_category" class="form-control">
                                <option selected value="{{ $lab_item->category_id }}">
                                    {{ $lab_item->category_name }}</option>
                                @foreach ($itlab_categories as $cat)
                                    @if ($cat->category_id != $lab_item->category_id)
                                        <option value="{{ $cat->category_id }}">{{ $cat->category_name }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                            {{-- model  --}}
                            <label for="" class="my-2">Model Name</label>
                            <input type="text" name="ModelName" class="form-control edit_hs"
                                value="{{ $lab_item->item_model_name }}">
                            {{-- brand name  --}}
                            <label for="" class="my-2">Brand Name</label>

                            <select name="BrandName" id="select_brandname" class="form-control edit_hs">
                                <option selected value="{{ $lab_item->brand_name }}">{{ $lab_item->brands }}
                                </option>
                                @foreach ($brand as $brand_item)
                                    @if ($brand_item->brand_id != $lab_item->brand_name)
                                        <option value="{{ $brand_item->brand_id }}">{{ $brand_item->brand_name }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                            {{-- dec  --}}
                            <label for="" class="my-2">Description</label>
                            {{ $lab_item->item_description }} </h5>
                            <input name="dec" type="text" class="form-control edit_hs"
                                value="{{ $lab_item->item_description }}">
                            {{-- uit  --}}
                            <label for="" class="my-2">Unit</label>
                            <select name="unit" id="select_category" class="form-control edit_hs">
                                <option selected value="{{ $lab_item->unit_id }}">{{ $lab_item->unit }}
                                </option>
                                @foreach ($unit as $units)
                                    @if ($units->unit_id != $lab_item->unit_id)
                                        <option value="{{ $units->unit_id }}">{{ $units->unit }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                            {{-- unit price  --}}
                            <label for="" class="my-2">Unit price</label>
                            <input type="text" name="unitprice" class="form-control"
                                value="{{ $lab_item->unit_price }}">
                        </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Save changes">
                </div>
                </form>

            </div>
        </div>
    </div>

    </section>


    {{-- delete  --}}
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <h5>You Realy want to delete it</h5>

                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="{{ URL::to('item_delete/' . $lab_item->item_id) }}" class="btn btn-danger">Delete</a>

                </div>
            </div>
        </div>
    </div>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    {{-- ============================================= --}}
    {{-- addmore  --}}
    <div class="modal fade" id="update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">in Stock</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ URL::to('item_sum') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="my-3"><label for="form-control">How many you want to add More</label></div>

                        <input type="number" class="form-control" name="unit_upadte" id="addmore" required>
                        <input type="hidden" class="form-control" name="itemid" id="itemid">
                        {{-- <input type="hidden" class="form-control" name="data" id="data"> --}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="add_item" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- substract  --}}
    <div class="modal fade" id="substract" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Out Stock</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ URL::to('item_sub') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="my-3"><label for="form-control">How many you want to Out stock</label></div>

                        <input type="number" class="form-control" name="unit_upadte" id="addmore" required>
                        <input type="hidden" class="form-control" name="itemid" id="itemid2">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="add_item" class="btn btn-primary">Sub</button>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
    <script type="text/javascript">
        function autoClick() {
            $("#download").click();
        }

        $(document).ready(function() {
            var element = $("#htmlContent");
            var modelname = $('#modelname').text();
            $("#download").on('click', function() {

                html2canvas(element, {
                    onrendered: function(canvas) {
                        var imageData = canvas.toDataURL("image/jpg");
                        var newData = imageData.replace(/^data:image\/jpg/,
                            "data:application/octet-stream");
                        $("#download").attr("download", modelname + ".jpg").attr("href",
                            newData);
                    }
                });

            });
        });
    </script>
    @if (!session()->has('username'))
        <script>
            window.location.href = '/'
        </script>
    @endif
    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js"') }}></script>
</body>

</html>
