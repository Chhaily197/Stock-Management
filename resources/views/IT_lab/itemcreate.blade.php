<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/quill/quill.snow.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/quill/quill.bubble.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/vendor/remixicon/remixicon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/quill/quill.bubble.css') }}">
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>
<style>
    .image_display img {
        width: 200px;
        margin: auto !important;
        border: 1px solid black;
    }

    .image_display {
        width: 200px;
        padding: 10px;
        margin: 10px;
        cursor: pointer;
    }
</style>

<body>
    <div class="container p-5">
        <form action="create_item" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <h1>Create Item</h1>
                <div class="mb-3">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <div class="image_display" id="image_dis">


                                {{-- pic show  --}}
                                <p><img id="previewimage" style="display:none;" /></p>
                                @if ($path = Session::get('path'))
                                    <img class="w-100" src="{{ $path }}" style="width: 10px" />
                                @else
                                    <img class="w-100" id="pic_box"
                                        src="https://static.vecteezy.com/system/resources/previews/006/998/435/original/photo-camera-icons-photo-camera-icon-design-illustration-photo-camera-simple-sign-photo-camera-logo-free-vector.jpg"
                                        style="width: 10px" />
                                @endif
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            {{-- category  --}}
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Category</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="category_id" required>
                                        {{-- <option selected>Open this select menu</option> --}}
                                        @foreach ($itlab_categories as $cat)
                                            <option value="{{ $cat->category_id }}">{{ $cat->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        {{-- model  --}}
                        <div class="col-12 col-md-6">
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">ModelName</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="model_name" required>
                                </div>
                            </div>
                        </div>
                        {{-- brand name  --}}
                        <div class="col-12 col-md-6">
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">brand</label>
                                <div class="col-sm-10 d-flex">
                                    <select class="form-select" aria-label="Default select example" name="brand"
                                        id="brand_in_db">
                                        {{-- <option selected>Open this select menu</option> --}}
                                        @foreach ($brand as $brands)
                                            <option value="{{ $brands->brand_name }}">{{ $brands->brand_name }}</option>
                                        @endforeach
                                    </select>
                                    <input id="brand_create" type="text" class="form-control" name="">

                                    <a class="btn btn-success ms-2" id="brandbtn">Create</a>
                                </div>
                            </div>
                        </div>
                        {{-- dec  --}}
                        <div class="col-12 col-md-6">
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="description" required>
                                </div>
                            </div>
                        </div>
                        {{-- qty  --}}
                        <div class="col-12 col-md-6">
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Qty</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="qty" required>
                                </div>
                            </div>
                        </div>
                        {{-- Unit --}}
                        <div class="col-12 col-md-6">
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Unit</label>
                                <div class="col-sm-10 d-flex">
                                    <select class="form-select" aria-label="Default select example" name="unit"
                                        id="unit_in_db">
                                        {{-- <option selected>Open this select menu</option> --}}
                                        @foreach ($unit as $units)
                                            <option value="{{ $units->unit }}">{{ $units->unit }}</option>
                                        @endforeach
                                    </select>
                                    <input id="unit_create" type="text" class="form-control" name="">

                                    <a class="btn btn-success ms-2" id="unitbtn">Create</a>
                                </div>
                            </div>
                        </div>
                        {{-- unit price --}}
                        <div class="col-12 col-md-6">
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Unit Price</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="unit_price" required>
                                </div>
                            </div>
                        </div>
                        {{-- image  --}}
                        <div class="col-12 col-md-6 d-none">
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Unit Price</label>
                                <div class="col-sm-10">
                                    <input type="file" accept=".jpg , .jpeg , .png , .gif" name="profile_image"
                                        class="image form-control"  id="pic_show" required/>
                                </div>
                            </div>
                        </div>

                        {{-- ====================== --}}
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <a href="{{ URL::to('item') }}" class="btn btn-secondary m-2">Close</a>
                <button type="submit" class="btn btn-primary m-2">Create</button>
            </div>
        </form>
    </div>




    @if (!session()->has('username'))
        <script>
            window.location.href = '/'
        </script>
    @endif
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        jQuery(function($) {

            var p = $("#previewimage");

            $('#image_dis').click(function() {
                $('#pic_show').click();
                // alert('hello');
            });
            $("body").on("change", ".image", function() {
                var imageReader = new FileReader();
                imageReader.readAsDataURL(document.querySelector(".image").files[0]);

                imageReader.onload = function(oFREvent) {
                    p.attr('src', oFREvent.target.result).fadeIn();
                    $('#pic_box').hide();
                };
            });
        //    ------------------- unit --------------
            $('#unit_create').hide();
            var unitbtn_valid = false;
            $('#unitbtn').click(function() {
                if (unitbtn_valid == false) {
                    $('#unit_create').show();
                    $('#unit_in_db').hide();
                    unitbtn_valid = true;
                    $('#unitbtn').html('Select');
                    $('#unit_create').attr('name','unit');
                    $('#unit_in_db').attr('name','none');
                }else{
                    $('#unit_create').hide();
                    $('#unit_in_db').show();
                    unitbtn_valid = false;
                    $('#unitbtn').html('Create');
                    $('#unit_create').attr('name','none');
                    $('#unit_in_db').attr('name','unit');


                };

            });
            // ------------ brand ----------------
            $('#brand_create').hide();
            var brandbtn_valid = false;
            $('#brandbtn').click(function() {
                if (brandbtn_valid == false) {
                    $('#brand_create').show();
                    $('#brand_in_db').hide();
                    brandbtn_valid = true;
                    $('#brandbtn').html('Select');
                    $('#brand_create').attr('name','brand');
                    $('#brand_in_db').attr('name','none');
                }else{
                    $('#brand_create').hide();
                    $('#brand_in_db').show();
                    brandbtn_valid = false;
                    $('#brandbtn').html('Create');
                    $('#brand_create').attr('name','none');
                    $('#brand_in_db').attr('name','brand');


                };

            });
        });
    </script>






    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>
