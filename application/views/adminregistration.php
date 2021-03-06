<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Appointment</title>

    <!-- Bootstrap core CSS-->
    <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="../../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../assets/css/sb-admin.css" rel="stylesheet">
     <link href=" https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

  </head>

  <body id="page-top" >

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
                 <i class="fa fa-user-circle" style="color:red;"></i>

      <a class="navbar-brand mr-1" href="index.html">Admin</a>
   
    
       
     
          <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
         <a class="navbar-brand mr-1" href="<?php echo base_url('user_controller/logout');?>">Logout</a>
         
        </div>
      </form>

     
    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url("charts_controller/charts");?>">
          <i class="fa fa-home" style="color:red;" aria-hidden="true"></i>
            <span>Home</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="fa fa-user-circle" style="color:red;"></i>
            <span class="glyphicon glyphicon-user "aria-hidden="true" >Add Users</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url("user_controller/admindeleteusers");?>">
           <i class="fa fa-user-circle " style="color:red;"></i>
            <span class="glyphicon glyphicon-user "aria-hidden="true" >Delete Users</span></a>
        </li>
            <li class="nav-item">
          <a class="nav-link" href="<?= base_url("user_controller/adminbookappointments");?>">
            <i class="fa fa-address-card" style="color:red" aria-hidden="true"></i>
            <span>Book Appointments</span></a>
        </li>
            <li class="nav-item">
          <a class="nav-link" href="<?= base_url("user_controller/admincancelappointments");?>">
           <i class="fa fa-times"style="color:red" aria-hidden="true"></i>
            <span>Cancel Appointments</span></a>
        </li>
      </ul>

      <div id="content-wrapper">

        

          <!-- Page Content -->
          
        
        <div class="card-header" style="position:center;">Register an Account</div>
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
        <form  method="post" action="<?php echo base_url('user_controller/adminadduser');?>">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" id="First_name" class="form-control"name="First_name" placeholder="First name" required="required" autofocus="autofocus">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" id="Last_name" class="form-control" placeholder="Last Name" name="Last_name"required="required">
                  </div>
                </div>
              </div>
            <div class="form-group">
          <div class="form-row">
             <div class="col-md-6">
              <div class="form-group">
                <input type="email" id="Email" class="form-control" placeholder="Email address" name="Email" required="required">
              </div>
            </div>
               <div class="col-md-6">
              <div class="form-group">
                <input type="text" id="Usertype_id" class="form-control" placeholder="Usertype" name="Usertype_id" required="required">
              </div>
            </div>
                </div>
                </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="password" id="password" class="form-control" name="password"placeholder="Password" required="required">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="password" id="confirmpassword" class="form-control" name="confirmpassword"placeholder="Confirm password" required="required">
                  </div>
                </div>
              </div>
            </div>
            <button class="btn btn-primary btn-block" name="adduser" type="submit">Add</button>
          </form>
        
		  </div>
           <div class="card-header" style="position:center;">Register a Doctor</div>
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
        <form  method="post" action="<?php echo base_url('user_controller/adminadddoctor');?>">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" id="First_name" class="form-control"name="First_Name" placeholder="First name" required="required" autofocus="autofocus">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" id="Last_name" class="form-control" placeholder="Last Name" name="Last_Name"required="required">
                  </div>
                </div>
              </div>
            <div class="form-group">
          <div class="form-row">
             <div class="col-md-6">
              <div class="form-group">
                <input type="email" id="Email" class="form-control" placeholder="Email address" name="Email" required="required">
              </div>
            </div>
               <div class="col-md-6">
              <div class="form-group">
                <input type="text" id="Type" class="form-control" placeholder="Doctor Type" name="Type" required="required">
              </div>
            </div>
                </div>
                </div>
              <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="password" id="password" class="form-control" name="password"placeholder="Password" required="required">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="password" id="confirmpassword" class="form-control" name="confirmpassword"placeholder="Confirm password" required="required">
                  </div>
                </div>
              </div>
            </div>
            
            <button class="btn btn-primary btn-block" name="adduser" type="submit">Add</button>
          </form>
        
		  </div>
            
		  

        </div>
        <!-- /.container-fluid -->
        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Appointment System 2018</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

  </body>

</html>
