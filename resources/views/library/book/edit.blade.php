<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <title>Update Books</title>
</head>
<body>
     <h1 class="text-center">Edit Book</h1>
     <form action="{{ route('library.book.update', $book->id)}}" enctype="multipart/form-data" method="POST" style="width:500px; margin:auto;">
          @csrf
          @method('PUT')
          <div class="from-group mb-3">
               <label for="title">Title:</label>
               <input type="text" id="title" name="title" class="form-control" value="{{ $book->title }}" required>
          </div>
          <div class="from-group mb-3">
               <label for="author">Author:</label>
               <input type="text" id="author" name="author" class="form-control" value="{{ $book->author }}" required>
          </div>
          <div class="from-group mb-3">
               <label for="quantity">Quantity</label>
               <input type="text" id="quantity" name="quantity" class="form-control" value="{{ $book->quantity }}" required>
          </div>
          <div class="from-group mb-3">
               <label for="image">Image:</label>
               <input type="file" id="image" name="image" class="form-control">
          </div>
          <div class="from-group mb-3">
               <label for="description">Decription:</label>
               <input type="text" id="description" name="description" class="form-control" value="{{ $book->description }}" required>          </div>
          <button type="submit" name="submit" class="btn btn-primary" onclick="return confirm('Book updated successfully.')">Update</button>
          <a href="{{ route('library.book.index')}}" class="btn btn-secondary">Cancel</a>
     </form>
</body>
</html>