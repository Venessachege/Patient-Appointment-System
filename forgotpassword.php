
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Login</title>

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
      <div class="card card-login mx-auto mt-5">
        <div class="card-header" style="text-align:center;font-weight:100;font-family: 'Black Ops One';font-size: 20px;">Password Reset</div>
        <div class="card-body">
             <?php
              $success_msg= $this->session->flashdata('success_msg');
              $error_msg= $this->session->flashdata('error_msg');
 
                  if($success_msg){
                    ?>
                    <div class="alert alert-success">
                      <?php echo $success_msg; ?>
                    </div>
                  <?php
                  }
                  if($error_msg){
                    ?>
                    <div class="alert alert-danger">
                      <?php echo $error_msg; ?>
                    </div>
                    <?php
                  }
                  ?>
          <form action="<?php echo base_url('user_controller/changepassword');?>" method="post">
            <div class="form-group">
              <div class="form-label-group">
                <input type="email" id="Email"  name="Email"class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
                <label for="inputEmail">Email address</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                    <input type="password" id="Password" name="Password" class="form-control" placeholder="Old Password" required="required" autofocus="autofocus">
                    <label for="Password">Old Password</label>
                  </div>
            </div>
             <div class="form-group">
              <div class="form-label-group">
                    <input type="password" id="newpassword" name="newpassword" class="form-control" required="required" autofocus="autofocus">
                    <label for="Password">New Password</label>
                  </div>
            </div>
                <div class="form-group">
              <div class="form-label-group">
                    <input type="password" id="confirmpassword" name="confirmpassword" class="form-control"  required="required" autofocus="autofocus">
                    <label for="Password">Confirm Password</label>
                  </div>
            </div>
           
            <button class="btn btn-primary btn-block"  name="reset">Reset</button>
          </form>
          <div class="text-center">
            
            <a class="d-block small" href="<?= base_url("user_controller/login_user");?>">Login</a>
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
