<!DOCTYPE html>
<html>
  <head>
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
              <h2 class="no-margin-bottom">Student List</h2>
            </div>
          </header>
           <!-- content -->
           <form method="post"> 
          <section class="dashboard-counts no-padding-bottom">
            <div class="container-fluid">
              <div class="row bg-white has-shadow">

                <!-- head_menu(selsect) -->
                <div class="col-lg-12">
                <?php
                //print_r($exam->result());?>
                 <div class="form-group row">
                  <!-- first_option -->
                     
                        <!-- first_option -->

                        <!-- second -->
                        <div class="line"></div>
                        <label class="col-sm-3 form-control-label">Select Exam</label>
                          <div class="col-sm-9 select">
                            <select id="exam" class="form-control" >
                              <option value="">--- No Exam Selected ---</option>
                              <?php 
                              foreach ($exam as $key) {
                                ?>
                                  <option value='<?php echo $key->exam_id;?>'><?php echo $key->exam_name;?></option>
                                  <?php } ?>
                       
                </select>
                          </div>
                          <div class="col-sm-9 offset-sm-3 select"><!-- importent-not2remove --></div>
                <!-- second -->

                <!-- third -->
                <div class="line"></div>
                 <label class="col-sm-3 form-control-label">Select Level</label>
                          <div class="col-sm-9 select">
                            <select id="level" class="form-control" >
                              <option value="">--- No Level Selected ---</option>
                    <?php 
                              foreach ($exam_level as $row) {
                                ?>
                        <option value='<?php echo $row->level_id;?>'><?php echo $row->level_name;?></option>
                         <?php } ?>
                </select>
                          </div>
                          <div class="col-sm-9 offset-sm-3 select"><!-- importent-not2remove --></div>
                <!-- third -->
                     <label class="col-sm-3 form-control-label">Select School</label>
                          <div class="col-sm-9 select">
                            <select id="school" class="form-control" >
                              <option value="">--- No School Selected ---</option>
                  
                           <?php 
                              foreach ($allexam_schools as $school) {
                                ?>
                        <option value='<?php echo $school->school_id;?>'><?php echo $school->school_name;  ?></option>"
                   
                    <?php }?>
                             </select>
                             
                          </div>

                          <div class="col-sm-9 offset-sm-3 select"><!-- importent-not2remove --></div>
                           </form>
              </div>
            </div>
          </div>
       
                <!-- head_menu(selsect) -->
                <!-- table -->
               <br>
            <div class="container-fluid  bg-white has-shadow" id="student_list">
              
                  
              
              </div>
            
            
          </div>
          </section>
          <!-- content -->

          <br>
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
    <!-- datatablejs -->
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/datatables/media/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/datatables/media/assets/js/datatables.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/datatables/extras/TableTools/media/js/TableTools.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/datatables/extras/TableTools/media/js/ZeroClipboard.min.js"></script>
    
  <!-- ajax -->
    <script type="text/javascript">
      $(document).ready(function($) {
        
      $('#school').change(function(event) {
        /* Act on the event */
    
      var exam=$('#exam').val();
      var level=$('#level').val();
      var school=$(this).val();
      

  
       $.ajax({
        url: '<?php echo site_url('students/student/All_Student');?>',
        type: 'post',
        dataType: 'html',
        async:false,
       
        data: { exam:exam,
                level:level,
                school:school},
        success:function(res){
        
        //console.log(res);
        
        $('#student_list').html(res);
        
     
       },


      
      });
     });
            });



    </script>
  </body>
</html>