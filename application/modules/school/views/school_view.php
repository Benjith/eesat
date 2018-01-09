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
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">
   
   <!-- dragable css -->
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.css">
   <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.fd.css">

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
              <h2 class="no-margin-bottom">School List</h2>
            </div>
          </header>
          <!-- Dashboard Counts Section-->

          <!-- add_school&serch_bar -->
          <!-- Inline Form-->
          <div class="container-fluid">

              
              <div class="row  " style="margin-top: 3%; ">

                <div class="col-lg-8">                           
                  <div class="card">
                    <div class="card-close">
                      <div class="dropdown">
                        <button type="button" id="closeCard3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard3" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                      </div>
                    </div>
                     <div class="alert alert-success" style="display:none;" id="insert_success">
                          <a class="close" aria-hidden="true" href="#" data-dismiss="alert">×</a>
                        Insertion Successfully!
                        </div>
                        <div class="alert alert-danger" style="display:none;" id="insert_error">
                          <a class="close" aria-hidden="true" href="#" data-dismiss="alert"></a>
                          <p id="error">Please try again<p>
                        </div>
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Add New School</h3>
                    </div>
                      
                    <div class="card-body">
                      
            
                        <form method="POST" class="form-inline" >
                        <!-- action=" echo site_url('school/ManualInsert');" -->
                        <div class="form-group">
                          <label for="inlineFormInput" class="sr-only">Name</label>
                          <input id="inlineFormInput" type="text" placeholder="Name" class="mx-sm-3 form-control" name="School_Name">
                        </div>
                        <div class="form-group">
                          <label for="inlineFormInputGroup" class="sr-only">Adress</label>
                          <input id="inlineFormInputGroup" type="text" placeholder="Address" class="mx-sm-3 form-control form-control" name="School_Address">
                        </div>
                        <div class="form-group">
                          <input type="submit" value="Add" name="Schoolsubmit" class="mx-sm-3 btn btn-primary" id="submit_school">
                        </div>
                      </from>
                        
                      
               
                    </div>
                  </div>
                </div>
                <!-- Modal Form-->
                <div class="col-lg-4">
                  <div class="card">
                    <div class="card-close">
                      <div class="dropdown">
                        <button type="button" id="closeCard4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard4" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                      </div>
                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Excel Upload</h3>
                    </div>
                    <div class="card-body text-center"  style="margin-bottom: 19px">
                      <form   enctype="multipart/form-data" action="<?php echo site_url('school/UploadAction');?>" >
                          <input type="file" name="userfile"  id="input-file">
                      
                        <input type="submit" id="open_btn" class="btn btn-primary">
                        
                      </form>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>

          <!-- add_school&serch_bar -->




         <!-- table -->
             <section class="dashboard-counts no-padding-bottom">
            <div class="container-fluid">
               <div class="alert alert-success" style="display:none;" id="delete_success">
                          <a class="close" aria-hidden="true" href="#" data-dismiss="alert">×</a>
                        Deleted Successfully!
                        </div>
                        <div class="alert alert-danger" style="display:none;" id="delete_error">
                          <a class="close" aria-hidden="true" href="#" data-dismiss="alert"></a>
                          <p id="error">Please try again<p>
                        </div>
              <div class="row bg-white has-shadow">
               
                    <div class="card-body">
                     <!--  <div class=""></div> -->
                      
                      <table class="table table-striped" id="list">
                        <thead>
                          <tr>
                            <th>Sl.No</th>
                            <th>School Name</th>
                            <th>School Address</th>
                            <th><input type="checkbox" name="selectAll" id="select_all">SelectAll<br><button value="DELETE" id="delete" class="btn btn-danger bnt-xs"><i class="fa  fa-bitbucket fa-1x" ></i></button> 
        </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                             <?php 
                             $cout=1;
                              foreach ($results as $row): 
                               ?>
                            <th scope="row"><?php echo $cout++;?> </th>
                            <td><?php echo $row->school_name;?></td>
                            <td><?php echo $row->school_address;?></td>
                            <td><input type="checkbox" name="school_id" class="select" value="<?php echo $row->school_id ?>"></td>
                          </tr>
                          <?php endforeach ?>
                        </tbody>
                      </table>
                    </div>
			</div>
				 </div>
        
				</section>
                
                
           
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
    <script  src="<?php echo base_url(); ?>asse      ts/js/dropzone.js"></script>
    <!-- <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script> -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/charts-home.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/front.js"></script>
    <script  src="<?php echo base_url(); ?>assets/js/bootstrap.fd.js"></script>
   <!--  datatable -->
    <script type="text/javascript">
      $(document).ready(function() {
        $('#list').DataTable();
      } );

    // <!-- select js -->
      $('#select_all').click(function(){
            if($(this).prop("checked")) {
                $(".select").prop("checked", true);
            } else {
                $(".select").prop("checked", false);
            }                
        });
           
     </script>
     <!-- delete -->
     <script type="text/javascript">
     $("#delete").click(function(){
       var con=confirm("Do you want to continue....?");
       var val=new Array();
       var $tr = $(this).closest('tr');
       $('input:checkbox.select').each(function () {
       if(this.checked)
       {
      val.push($(this).val());
       }
      });
      if(con==true)
      {
       $.ajax({
         type: "GET",
         url:"<?php echo site_url('school/school/Delete'); ?>", 
         data: {school_id:val,
         },
         dataType: "html",  
         cache:false,
         success: 
            function(msg){
              
                 $('#delete_error').hide();
                                       $('#delete_success').show().delay(5000).fadeOut();
                                       
                                      $('input:checkbox.select').each(function()
                                      {
                                     if($(this).prop("checked"))
                                       {
                                        
                              $(this).closest('tr').animate( {backgroundColor:'yellow'}, 1000).fadeOut(1000,function() {
                              $(this).closest('tr').remove();
                             });
                                        
                                       }
                                      }); 
                                     
          
            
                    },
            //  error: 
            // function(error){
            // alert(error);  //as a debugging message.
            // }
          });
}
       
       });  
  </script>
  <script type="text/javascript">
     $('#submit_school').click(function() {
  
      var school_name=$('#inlineFormInput').val();
      var school_address=$('#inlineFormInputGroup').val();
   
    $.ajax({
         type: "POST",
         url:"<?php echo site_url('school/ManualInsert'); ?>", 
         data: {school_name:school_name,school_address:school_address
         },
         dataType: "json",  
         cache:false,
         success: 
            function(msg){
              $('#insert_error').hide();
               $('#insert_success').show().delay(5000).fadeOut();
              
              
       },
     });
  });
     </script>
       </script>
<script type="text/javascript">
  $('#print').click(function() {
    /* Act on the event */

  $.ajax({
    url: '<?php echo site_url('student/Get_Hall_ticket');?>',
    type: 'POST',
    dataType: 'json',
    data: {schoolid: school},
    success:function(res){
      
    }
  })
  
  });
 


</script>
     
     
  </body>
</html>