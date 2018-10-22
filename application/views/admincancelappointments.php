<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Patient Appointment</title>

    <!-- Bootstrap core CSS-->
    <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="../../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../assets/css/sb-admin.css" rel="stylesheet">
      <link href="../../assets/clockpicker.css" rel="stylesheet">
        <link href=" https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">



  </head>

  <body id="page-top">

  
 
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
          <a class="nav-link" href="<?= base_url("user_controller/adminreg");?>">
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
          <a class="nav-link" href="#">
           <i class="fa fa-times"style="color:red" aria-hidden="true"></i>
            <span>Cancel Appointments</span></a>
        </li>
      </ul>
      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Book Appointment</li>
          </ol>

          <!-- Page Content -->
          <h1>Appointments</h1>
		  <?php echo @$error; ?>
          <hr>
          <div class="card-body">
		  <div class="row">
		  <div class="col-md-12">
		  <div class="table-responsive">
		  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
		  <thead>
                          <tr>
                      <th>Appointment </th>
                      <th> Date</th>
					  <th>Time</th>
					 
					  <th>Delete</th>
                    </tr>
            </thead>
			
			<tbody>
  <?php
  $i=1;
  foreach($results as $row)
  {
  echo "<tr>";
  echo "<td>".$i."</td>";
  echo "<td>".$row->Available_Date."</td>";
  echo "<td>".$row->Available_Time."</td>";
 
  echo "<td><a href='deletedata2?id=".$row->Patients_ID."'>Cancel Appointment</a></td>";
  echo "</tr>";
  $i++;
  }
   ?>
		</table>
			
		  </div>
		  </div>
		  </div>
		  </div>

        </div>
        <!-- /.container-fluid -->
        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Your Website 2018</span>
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
