<!DOCTYPE html>
<html>
  <head>
    <style>
      
    </style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ESAT | Dashboard</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fontastic.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="favicon.png">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <div class="page home-page">
      <!-- Main Navbar-->
      <?php $this->load->view('dashboard/header'); ?>
      <div class="page-content d-flex align-items-stretch">
        <!-- Side Navbar -->
         <?php $this->load->view('dashboard/sider'); ?>
        <!-- Side Navbar -->
       
        <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Exam List</h2>
            </div>
          </header> <br>
          <div class="container-fluid">
              <div class="row">
          <!-- exam list  -->      
<?php 

foreach ($result_exam->result() as  $value) {
  


?>
           <div class="col-lg-4">
                  <div class="work-amount card">
                    <div class="card-close">
                      <div class="dropdown">
                        <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove" onclick="del(<?php echo $value->exam_id; ?>)"> <i class="fa fa-times"></i>Delete</a><a href="#" class="dropdown-item edit" data-toggle="modal" data-target="#editModal<?php echo $value->exam_id; ?>" > <i class="fa fa-gear"></i>Edit</a></div>
                      </div>
                    </div>
                    <div class="card-body">
                      <h3><?php echo  $value->exam_name; ?></h3>
                      <small style="text-transform: uppercase;"><?php echo $value->level; ?></small>
                      
                      
                    </div>
                  </div>
                </div>



                <!-- modal-start -->
                <div class="modal fade" id="editModal<?php echo $value->exam_id; ?>" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <br>
          <!-- <h4 class="modal-title">Modal Header</h4> -->
        </div>
        <div class="modal-body">
          <label style="color: #9E9E9E">Exam Name</label>
          <input type="text" class="input-material"  id= "exam<?php echo $value->exam_id; ?>"  name="exam_edit"  value="<?php echo $value->exam_name ?>">
          <br>
          <input  type="number" min="1" max="5" id="level_edit<?php echo $value->exam_id; ?>"  value="" class="input-material level" placeholder="Level(s)" >

         
        </div>
        <div class="modal-footer">
          <!-- <button type="button"   class="btn btn-danger" data-dismiss="modal" >Cancel</button> -->
          <button type="button"   class="btn btn-success" onclick="edit(<?php echo $value->exam_id; ?>)"  data-dismiss="modal" >Done</button>
        </div>
      </div>
    </div>
  </div>
  <!-- modal close -->
              <!-- exam list  --> 
  <?php } ?>   
               



              <!--Add New Exam   -->      

           <div class="col-lg-4">
                  <div class="work-amount card">
                    <div class="card-close">
                     <!--  <div class="dropdown">
                        <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Delete</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                      </div> -->
                    </div>
                    <div class="card-body">
                     <a href="#" data-toggle="modal" data-target="#newModal" style="text-decoration:none; color: inherit; padding-left: 40%; color:#9E9E9E"> <h3> Add<br> New<br> Exam</h3> </a>
                     <!-- Modal -->
                    <div class="modal fade" id="newModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <br>
          <!-- <h4 class="modal-title">Modal Header</h4> -->
        </div>
        <div class="modal-body">
          <label style="color: #9E9E9E">Exam Name</label>
          <input type="text" id="new_exam"  class="input-material" name="exam_name" value="">
          <br>
          <input id="new_level" type="number" min="1" max="5"  class="input-material" placeholder="Level(s)" >

         
        </div>
        <div class="modal-footer">
          <!-- <button type="button"   class="btn btn-danger" data-dismiss="modal" >Cancel</button> -->
          <button type="button"   class="btn btn-success" onclick="newexam()"  data-dismiss="modal" >Done</button>
        </div>
      </div>
    </div>
  </div>
  <!-- modal close -->
                      
                    </div>
                  </div>
                </div>
                
              <!-- Add New Exam   --> 
               

            </div>
          </div>







  <!-- Modal part hidden content onclick active -->


                
           
          <!-- Page Footer-->
        <?php $this->load->view('dashboard/footer'); ?>
        </div>
      </div>
    </div>
    <!-- Javascript files-->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="<?php echo base_url(); ?>assets/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/charts-home.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/front.js"></script>
    <script type="text/javascript">
      function del(id){
       
        $.ajax({
          url:'<?=base_url()?>index.php/exam/delete_exam',
          method: 'post',
          data: {id: id},
          dataType: 'json',
          success:function(response){
          
          },
        });
      }

      function edit(exam_id){
       
       var exam_name =  $("#exam"+exam_id).val();
       var level = $("#level_edit"+exam_id).val();
     
        
         $.ajax({
          url:'<?=base_url()?>index.php/exam/edit_exam',
          method: 'post',
          data: {exam_name: exam_name,level:level,exam_id:exam_id },
          dataType: 'json',
          success:function(response){
            

          },
        });
      }
      
    function newexam(){
       
       var exam_name = $('#new_exam').val();
       var level = $('#new_level').val();
       
        
         $.ajax({
          url:'<?=site_url('exam/exam/newexam')?>',
          method: 'post',
          data: {exam_name: exam_name,level:level},
          dataType: 'html',
          success:function(response){
            
          },
        });
      }






    </script>
  </body>
</html>