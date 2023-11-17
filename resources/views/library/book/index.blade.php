<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     @include('library.link')
     <title>books</title>
</head>
<body>
    @include('library.Navbar')

     <h1>Books</h1>
     <a href="{{ route('library.book.create') }}" class="btn btn-primary mb-3">Add Book</a>
    @if($book->isEmpty())
        <p>No books available.</p>
    @else
        <table class="table m-auto text-center">
            <thead>
                <tr>
                    <th>Review</th>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Quantity</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($book as $books)
                    <tr>
                        <th>
                            <img src="{{asset('img/'. $books->image)}}" alt="" width="50">
                        </th>
                        <td>{{ $books->id }}</td>
                        <td>{{ $books->title }}</td>
                        <td>{{ $books->author }}</td>
                        <td>{{ $books->quantity }}</td>
                        <td>{{ $books->description }}</td>
                        <td>
                            <a href="{{ route('borrow.borrow', $books->id)}}" class="btn btn-primary btn-sm">Borrow</a>
                            <a href="{{ route('library.book.edit', $books->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('library.book.destroy', $books->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this book?')">Delete</button>
                            </form>
                        </td>  
                   </tr>
                 @endforeach
            </tbody>
        </table>
     @endif
</body>
</html>