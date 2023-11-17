$(function(){
     $('#tbfty tr').on('click', '.btnedit', function(){
          var row = $(this).closest('tr');
          var id = row.find('td').eq(0).text();
          var faculty = row.find('td').eq(1).text();

          $('#id').val(id);
          $('#year').val(faculty);

          $('#editModal').modal('show');
     });

     $('#btnEdit').click(function(){
          var id = $('#id').val();
          var year = $('#year').val();

          $.post('/edityear', {id:id, year:year}, function(data){
               if(data == 1){
                    alert("Year updated successfully.");
                    location.href = '/years';
               }    
          })
     })
});