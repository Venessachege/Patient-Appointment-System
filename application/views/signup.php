
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register</title>

    <!-- Bootstrap core CSS-->
    <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="../../assets/css/sb-admin.css" rel="stylesheet">
       <link href="../../assets/css/style.css" rel="stylesheet">
      <link href='https://fonts.googleapis.com/css?family=Black Ops One' rel='stylesheet'>
      

  </head>

  <body class="signbody">

    <div class="container">
      <div class="card card-register mx-auto mt-5">
          <div class="card-header" style="text-align:center;font-weight:300;font-family: 'Black Ops One';font-size: 18px;">Patient Appointment System</div>
<!--        <div class="card-header">Register an Account</div>-->
        <div class="card-body">
            <?php
                  $error_msg=$this->session->flashdata('error_msg');
                  if($error_msg){
                    echo $error_msg;
                  }
                   ?>
          <form  method="post" action="<?php echo base_url('user_controller/register_user');?>">
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                   
                  <div class="form-group">
                    <input type="text" id="firstName" name="First_name" class="form-control" placeholder="First name" required autofocus="autofocus">
                   
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" id="LastName" name="Last_name" class="form-control" placeholder="Last name" required autofocus>
                   
                  </div>
                </div>
              </div>
            </div>
               <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                   
                  <div class="form-group">
                    <input type="text" id="Email" name="Email" class="form-control" placeholder="Email" required="required" autofocus="autofocus">
                  
                  </div>
                </div>
               <div class="col-md-6">
                   
                  <div class="form-group">
                    <input type="password" id="Password" name="Password" class="form-control" placeholder="Password" required="required" autofocus="autofocus">
                   
                  </div>
                </div>
              </div>
            </div>
              <div class="form-group">
              <div class="row">
                
               <div class="col-md-12">
                   
                  <div class="form-group">
                    <input type="password" id="confirmpassword" name="confirmpassword" class="form-control" placeholder="Confrim Password" required="required" autofocus="autofocus">
                   
                  </div>
                </div>
              </div>
            </div>
          
            <button class="btn btn-primary btn-block"  type="submit" name="register" >Register</button>
          </form>
          <div class="text-center">
            <a class="d-block small mt-3" href="<?= base_url("user_controller/login_user");?>">Login Page</a>
            <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>

</html>
