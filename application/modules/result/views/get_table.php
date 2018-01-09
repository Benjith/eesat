<!-- table -->
              <div class="row bg-white has-shadow">
                    <div class="card-body">
                      <div class="table">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Reg.No</th>
                            <th>Class</th>
                            <th>Mark</th>
                            
                            
                          </tr>
                        </thead>
                        <tbody>
                         <?php 
                         //sl
                         $i=1;
                         foreach ($qry->result() as  $value) {
                          ?>
                         
                          <tr>
                            <th scope="row"><?php echo $i++ ?></th>
                            <td><strong><?php echo $value->stu_name; ?></strong></td>
                            <td><?php echo $value->stu_reg_num; ?></td>
                            <td><?php echo $value->stu_class; ?> </td>
                            <td><input class='mark' type="text" name="mark" value="<?php if(isset($value->mark)){ echo $value->mark;} ?>" onchange="add('<?php echo $value->stu_id; ?>',this.value )" style="width: 50%"></td>

                          </tr>
                          <?php
                          }
                         ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                
                <!-- table -->


                <script type="text/javascript">
                  function add(student,mark){

                  var school = $('#school option:selected').val();
                  var exam   = $('#exam option:selected').val();
                  var level  = $('#level option:selected').val();

              //ajax

              $.ajax({
      url: '<?=base_url()?>index.php/result/ins_result',
      method: 'post',
      data: {
              school:school,exam:exam,level:level,student:student,mark:mark
            },
      dataType:'html' ,
      success: function(response){
        
      
      },
     });
                
    }
   </script>



