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
              <h2 class="no-margin-bottom">Results</h2>
            </div>
          </header>
          <!-- content -->
          <section class="dashboard-counts no-padding-bottom">
            <div class="container-fluid">
              <div class="row bg-white has-shadow">

                <!-- head_menu(selsect) -->
                <div class="col-lg-12">
                <?php
                //print_r($exam->result());?>
                 <div class="form-group row">
                  <!-- first_option -->
                          <label class="col-sm-3 form-control-label">Select School</label>
                          <div class="col-sm-9 select">
                            <select id="school" class="form-control">
                              <option value="">--- No School Selected ---</option>
                    <?php

                        foreach ($school->result() as $value) {
                            echo "<option value='".$value->v_school_id."'>".$value->v_venue."</option>";
                        }
                    ?>
                             </select>
                          </div>
                          <div class="col-sm-9 offset-sm-3 select"><!-- importent-not2remove --></div>
                        <!-- first_option -->

                        <!-- second -->
                        <div class="line"></div>
                        <label class="col-sm-3 form-control-label">Select Exam</label>
                          <div class="col-sm-9 select">
                            <select id="exam" class="form-control">
                              <option value="">--- No Exam Selected ---</option>
                    <?php 
                        foreach ($exam->result() as  $val) {
                            echo "<option value='".$val->exam_id."'>".$val->exam_name."</option>";
                        }
                    ?>
                </select>
                          </div>
                          <div class="col-sm-9 offset-sm-3 select"><!-- importent-not2remove --></div>
                <!-- second -->

                <!-- third -->
                <div class="line"></div>
                 <label class="col-sm-3 form-control-label">Select Level</label>
                          <div class="col-sm-9 select">
                            <select id="level" class="form-control">
                              <option value="">--- No Level Selected ---</option>
                    <?php
                        foreach ($level as  $value) {
                            echo "<option value='".$value->level_id."'>".$value->level_name."</option>";
                        }
                    ?>
                </select>
                          </div>
                          <div class="col-sm-9 offset-sm-3 select"><!-- importent-not2remove --></div>
                <!-- third -->
              </div>
            </div>
          </div>
                <!-- head_menu(selsect) -->
                <!-- table -->
                <div id="table_list">
            
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
  </body>

 <!-- Script -->
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

  <script type='text/javascript'>

  // baseURL variable
  var baseURL= "<?php echo base_url();?>";
 
  $(document).ready(function(){
    $('#school').change(function(){
      // $('#exam').find('option').not(':first').remove();
       $('#level').find('option').not(':first').remove();
    });

 
    // school change
    
 
   // Department change
   $('#exam').change(function(){
     var exam = $(this).val();
//alert(exam);
     // AJAX request
     $.ajax({
       url:'<?=base_url()?>index.php/result/get_level',
       method: 'post',
       data: {exam: exam},
       dataType: 'json',
       success: function(response){
          
         // Remove options
         $('#level').find('option').not(':first').remove();

         // Add options
         $.each(response,function(index,data){
           $('#level').append('<option value="'+data['level_id']+'">'+data['level_name']+'</option>');

         });
       }
    });
  });
 
//table_display

   $('#level').change(function(){
     var level = $(this).val();
     var exam  = $('#exam').val();
     var school= $('#school').val();

     // AJAX request
     $.ajax({
      url: '<?=base_url()?>index.php/result/get_table',
      method: 'post',
      data: {
              school:school,exam:exam,level:level,
            },
      dataType:'html' ,
      success: function(response){
        
      $('#table_list').html(response);
      },
     });
     
  });





});



 
 </script>
</html>
