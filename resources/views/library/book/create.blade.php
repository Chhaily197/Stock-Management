<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <title>Insert Books</title>
</head>
<body>
     <h1 align="center">Add Book</h1>
    <form action="{{ route('library.book.store') }}" method="POST" enctype="multipart/form-data" style="width:500px; padding:5px; margin:auto;">
        @csrf
        <div class="form-group mb-3">
            <label for="title" class="form-label">Title:</label>
            <input type="text" id="title" name="title" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="author">Author:</label>
            <input type="text" id="author" name="author" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="quantity">Quantity:</label>
            <input type="text" id="quantity" name="quantity" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="image">Image:</label>
            <input type="file" id="image" name="image" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label for="description">Description:</label>
            <textarea id="description" name="description" class="form-control" required></textarea>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Add</button>
        <a href="{{ route('library.book.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</body>
</html>