
$(function(){
     $('#btnadd').click(function(){
          $('#addModal').modal('show');
     });

     //addrow faculty
     $('#addfty').click(function(){
          $('#trow').append(`
             <tr>
                <td>
                   <div class="group-form mb-3">
                      <input type="text" placeholder="major Name" class="major form-control"/>
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

     $('#addrow').on('click', '.btnremove', function(){
          $(this).closest('tr').remove();
     });

     $('#btnsave').click(function(){
          var err = 0;
          var major = $('.major').map(function(){
               var val = $(this).val();
               if(val == ''){
                    err = 1;
               }else{
                    return $(this).val();
               }
          }).get();

          $.post('/addmajor', {'major[]':major}, function(data) {
               if(data == 1){
                    alert('Major added successfully.');
                    location.href = '/majors';
               }
          })

     });
});