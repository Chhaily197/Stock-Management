     $('#tbsem tr').on('click', '.btnedit', function(){
          var row = $(this).closest('tr');
          var id = row.find('td').eq(0).text();
          var sem = row.find('td').eq(1).text();

          $('#id').val(id);
          $('#semester').val(sem);
          
          $('#editModal').modal('show');
     });

     $('#btnEdit').click(function(){
          var id = $('#id').val();
          var semester = $('#semester').val();

          $.post('/edit', {id:id, sem:semester}, function(data){
               if(data == 1){
                    alert("Semester updated succesfully.");
                    location.href = "/semester";
               }
          })

     })