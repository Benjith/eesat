<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Eesat| Login</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href=" <?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css">
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
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/favicon.png">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <div class="page login-page">
      <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
          <div class="row">
            <!-- Logo & Information Panel-->
            <div class="col-lg-6">
              <div class="info d-flex align-items-center">
                <div class="content">
                  <div class="logo">
                    <h1>Dashboard</h1>
                  </div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
              </div>
            </div>
            <!-- Form Panel    -->
            <div class="col-lg-6 bg-white">
              <div class="form d-flex align-items-center">
                <div class="content">
                   <form id='login-form' method="post" > 
                    <div class="form-group">
                      <input id="login-username" type="text" name="username" required="" class="input-material"  id="usernames">
                      <label for="login-username" class="label-material">User Name</label>
                        <span class="text-danger"><?php echo form_error('username'); ?></span>
                    </div>
                    <div class="form-group">
                      <input id="login-password" type="password" name="password" required="" class="input-material" id="passwords">
                      <label for="login-password" class="label-material">Password</label>
                        <span class="text-danger"><?php echo form_error('password'); ?></span>
                      </div><input type='submit'  class="btn btn-primary" name="insert" value="Login" id="login"> <?php echo '<label class="text-danger">'.$this->session->flashdata

("error").'</label>';  
                     ?> 
                   
                    <!-- This should be submit button but I replaced it with <a> for demo purposes-->
                  </form><a href="#" class="forgot-pass">Forgot Password?</a><br><small>Do not have an account? </small><a href="register.html" class="signup">Signup</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="copyrights text-center">
        <p>Design by <a href="http://sysol.org" class="external" style='color:3ff5200'>sysol</a></p>
        <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
      </div>
    </div>
    <!-- Javascript files-->
     <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="<?php echo base_url(); ?>/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="<?php echo base_url(); ?>/assets/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/charts-home.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/front.js"></script>
    <script type="text/javascript">
      $('#login').click(function() {
        /* Act on the event */
        var username=$('#usernames').val();
        var password=$('#passwords').val();
      
      $.ajax({
        url: '<?php echo site_url('login/login_check');?>',
        type: 'POST',
        dataType: 'html',
        data: {username:username,password:password},
      })
      .done(function() {
        console.log("success");
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      });
      });

    </script>
  </body>
</html>