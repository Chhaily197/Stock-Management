<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
     integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
     <title>Book's Receipt</title>
     <style media="print">
          .hide-on-print{
               display: none;
          }
     </style>
</head>
<body>
     <div class="container">
          <div class="row">
               <h1 class="text-center py-3">Receipt for Book Sale</h1>
               <div class="py-2 d-flex align-items-center justify-content-center flex-column gap-5">
                    <div>
                       <img src="{{ asset('book_img/' . $receipt->Image) }}" alt="Book_img" width="200px">
                    </div>
                    <div class="row" style="width:100%">
                         <div class="col-6 d-flex align-items-center justify-conten-center flex-column gap-4">
                              <h3><strong>Title </strong>   :{{ $receipt->Title }}</h3>   
                              <h3><strong>Major </strong>   :{{ $receipt->major_name }}</h3>   
                              <h3><strong>Faculty </strong> :{{ $receipt->faculty_name }}</h3>   
                              <h3><strong>Years </strong>   :{{ $receipt->year_name }}</h3>   
                         </div>
                         <div class="col-6 d-flex align-items-center justify-conten-center flex-column gap-4">
                              <h3><strong>Semester  </strong> :{{ $receipt->semester_name }}</h3>   
                              <h3><strong>Price  </strong>    :{{ $receipt->price }} $</h3>   
                              <h3><strong>Quantity  </strong> :{{ $receipt->quantity }}</h3>   
                              <h3><strong>Amount  </strong>   :{{ $receipt->amount }} $</h3>   
                         </div>
                    </div>
               </div>
               <p class="text-center">Thank you!</p>
               <div class="d-flex align-items-center justify-content-center gap-2 mt-4">
                    <a href="/outstock" class="btn btn-secondary py-2" style="width:150px">Cancel</a>
                    <button class="hide-on-print btn-primary py-2 btn" onclick="window.print()">Print Receipt</button>
               </div>
          </div>
     </div>
</body>
</html>