<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <title>@yield('title','borrowBook')</title>
</head>
<body>
     <h1>Book Borrow</h1>
     <a href="{{ route('library.dashboard')}}">Dashboard</a>
     @if($borrow->isEmpty())
        <p>user borrow books unvalible</p>
     @else
         <table class="table border">
          <tr>
               <th>ID</th>
               <th>NAME</th>
               <th>USER ID</th>
               <th>BOOK ID</th>
               <th>BORROW DATE</th>
               <th>RETURN DATE</th>
               <th>ACTIVE</th>
          </tr>
          @foreach ($borrow as $item)
             <tr>
               <td>{{ $item->id}}</td>
               <td>{{ $item->name}}</td>
               <td>{{ $item->user_id}}</td>
               <td>{{ $item->book_id}}</td>
               <td>{{ $item->borrow_date}}</td>
               <td>{{ $item->return_date}}</td>
               <td>
                    <a href="" class="btn btn-primary btn-sm">EDIT</a>
                    <form action="{{route('borrow.destroy', $item->id)}}" method="POST" class="d-inline">
                         @csrf
                         @method('DELETE')
                         <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this book?')">DELETE</button>
                    </form>
               </td>
             </tr> 
          @endforeach
         </table>
     @endif
</body>
</html>