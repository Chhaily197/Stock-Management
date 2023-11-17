$(function(){
     $('#tbmajor tr').on('click', '.btnedit', function(){
          var row = $(this).closest('tr');
          var id = row.find('td').eq(0).text();
          var major = row.find('td').eq(1).text();

          $('#id').val(id);
          $('#major').val(major);

          $('#editModal').modal('show');
     });

     $('#btnEdit').click(function(){
          var id =  $('#id').val();
          var major = $('#major').val();

          $.post('/editmajor', {id:id, major:major}, function(data){
               if(data == 1){
                    alert("Major edited successfully.");
                    location.href = '/majors'
               }
          })
     });
});