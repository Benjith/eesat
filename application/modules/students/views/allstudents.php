  <div id="table_list" class="card-body">
    <div align="right">
    <form action="post">
      <button type="submit" id="print" class="btn btn-primary">Print Hallticket</button>
    </form>
  </div>
 <table class="table table-striped"  id="data_list">
                        <thead>
                          <tr>
                            <th>Sl.No</th>
                            <th>Student Name</th>
                            <th>Class</th>
                  
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                             <?php 
                             $cout=1;
                              foreach ($allstudent->result() as $rows): 
                               ?>
                            <th scope="row"><?php echo $cout++;?> </th>
                            <td><?php echo $rows->stu_name;?></td>
                            <td><?php echo $rows->stu_class;?></td>
                            
                          </tr>
                          <?php endforeach ?>
                        </tbody>
                      </table>
                    </div>
                      <script type="text/javascript">
   $('#data_list').dataTable(); 
</script>