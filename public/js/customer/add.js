$(function(){
     $('#add').click(function(){
          $('#addCustomer').modal('show'); 
     });

     $('#save').click(function(){
          var name = $('#username').val();
          var idcard = $('#idCard').val();
          var gender = $('#gender').val();

          $.post('/addCustomer',{name:name, idcard:idcard, gender:gender}, function(result){
               if(result == 1){
                    alert('Customer added successfully');
                    location.href = '/customer';
               }
          });

     })
})