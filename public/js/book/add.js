$('#btnadd').click(function(){
     $('#addModal').modal('show');
});

$('#btnsave').click(function(){
     var title    = $('#title').val();
     var price    = $('#price').val();
     var major    = $('#major').val();
     var faculty  = $('#faculty').val();
     var year     = $('#year').val();
     var semester = $('#semester').val();
     var qty      = $('#qty').val();

     if(title == ""){
          $('#err').html("Please Enter the title.");
     }else if(price == ""){
          $('#errp').html("Please Enter the price.");
     }else if(qty == ""){
          $('#errq').html("Please Enter the Quantity");
     }else{

     // alert(title + price + major + faculty + year + semester + qty);
     $.post('/addbook',
     {
          title:title,
          price:price, 
          major:major,
          faculty:faculty,
          year:year,
          semester:semester,
          qty:qty
     }, function(data){
          if(data == 1){
               alert("Book added successfully.");
               location.href = "/books";
          }
          // alert(data);
     })
}
})