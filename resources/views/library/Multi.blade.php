<!DOCTYPE html>
<html lang="en">
<head>
@include('Books.link')
<title>Sale Multi</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
     <meta name="csrf-token" content="{{ csrf_token() }}" />
     <script type="text/javascript">
          $.ajaxSetup({
               headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
          });
     </script>
</head>

<body>
     <div class="container">
          <table class="table" id="tblpo">
               <thead>
               <tr>
                    <th scope="col-3">
                         <input type="text" id="barcode" class="form-control" name="barcode" required placeholder="Input Barcode">
                    </th>
                    <th colspan="3"></th>
               </tr>
               </thead>
               <tbody id="add_row">
                    <tr>
                         <th>TITLE </th>
                         <th>QTY</th>
                         <th>PRICE</th>
                         <th>AMOUNT</th>
                    </tr>
               </tbody>
               <tbody>
                    <tr>
                         <th colspan="3"></th>
                         <th>Total Payment</th>
                    </tr>
                    <tr>
                         <td colspan="3"></td>
                         <td colspan="-3"><input type="number" readonly id="total" name="total" class="form-control"></td>
                    </tr>
               </tbody>
          </table>
          <a href="#" id="btn">click</a>
     </div>

     <script>
          $(function(){
               $('#barcode').change(function(e){
                    e.preventDefault();
                    var id = $('#barcode').val();
                    $.post('/addmulti',{id:id}, function(res){
                         if(res == 0){
                              alert("Book not found.");
                         }else{
                              const arr = res.split(";");
                              let price = arr[0];
                              let title = arr[1];
                              $('#add_row').append(`
                                        <tr>
                                             <td><input type="text" readonly id="title" name="title" value="${title}" class="form-control"></td>
                                             <td><input type="number"  class="form-control qty" name="qty"></td>
                                             <td><input type="number" readonly class="form-control" value="${price}"></td>
                                             <td><input type="number" readonly class="form-control" name="amount"></td>
                                        </tr>
                              `);
                         }
                    });
               });

               function sum(){
                    var row = ('#tblpo tr').length;
                    total = 0;
                    amount = 0;
                    for(var i=1; i<(row-2); i++){
                         amount = $('#tblpo').find('tr').eq(i).find('td').eq(3).children().val();
                         if(!isNaN(parseFloat(amount))){
                              total = total + parseFloat(amount);
                         }
                    }
                    $('#total').val(total);
               }

               $('#tblpo').on('change','.qty', function(){
                    var row = $(this).closest('tr');
                    var qty = row.find('td').eq(1).children().val();
                    var price = row.find('td').eq(2).children().val();
                    var amount = parseFloat(qty) * parseFloat(price);
                    row.find('td').eq(3).children().val(amount);
                    sum();
               });
          });
     </script>
</body>

</html>
