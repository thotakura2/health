<?php 
session_start(); 
if(!$_SESSION['logged']){ 
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

    <title>Admin Dashboard</title>

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

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
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

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item ">
          <a class="nav-link" href="home.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>

        <li class="nav-item active">
          <a class="nav-link" href="search.php">
            <i class="fab fa-accessible-icon"></i>
            <span>Search Health records</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="case.php">
            <i class="fas fa fa-user-md"></i>
            <span>Start New case</span></a>
        </li>
      </ul>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Search Health records</li>
          </ol>
         <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Hello <?php echo $_SESSION['name']?></a>
            </li>
           
          </ol>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Enter Registration Number to search details.</div>
            <div class="card-body">
              <div class="table-responsive">
                <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0" action="search.php" method="GET">
        <div class="input-group">
            <p></p>
          <input type="text" class="form-control"  aria-label="Search" aria-describedby="basic-addon2" name="search" required>
          <div class="input-group-append">
            <input type="submit" class="btn btn-primary" value="Search">
          </div>
        </div>

      </form> <hr>
       <center><h5>Student Results</h5></center>
        <?php
if (isset($_GET['search'])) {
  $dbHost = "localhost";        //Location Of Database usually its localhost 
    $dbUser = "root";            //Database User Name 
    $dbPass = "";            //Database Password 
    $dbDatabase = "health";    //Database Name 
  $db = mysqli_connect($dbHost,$dbUser,$dbPass,$dbDatabase)or die("Error connecting to database."); 
  $search = $_GET['search']; 
  $raw_results = mysqli_query($db,"SELECT * FROM users
            WHERE (`username` LIKE '%".$search."%')") or die(mysql_error());
  if(mysqli_num_rows($raw_results) > 0){ 
  // if one or more rows are returned do following
    ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                 <thead>
                <tr>
                  <th>Reg. No</th>
                  <th>Name</th>
                  <th></th>
                </tr>
              </thead><tbody><?php
            while($results = mysqli_fetch_array($raw_results)){
            // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
             ?>
             <tr>
              <td><?php echo $results['username']; ?></td>
              <td><?php echo $results['name']; ?></td>
              <td style="width: 10%"><button class="btn btn-primary" onclick="location.href = 'display.php?regno=<?php echo $results['username'] ?>&tab=users';">Select</button></td>
             </tr>
       
                <?php
            }
            ?>
        </tbody>
                </table>
                <?php
                }
        else{ // if there is no matching rows do following
            echo "No results";
        }
}
?>

       <center><h5>Faculty Results</h5></center>
        <?php
if (isset($_GET['search'])) {
  $dbHost = "localhost";        //Location Of Database usually its localhost 
    $dbUser = "root";            //Database User Name 
    $dbPass = "";            //Database Password 
    $dbDatabase = "health";    //Database Name 
  $db = mysqli_connect($dbHost,$dbUser,$dbPass,$dbDatabase)or die("Error connecting to database."); 
  $search = $_GET['search']; 
  $raw_results = mysqli_query($db,"SELECT * FROM faculty
            WHERE (`username` LIKE '%".$search."%')") or die(mysql_error());
  if(mysqli_num_rows($raw_results) > 0){ 
  // if one or more rows are returned do following
    ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                 <thead>
                <tr>
                  <th>Username</th>
                  <th>Name</th>
                  <th></th>
                </tr>
              </thead><tbody><?php
            while($results = mysqli_fetch_array($raw_results)){
            // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
             ?>
             <tr>
              <td><?php echo $results['username']; ?></td>
              <td><?php echo $results['name']; ?></td>
              <td style="width: 10%"><button class="btn btn-primary" onclick="location.href = 'display.php?regno=<?php echo $results['username'] ?>&tab=faculty';">Select</button></td>
             </tr>
       
                <?php
            }
            ?>
        </tbody>
                </table>
                <?php
                }
        else{ // if there is no matching rows do following
            echo "<i>No results</i>";
        }
}
?>
<center>
    <h5>Dependant Results</h5></center>
    
    <?php
if (isset($_GET['search'])) {
  $dbHost = "localhost";        //Location Of Database usually its localhost 
    $dbUser = "root";            //Database User Name 
    $dbPass = "";            //Database Password 
    $dbDatabase = "health";    //Database Name 
  $db = mysqli_connect($dbHost,$dbUser,$dbPass,$dbDatabase)or die("Error connecting to database."); 
  $search = $_GET['search']; 
  $raw_results = mysqli_query($db,"SELECT * FROM Dependant
            WHERE (`username` LIKE '%".$search."%')") or die(mysql_error());
  if(mysqli_num_rows($raw_results) > 0){ 
  // if one or more rows are returned do following
    ?>
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Username</th>
                  <th>Name</th>
                  <th></th>
                </tr>
              </thead>
              <?php
            while($results = mysqli_fetch_array($raw_results)){
            // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
             ?>
             <tr>
              <td><?php echo $results['username']; ?></td>
              <td><?php echo $results['name']; ?></td>
              <td style="width: 10%"><button class="btn btn-primary" onclick="location.href = 'display.php?regno=<?php echo $results['username'] ?>&tab=dependant';">Select</button></td>
             </tr>
       
                <?php
            }
             echo "</table>";
        }
        else{ // if there is no matching rows do following
            echo "No results";
        }
}
?>

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
