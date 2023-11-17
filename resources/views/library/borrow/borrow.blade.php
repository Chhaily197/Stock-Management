<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <title>Document</title>
</head>
<body>
     <h1>Borrow Book</h1>
          <form action="{{ route('borrow.store', $book->id )}}" method="POST" style="width:550px; margin:auto;">
          @csrf
          <div class="form-group mb-3">
               <label for="name">Username</label>
               <input type="text" name="name" id="name" class="form-control" required>
          </div>
          <div class="form-group mb-3">
               <label for="user_id">User ID:</label>
               <input type="number" name="user_id" id="user_id" class="form-control" required>
          </div>
          <input type="hidden" name="book_id" id="book_id" class="form-control" value="{{ $book->id }}" required>
          <div class="form-group mb-3">
               <label for="borrow_date">Borrowed Date:</label>
               <input type="date" name="borrow_date" id="borrow_date" class="form-control" required>
          </div>
          <div class="form-group mb-3">
               <label for="return_date">Returnted Date:</label>
               <input type="date" name="return_date" id="return_date" class="form-control" required>
          </div>
          <button type="submit" class="btn btn-primary" onclick="return confirm('Book Borrowed successfully.')">Borrow</button>
          <a href="{{ route('library.dashboard')}}" class="btn btn-secondary">Cancel</a>
     </form>
</body>
</html>