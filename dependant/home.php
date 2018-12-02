<?php 
session_start(); 
if(!$_SESSION['dep']){ 
    header("Location: index.php"); 
    exit; 
} 
?> 

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dependant Dashboard</title>

    <!-- Bootstrap core CSS-->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="home.php">HMS</a>

      
      </button>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
          
          <div class="input-group-append">
            
            </button>
          </div>
        </div>
      </form>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        
        
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">Logout</a>
          </div>
        </li>
      </ul>
    </nav>
    <div id="wrapper">
      <div id="content-wrapper">
        <div class="container-fluid">
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Dashboard</div>
            <div class="card-body">
              <div class="table-responsive">
        
<center>
      <h5>Health Record </h5></center>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
   <?php
  $dbHost = "localhost";        //Location Of Database usually its localhost 
    $dbUser = "root";            //Database User Name 
    $dbPass = "";            //Database Password 
    $dbDatabase = "health";    //Database Name 
    $reg= $_SESSION['username'];
  $db = mysqli_connect($dbHost,$dbUser,$dbPass,$dbDatabase)or die("Error connecting to database."); 
  $raw_results = mysqli_query($db,"SELECT * FROM dependant
            WHERE username='$reg'") or die(mysql_error());
  $result = mysqli_fetch_array($raw_results)
      ?>
      <tr>
        <td><label>Registration Number</label></td>
        <td><?php echo $reg ?></td>
      </tr>
      <tr>
        <td><label>Name</label></td>
        <td><?php echo $result['name'] ?></td>
      </tr>
      <tr>
        <td><label>Father Name</label></td>
        <td><?php echo $result['f_name'] ?></td>
      </tr>
      <tr>
        <td><label>Mother Name</label></td>
        <td><?php echo $result['m_name'] ?></td>
      </tr>
      <tr>
        <td><label>Blood Group</label></td>
        <td><?php echo $result['b_group'] ?></td>
      </tr>
      <tr>
        <td><label>Dependant on</label></td>
        <td><?php echo $result['dependant_on'] ?></td>
      </tr>
        </table>
        <?php
  $dbHost = "localhost";        //Location Of Database usually its localhost 
    $dbUser = "root";            //Database User Name 
    $dbPass = "";            //Database Password 
    $dbDatabase = "health";    //Database Name 
  $db = mysqli_connect($dbHost,$dbUser,$dbPass,$dbDatabase)or die("Error connecting to database."); 
  $raw_results = mysqli_query($db,"SELECT * FROM `medication` WHERE username='$reg'") or die(mysql_error()); 
  ?>
  <hr>
    <center><h5>Previous Medication</h5></center>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
      <tr>
        <th>Date</th>
        <th>Symptoms</th>
        <th>Conclusion</th>
        <th>Medication</th>
        <th>Refered Doctor</th>
      </tr>
    </thead>
    <?php
    if (mysqli_num_rows($raw_results) < 1) {
      ?>
      <tr>
        <td colspan="5" style="text-align: center;">NO Data</td>
      </tr>
      <?php
    }
    while ($result = mysqli_fetch_array($raw_results)) {
      ?>
      <tr>
        <td><?php echo $result['date'] ?></td>
        <td><?php echo $result['symptoms'] ?></td>
        <td><?php echo $result['conclusion'] ?></td>
        <td><?php echo $result['medication'] ?></td>
        <td><?php echo $result['doctor_name'] ?></td>
      </tr>
      <?php
    }
    ?>
    </table>
    
              </div>
            </div>
            
          </div>

        </div>
        <!-- /.container-fluid -->

        

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
          <div class="modal-body">Do you really want to Logout?</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="../vendor/chart.js/Chart.min.js"></script>
    <script src="../vendor/datatables/jquery.dataTables.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="../js/demo/datatables-demo.js"></script>
    <script src="../js/demo/chart-area-demo.js"></script>

  </body>

</html>
