$(function(){
     $('#tbfty tr').on('click', '.btnedit', function(){
          var row = $(this).closest('tr');
          var id = row.find('td').eq(0).text();
          var faculty = row.find('td').eq(1).text();

          $('#id').val(id);
          $('#faculty').val(faculty);

          $('#editModal').modal('show');
     });

     $('#btnEdit').click(function(){
          var id = $('#id').val();
          var faculty = $('#faculty').val();

          $.post('/editfty', {id:id, faculty:faculty}, function(data){
               if(data == 1){
                    alert("Faculty updated successfully.");
                    location.href = '/faculty';
               }
          })
     });
});