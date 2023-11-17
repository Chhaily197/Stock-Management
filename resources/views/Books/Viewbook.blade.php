<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 @include('Books.link')
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title>View Book</title>
</head>

<body>
 <div class="container">
  <div class="main">
   <h1 class="text-center py-5">View Book</h1>
   <div class="d-flex align-items-center justify-center" style="height:70vh;">
    <div class="card-body">
     <div class="row d-flex align-items-center justify-center">
      @foreach ($info as $book)
       <div class="col-12 d-flex align-items-center justify-center py-2">
        <div class="m-auto">
         <img src="{{ asset('book_img/' . $book->Image) }}" alt="Book_img" width="200px">
        </div>
       </div>

       <div class="container">
        <div class="row">
          <div class="col-3"></div>
          <div class="col-3">
               <div class="row">
                    <div class="col-6 py-3">
                         <h4 class="py-3">BOOK ID</h4>
                         <h4 class="py-3">TITLE</h4>
                         <h4 class="py-3">PRICES</h4>
                         <h4 class="py-3">QUANTITY</h4>
                    </div>
                    <div class="col-6 py-3">
                         <h4 class="text-secondary py-3">: {{$book->book_id}}</h4>
                         <h4 class="text-secondary py-3">: {{$book->title}}</h4>
                         <h4 class="text-secondary py-3">: {{$book->price}} $</h4>
                         <h4 class="text-secondary py-3">: {{$book->Quantity}}</h4>
                    </div>
               </div>
          </div>
          <div class="col-3">
               <div class="row">
                    <div class="col-6 py-3">
                         <h4 class="py-3">MAJOR</h4>
                         <h4 class="py-3">FACULTY OF</h4>
                         <h4 class="py-3">YEAR</h4>
                         <h4 class="py-3">SEMESTER</h4>
                    </div>
                    <div class="col-6 py-3">
                         <h4 class="text-secondary py-3">: {{$book->Majors}}</h4>
                         <h4 class="text-secondary py-3">: {{$book->Faculty}}</h4>
                         <h4 class="text-secondary py-3">: {{$book->Years}}</h4>
                         <h4 class="text-secondary py-3">: {{$book->Semester}}</h4>
                    </div>
               </div>
          </div>
          <div class="col-3"></div>
        </div>
       </div>

      @endforeach
     </div>
    </div>
   </div>
   <a href="/books" class="btn btn-secondary" style="width:200px">Cancel</a>
  </div>
 </div>
</body>

</html>
