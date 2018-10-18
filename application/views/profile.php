<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  

    <title>Edit Profile</title>

    <!-- Bootstrap core CSS-->
    <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Custom fonts for this template-->
    <link href="../../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="../../assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../assets/css/sb-admin.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="index">Doctor's Profile</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <span class="badge badge-danger">9+</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-envelope fa-fw"></i>
            <span class="badge badge-danger">7</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#">Settings</a>
            <a class="dropdown-item" href="#">Activity Log</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
          </div>
        </li>
      </ul>

    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
     <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="index">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Appointments</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Screens:</h6>
            <a class="dropdown-item" href="appointments">View Appointments</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profile">
            <i class="fa fa-user-md"></i>
            <span>Edit Profile</span></a>
        </li>
        
      </ul>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Edit Profile</li>
          </ol>

          <!-- Area Chart Example-->
           <div class="col-lg-12">
            <section class="panel">
             <div class="col-md-6 portlets">
            <div class="panel panel-default">
              <div class="panel-heading">
                <div class="pull-left"><b>EDIT PROFILE</b></div>
                <div class="widget-icons pull-right">
                  
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="panel-body">
                <div class="padd">

                  <div class="form quick-post">
                    <!-- Edit profile form (not working)-->
                    <form class="form-horizontal" method="post" action="userdb.php">
                      <!-- Title -->
                      <div class="form-group">
                        <label class="control-label col-lg-2" for="title">First Name</label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" id="title" name="fname">
                        </div>
                      </div>
                      <!-- Content -->
                      <div class="form-group">
                        <label class="control-label col-lg-2" for="title">Last Name</label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" id="title" name="lname">
                        </div>
                      </div>

                      <!-- Cateogry -->
                      <div class="form-group">
                        <label class="control-label col-lg-2">Gender</label>
                        <div class="col-lg-10">
                          <select class="form-control" name="gender" >
                                                  <option value="">- Choose Gender -</option>
                                                  <option value="Male" name="gender">Male</option>
                                                  <option value="Female" name="gender">Female</option>
                                                </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-2" for="content">Proffesion</label>
                        <div class="col-lg-10">
                          <textarea class="form-control" id="content" name="skill"></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-2" for="content">About</label>
                        <div class="col-lg-10">
                          <textarea class="form-control" id="content" name="about"></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-2" for="tags">Email</label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" id="tags" name="email">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-2" for="title">Nationality</label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" id="title" name="nationality">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-2">Category</label>
                        <div class="col-lg-10">
                          <select class="form-control" name="category">
                                                  <option value="">- Choose Cateogry -</option>
                                                  <option value="Blue-Collar">Blue-Collar</option>
                                                  <option value="White-Collar">White-Collar</option>
                                                </select>
                        </div></div>
                       <div class="form-group">
                        <label class="control-label col-lg-2" for="tags">Mobile</label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" id="tags" name="mobile">
                        </div>
                      </div>
                      <br>
                      <!-- Buttons -->
                                  <div class="col-md-6 pl-1">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input type="password" class="form-control" placeholder="Password" name="pass">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 pl-1">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Verify Password</label>
                                                    <input type="password" class="form-control" placeholder="Verify Password" name="vpass">
                                                </div>
                                                <span class="error" id="confirm-error"><?php echo $cpass_err;?></span><br>
                                            </div>
                                        </div>
                                        <button type="submit" name="update" class="btn btn-info btn-fill pull-right">Update Profile</button>
                                        <button type="reset" class="btn btn-default">Reset</button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <div>
        <div>
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

    <!-- Page level plugin JavaScript-->
    <script src="../../assets/vendor/chart.js/Chart.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../assets/js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="../../assets/js/demo/chart-area-demo.js"></script>
    <script src="../../assets/js/demo/chart-bar-demo.js"></script>
    <script src="../../assets/js/demo/chart-pie-demo.js"></script>

  </body>

</html>
