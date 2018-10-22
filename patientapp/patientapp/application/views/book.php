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

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="#">Patient <?= @$First_name;?> <?= @$Last_name;?></a>

    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="home">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Home</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="book">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Book Appointment</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="appointments">
            <i class="fas fa-fw fa-table"></i>
            <span>Entries</span></a>
        </li>
		<li class="nav-item">
          <input type="button" class="btn btn-primary btn-block" name="logout" value="LOGOUT"></button>
        </li>
      </ul>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Book</a>
            </li>
            <li class="breadcrumb-item active">Book Appointment</li>
          </ol>

          <!-- Page Content -->
          <h1>Book an Appointment</h1>
		  <?php echo @$error; ?>
          <hr>
        <div class="card-body">
          <form method="post">
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-4">
                  <div class="form-label-group">
                    <input type="date" id="lastName" name="availabletime" class="form-control" placeholder="Last name" required="required">
                    <label for="lastName">Available Date</label>
                  </div>
                </div>
				 <div class="col-md-4">
					<div class="input-group clockpicker"  data-align="top" data-autoclose="true">
					<label>Available Time</label>
    <input type="text" class="form-control" name="time" value="13:14">
    <span class="input-group-addon">
        <span class="glyphicon glyphicon-time"></span>
    </span>
</div>
                  </div>
                
				<div class="col-md-4">
                    <select class="form-control" name="doctorid">
					<?php foreach($groups as $row){ ?>
					<option value="<?php echo $row->Doctors_id; ?>"><?php echo $row->First_Name; ?> - <?php echo $row->Type; ?></option>';
					<?php } ?>
					</select>
                  </div>
                </div>
              </div>
            </div>
            </div>
            <input type="submit" class="btn btn-primary btn-block" name="book_appointment" value="book">
          </form>
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
    <script src="../../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../assets/js/sb-admin.min.js"></script>
	<script src="../../assets/clockpicker.js"></script>
	<script type="text/javascript">
$('.clockpicker').clockpicker();
</script>
	
	

  </body>

</html>
