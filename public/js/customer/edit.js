$(function(){
     $('#tblCustomer tr').on('click','.btnedit', function(){
          var row = $(this).closest('tr');
          $id = row.find('td').eq(0).text();
          $name = row.find('td').eq(1).text();
          $idcard = row.find('td').eq(2).text();
          $gender = row.find('td').eq(3).text();

          $('#id').val($id);
          $('#editname').val($name);
          $('#editCard').val($idcard);
          $('#editgender').val($gender);

          $('#update').modal('show');
     });

     $('#btnEdit').click(function(){
          var id = $('#id').val();
          var name = $('#editname').val();
          var idcard = $('#editCard').val();
          var gender = $('#editgender').val();

          $.post('/EditCustomer', {id:id, name:name, idcard:idcard, gender:gender}, function(result){
               if(result == 1){
                    alert("Customer updated succesfully.");
                    location.href = '/customer';
               }
          })
     })
})