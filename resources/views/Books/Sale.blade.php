<!DOCTYPE html>
<html>

<head>
 @include('Books.link')
 <title>Sale Book</title>
</head>

<body>
 @include('Books.Navbar')
 <main id="main" class="main">
  <section class="section dashboard">
   <div class="row">
    <div class="col-lg-12 d-flex flex-column align-items-center justify-content-center" style="height:50vh;">
     <div class="card-body pb-0 py-4" style="width:80%;">
      <h2 class="text-center py-5 fw-bold h2">PURCHASE</h2>
      @if (session('success'))
       <div class="alert alert-success">
        {{ session('success') }}
       </div>
      @endif

      @if (session('error'))
       <div class="alert alert-danger)">
        {{ session('error') }}
       </div>
      @endif   
      <div class="group-form mb-3" style="width:30%">
        <label for="barcode" class="h3 py-2">Input Code</label>
        <input type="text" id="barcode" class="form-control" name="barcode" required placeholder="Input Barcode">
      </div>
      <table class="table" id="tblpo">
       <thead>
        <tr class="table-primary">
         <th class="col-2">TITLE</th>
         <th class="col-3">QTY</th>
         <th class="col-3">PRICE</th>
         <th class="col-3">AMOUNT</th>
         <th class="col-1">Remove</th>
        </tr>
       </thead>
       <tbody id="add_row">
       </tbody>
       <tbody>
        <tr>
         <td colspan="3" class="text-end fw-bold text-primary">Total Payment</td>
         <td colspan="-3"><input type="number" readonly id="total" name="total" class="form-control"></td>
        </tr>
       </tbody>
      </table>
      <div class="group-form mb-3 d-flex justify-content-center" style="100%">
          <a href="#" class="btn btn-primary py-2" id="btnSub" style="width:250px;">SUBMIT</a>
      </div>
     </div>
    </div>
   </div>
  </section>
 </main>

 <script>
  $(function() {
   $('#barcode').change(function(e) {
    e.preventDefault();
    var id = $('#barcode').val();
    $.post('/addmulti', {id:id}, function(res) {
     if (res == 0) {
      alert("Book not found.");
     } else {
      const arr = res.split(";");
      let price = arr[0];
      let title = arr[1];

      var bookid = `<input type="hidden" class="id" value="${id}">`;
      var name = `<input type="text" readonly id="title" name="title" value="${title}" class="form-control txttitle">`;
      var qty = `<input type="number"  class="form-control qty" name="qty">`;
      var cost = `<input type="number" readonly class="form-control price" value="${price}">`;
      var amount = `<input type="number" readonly class="form-control amount" name="amount">`;

      $('#add_row').append(`
            <tr>
                <td>${bookid}${name}</td>
                <td>${qty}</td>
                <td>${cost}</td>
                <td>${amount}</td>
                <td><a class="btn btn-sm"><i class="bi bi-trash-fill text-danger h5"></i></a></td>
            </tr>
            `);
        }
     });
   });

   function sum() {
    var row = ('#tblpo tr').length;
    total = 0;
    amount = 0;
    for (var i = 1; i < (row - 2); i++) {
     amount = $('#tblpo').find('tr').eq(i).find('td').eq(3).children().val();
     if (!isNaN(parseFloat(amount))) {
      total = total + parseFloat(amount);
     }
    }
    $('#total').val(total);
   }

   $('#tblpo').on('change', '.qty', function() {
    var row = $(this).closest('tr');
    var qty = row.find('td').eq(1).children().val();
    var price = row.find('td').eq(2).children().val();
    var amount = parseFloat(qty) * parseFloat(price);
    row.find('td').eq(3).children().val(amount);
    sum();
   });

   $('#add_row').on('click','.fa-trash', function(){
        $(this).closest('tr').remove();
        sum();
   });

   $('#btnSub').click(function(){

    var id = $('.id').map(function(){
        return $(this).val();
    }).get();

    var titleAll = $('.txttitle').map(function(){
        return $(this).val();
    }).get();

    var err = 0;
    var qties = $(".qty").map(function(){
        var row = $(this).val();
        if(row == ''){
            err = 1;
        }else{
            return $(this).val();
        }
    }).get();

    var Prices = $(".price").map(function(){
        return $(this).val();
    }).get();
    
    var Amount = $('.amount').map(function(){
        return $(this).val();
    }).get();

    // alert(titleAll + qties + Prices + Amount);

    $.post('/addpo',{'id[]':id,'title[]':titleAll, 'qty[]':qties, 'price[]':Prices, 'amount[]':Amount}, function(res){
        if(res == 1){
            alert("Book Sold successfully");
            location.href = '/outstock'
        }
    });
   });

  });

 </script>
</body>

</html>
