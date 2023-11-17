$(function(){
     $('#btnadd').click(function(){
          $('#addModal').modal('show');
     });

     $('#addSt').click(function(){
          $('#trow').append(`
             <tr>
                <td>
                   <div class="group-form mb-3">
                      <input type="text" placeholder="Semester Name" class="semester form-control"/>
                   </div>
                </td>
                <td>
                   <div class="group-form mb-3">
                      <button class="btn btn-sm btn-danger btnremove">Remove</button>
                   </div>
                </td>
             </tr>
          `);
     });

     $('#btnsave').click(function(){
          var err = 0;
          var semester = $('.semester').map(function(){
               var val = $(this).val();
               if(val == ''){
                    err = 1;
               }else{
                    return $(this).val();
               }
          }).get();

          $.post('/addsemester', {'semester[]':semester}, function(data){
               if(data == 1){
                    alert("Semester added successfully.");
                    location.href = '/semester'
               }
          })

     });

     $('#addrow').on('click', '.btnremove', function(){
          $(this).closest('tr').remove();
     });

});