<?php 
session_start(); 
if(!$_SESSION['fac']){ 
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

    <title>ADD DEPENDANT</title>

    <!-- Bootstrap core CSS-->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin.css" rel="stylesheet">

  </head>

  <body class="bg-dark">
    <center><h2 style="color: white;padding-top: 50px;">ADD DEPENDANT</h2></center>
		<form id='login' action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" accept-charset='UTF-8' class="login-form"> 
      <input type='hidden' name='submitted' id='submitted' value='1'/>
    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Add Dependant</div>
        <div class="card-body">
          <form>
            <div class="form-group">
              <div class="form-label-group">
              	<input type="text"  id="inputEmail" class="form-control" placeholder="Name" name="name" required />
                <label for="inputEmail">Name</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text"  id="inputEmail" class="form-control" placeholder="Father Name" name="f_name" required />
                <label for="inputEmail">Father Name</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text"  id="inputEmail" class="form-control" placeholder="Mother Name" name="m_name" required />
                <label for="inputEmail">Mother Name</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text"  id="inputEmail" class="form-control" placeholder="Mother Name" name="user" required />
                <label for="inputEmail">Username</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text"  id="inputEmail" class="form-control" placeholder="Mother Name" name="pass" required />
                <label for="inputEmail">Password</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="inputEmail" class="form-control" placeholder="Password" name="b_group" required="required">
                <label for="inputPassword">Blood Group</label>
              </div>
            </div>
            <input type="submit" class="btn btn-primary btn-block" name="submit" value="Add Dependant"><br>
            <input type="button" value="Back" class="btn btn-primary btn-block" onclick="window.location.href='/health/faculty/home.php'"> 
          </form>
          <div class="text-center">
            <span class='error'></span>
            <!--<a class="d-block small" href="forgot-password.html">Forgot Password?</a>--><br>
            
           <?php
if (isset($_POST['submit'])) {
  $dbHost = "localhost";        //Location Of Database usually its localhost 
    $dbUser = "root";            //Database User Name 
    $dbPass = "";            //Database Password 
    $dbDatabase = "health";    //Database Name 
  $db = mysqli_connect($dbHost,$dbUser,$dbPass,$dbDatabase)or die("Error connecting to database."); 
  $raw_results = mysqli_query($db,"INSERT INTO `dependant`(`username`, `password`, `name`, `f_name`, `m_name`, `b_group`, `dependant_on`) VALUES ('".$_POST['user']."','".$_POST['pass']."','".$_POST['name']."','".$_POST['f_name']."','".$_POST['m_name']."','".$_POST['b_group']."','".$_SESSION['username']."')") or die(mysql_error());
  header("Location: home.php");
}
?>
          </div>
        </div>
      </div>
    </div>
    <style type="text/css">
      blink {
    -webkit-animation: 1s linear infinite condemned_blink_effect; // for android
    animation: 1s linear infinite condemned_blink_effect;
    color: red;
}
@-webkit-keyframes condemned_blink_effect { // for android
    0% {
        visibility: hidden;
    }
    50% {
        visibility: hidden;
    }
    100% {
        visibility: visible;
    }
}
@keyframes condemned_blink_effect {
    0% {
        visibility: hidden;
    }
    50% {
        visibility: hidden;
    }
    100% {
        visibility: visible;
    }
}
    </style>
    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
</form>
  </body>

</html>