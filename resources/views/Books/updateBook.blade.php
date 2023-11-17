<!DOCTYPE html>
<html>

<head>
    @include('Books.link')
    <title>Update Book</title>
</head>

<body>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Update Book and Instock Data</title>
    </head>

    <body>
        <h1 class="text-center text-primary">Update Book and Instock Data</h1>

        <form method="POST" action="{{ route('book.update', ['id' => $book->book_id])}}" style="width:700px; margin: auto;"  enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="group-form mb">
                <label for="title">Title:</label>
                <input type="text" name="title" class="form-control" value="{{ $book->title }}" required>
            </div>

            <div class="group-form mb">
                <label for="price">Price:</label>
                <input type="number" name="price" class="form-control" value="{{ $book->price }}" required>
            </div>

            <div class="group-form mb-3" id="select_major">
                <label for="major">Major:</label>
                <div class="d-flex gap-2">
                    <select name="major" id="major" class="form-select">
                        @foreach ($majors as $major)
                            <option value="{{ $major->major_id }}" @if ($major->major_id === $book->major_id) selected @endif>
                                {{ $major->major_name }}</option>
                        @endforeach
                    </select>
                    <a href="#" class="btn btn-success btn-sm" style="width:200px" id="btnaddmajor">Create</a>
                </div>
            </div>
            <div class="group-form mb-3" id="create_major">
                <label for="major">Major: </label>
                <div class="d-flex gap-2">
                    <input type="text" name="add_major" class="form-control" placeholder="create major">
                    <a href="#" class="btn btn-success btn-sm" style="width:200px" id="btnselectmajor">Select</a>
                </div>
            </div>

            <div class="group-form mb-3" id="select_faculty">
                <label for="faculty">Faculty:</label>
                <div class="d-flex gap-2">
                <select name="faculty" id="faculty" class="form-select">
                    @foreach ($faculties as $faculty)
                        <option value="{{ $faculty->faculty_id }}" @if ($faculty->faculty_id === $book->faculty_id) selected @endif>
                            {{ $faculty->faculty_name }}</option>
                    @endforeach
                </select>
                <a href="#" class="btn btn-success btn-sm" style="width:200px" id="btnaddfaculty">Create</a>
                </div>
            </div>
            <div class="group-form mb-3" id="create_faculty">
                <label for="faculty">Faculty: </label>
                <div class="d-flex gap-2">
                    <input type="text" name="add_faculty" class="form-control" placeholder="create faculty">
                    <a href="#" class="btn btn-success btn-sm" style="width:200px" id="btnselectfaculty">Select</a>
                </div>
            </div>

            <div class="group-form mb-3" id="select_year">
                <label for="year">Years:</label>
                <div class="d-flex gap-2">
                <select name="year" id="year" class="form-select">
                    @foreach ($years as $year)
                        <option value="{{ $year->year_id }}" @if ($year->year_id === $book->year_id) selected @endif>
                            {{ $year->year_name }}</option>
                    @endforeach
                </select>
                <a href="#" class="btn btn-success btn-sm" id="btnaddyear" style="width:200px">Create</a>
                </div>
            </div>
            <div class="group-form mb-3" id="create_year">
                <label for="year">Years: </label>
                <div class="d-flex gap-2">
                    <input type="text" name="add_year" class="form-control" placeholder="create year">
                    <a href="#" class="btn btn-success btn-sm" style="width:200px" id="btnselectyear">Select</a>
                </div>
            </div>

            <div class="group-form mb-3" id="select_sem">
                <label for="semester">Semester:</label>
                <div class="d-flex gap-2">
                <select name="semester" id="semester" class="form-select">
                    @foreach ($semesters as $semester)
                        <option value="{{ $semester->semester_id }}" @if ($semester->semester_id === $book->semester_id) selected @endif>
                            {{ $semester->semester_name }}</option>
                    @endforeach
                </select>
                <a href="#" class="btn btn-success btn-sm" style="width:200px" id="btnaddsem">Create</a>
                </div>
            </div>
            <div class="group-form mb-3" id="create_sem">
                <label for="sem">Semester: </label>
                <div class="d-flex gap-2">
                    <input type="text" name="add_sem" class="form-control" placeholder="create semester">
                    <a href="#" class="btn btn-success btn-sm" style="width:200px" id="btnselectsem">Select</a>
                </div>
            </div>

            <div class="group-form mb-3">
                <label for="quantity">Quantity:</label>
                <input type="number" name="quantity" class="form-control" value="{{ $instock->quantity }}" required>
            </div>

            <div class="group-form mb-3">
                <label for="image">Image:</label>
                <input type="file" name="image" class="form-control" id="image" required>
            </div>

            <div class="group-form mb-3">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="/books" class="btn btn-secondary">Cancel</a>
            </div>
        </form>

<script>
        $(function(){
            $('#create_major').hide();
            $('#create_faculty').hide();
            $('#create_year').hide();
            $('#create_sem').hide();

            $('#btnaddmajor').click(function(){
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
