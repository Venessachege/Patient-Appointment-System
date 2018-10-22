<!DOCTYPE html> 
<html>
  <head> 
  <title>Google Chart and Codeigniter with MySQL</title> 
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

    <!--Load the AJAX API--> 
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> 
   
  </head> 
 
  <body> 
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
          <a class="nav-link" href="#">
            <i class="fa fa-address-card" style="color:red" aria-hidden="true"></i>
            <span>Book Appointments</span></a>
        </li>
            <li class="nav-item">
          <a class="nav-link" href="<?= base_url("user_controller/appointments");?>">
           <i class="fa fa-times"style="color:red" aria-hidden="true"></i>
            <span>Cancel Appointments</span></a>
        </li>
      </ul>
    <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
           
            <li class="breadcrumb-item active">Data Analytics/Registered Doctors</li>
          </ol>
         <script type="text/javascript"> 
        
     
    // Load the Visualization API and the piechart package. 
    google.charts.load('current', {'packages':['corechart']}); 
       
    // Set a callback to run when the Google Visualization API is loaded. 
    google.charts.setOnLoadCallback(drawChart); 
       
    function drawChart() { 
      var jsonData = $.ajax({ 
          url: "<?php echo base_url('charts_controller/getdata');?>", 
          dataType: "json", 
          async: false 
          }).responseText; 
           
      // Create our data table out of JSON data loaded from server. 
      var data = new google.visualization.DataTable(jsonData); 
 
      // Instantiate and draw our chart, passing in some options. 
      var chart = new google.visualization.BarChart(document.getElementById('chart_div')); 
      chart.draw(data, {width: 1000, height: 500}); 
    } 
 
    </script> 
<style> 
h1 { 
    text-align: center; 
} 
</style> 
    <div id="chart_div"></div> 
      </div>
  </body> 
</html>