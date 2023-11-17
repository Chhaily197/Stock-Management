<!DOCTYPE html>
<html>

<head>
    @include('Books.link')
    <title>Books</title>
</head>

<body>
    @include('Books.Navbar')
    <main id="main" class="main">
        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-body pb-0">
                         <h2 class="text-primary py-3">Add Book</h2>
                        <form action="{{ route('book.create')}}" method="POST" enctype="multipart/form-data">
                         @csrf
                            <div class="group-form mb-3">
                                <input type="text" name="title" class="form-control" id="title" required
                                    placeholder="Title">
                            </div>
                            <div class="group-form mb-3">
                                <input type="number" name="price" id="price" required class="form-control"
                                    placeholder="Price of book">
                            </div>

                            <div class="group-form mb-3" id="select_major">
                                <div class="d-flex gap-2">
                                <select name="major" id="major" class="form-select">
                                    @foreach ($majors as $mj)
                                        <option value="{{ $mj->major_id }}">{{ $mj->major_name }}</option>
                                    @endforeach
                                </select>
                                <a href="#" class="btn btn-success btn-sm" style="width:200px" id="btncreatemajor">Create</a>
                                </div>
                            </div>

                                <div class="grouo-form mb-3" id="create_major">
                                    <div class="d-flex gap-2">
                                        <input type="text" class="form-control" name="add_major" placeholder="Add Major">
                                        <a class="btn btn-success btn-sm" style="width:200px" id="btnselectmajor">Select</a>
                                    </div>
                                </div>
                            

                            <div class="group-form mb-3" id="select_faculty">
                                <div class="d-flex gap-2">
                                <select name="faculty" id="faculty" class="form-select">
                                    @foreach ($faculty as $fty)
                                        <option value="{{ $fty->faculty_id }}">{{ $fty->faculty_name }}</option>
                                    @endforeach
                                </select>
                                <a href="#" class="btn btn-success btn-sm" style="width:200px" id="btnaddfaculty">Create</a>
                                </div>
                            </div>
                                <div class="grouo-form mb-3" id="create_faculty">
                                    <div class="d-flex gap-2">
                                        <input type="text" class="form-control" name="add_faculty" placeholder="Create Faculty">
                                        <a class="btn btn-success btn-sm" style="width:200px" id="btnselectfaculty">Select</a>
                                    </div>
                                </div>

                            <div class="group-form mb-3" id="select_year">
                                <div class="d-flex gap-2">
                                <select class="form-select" name="year" id="year">
                                    @foreach ($year as $year)
                                        <option value="{{ $year->year_id }}">{{ $year->year_name }}</option>
                                    @endforeach
                                </select>
                                <a href="#" class="btn btn-success btn-sm" style="width:200px" id="btnaddyear">Create</a>
                                </div>
                            </div>
                                <div class="grouo-form mb-3" id="create_year">
                                    <div class="d-flex gap-2">
                                        <input type="text" class="form-control" name="add_year" placeholder="Create Year">
                                        <a class="btn btn-success btn-sm" style="width:200px" id="btnselectyear">Select</a>
                                    </div>
                                </div>

                            <div class="group-form mb-3" id="select_sem">
                                <div class="d-flex gap-2">
                                <select class="form-select" name="semester" id="semester">
                                    @foreach ($semester as $sem)
                                        <option value="{{ $sem->semester_id }}">{{ $sem->semester_name }}</option>
                                    @endforeach
                                </select>
                                <a href="#" class="btn btn-success btn-sm" style="width:200px" id="btnaddsem">Create</a>
                                </div>
                            </div>
                                <div class="grouo-form mb-3" id="create_sem">
                                    <div class="d-flex gap-2">
                                        <input type="text" class="form-control" name="add_sem" placeholder="Create Semester">
                                        <a class="btn btn-success btn-sm" style="width:200px" id="btnselectsem">Select</a>
                                    </div>
                                </div>

                            <div class="group-form mb-3">
                                <input type="number" name="qty" id="qty" required class="form-control"
                                    placeholder="Quantity">
                            </div>
                            <div class="group-form mb-3">
                                <input type="file" name="image" id="image" required class="form-control"
                                    placeholder="Image">
                            </div>
                            <div class="group-form mb-3">
                                <button type="submit" name="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script>
        $(function(){
            $('#create_major').hide();
            $('#create_faculty').hide();
            $('#create_year').hide();
            $('#create_sem').hide();

            $('#btncreatemajor').click(function(){
                $('#major').val('');
                $('#select_major').hide();
                $('#create_major').show();
            });

            $('#btnselectmajor').click(function(){
                $('#select_major').show();
                $('#create_major').hide();
            });

            $('#btnaddfaculty').click(function(){
                $('#faculty').val('');
                $('#select_faculty').hide();
                $('#create_faculty').show();
            });

            $('#btnselectfaculty').click(function(){
                $('#select_faculty').show();
                $('#create_faculty').hide();
            });

            $('#btnaddyear').click(function(){
                $('#year').val('');
                $('#select_year').hide();
                $('#create_year').show();
            });

            $('#btnselectyear').click(function(){
                $('#select_year').show();
                $('#create_year').hide();
            });

            $('#btnaddsem').click(function(){
                $('#semester').val('');
                $('#select_sem').hide();
                $('#create_sem').show();
            });
            $('#btnselectsem').click(function(){
                $('#select_sem').show();
                $('#create_sem').hide();
            });

        })
    </script>
</body>

</html>
