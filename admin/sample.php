<?php 
session_start(); 
if(!$_SESSION['logged']){ 
    header("Location: index.php"); 
    exit; 
} 

?> 





<body>
   
    <div class="w3ls-login box" style="background-color: #ffffff;">
        <h1 style="color: #111; font-size: 30px;">Student Medication Details</h1>
    </div>
    <div style="background-color: #ffffff;">
        <center>
    <?php $reg=$_GET['regno'] ?>
    <form id='login' action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" accept-charset='UTF-8' class="login-form" name="myForm"> 
        <table border="1"  style="background-color: #ffffff;width: 40%;">
            <?php
            $dbHost = "localhost";        //Location Of Database usually its localhost 
    $dbUser = "root";            //Database User Name 
    $dbPass = "";            //Database Password 
    $dbDatabase = "health";    //Database Name 
    $db = mysqli_connect($dbHost,$dbUser,$dbPass,$dbDatabase)or die("Error connecting to database."); 
    $reg= $_GET['regno'];
    $table=$_GET['tab'];
    $raw_results = mysqli_query($db,"SELECT * FROM $table
            WHERE username='$reg'") or die(mysql_error());
    $result = mysqli_fetch_array($raw_results)
            ?>
            <tr>
                <td><label>Registration Number</label></td>
                <td><input type="text" name="reg" value="<?php echo $reg ?>" disabled="disabled" style="padding: 2px;width: 100%;font-weight: 800;"></td>
            </tr>
            <tr>
                <td><label>Name</label></td>
                <td><input type="text" name="name" value="<?php echo $result['name'] ?>" disabled="disabled" style="padding: 2px;width: 100%;font-weight: 800;"></td>
            </tr>
            <tr>
                <td><label>Father Name</label></td>
                <td><input type="text" name="fname" value="<?php echo $result['f_name'] ?>" disabled="disabled" style="padding: 2px;width: 100%;font-weight: 800;"></td>
            </tr>
            <tr>
                <td><label>Mother Name</label></td>
                <td><input type="text" name="mname" value="<?php echo $result['m_name'] ?>" disabled="disabled" style="padding: 2px;width: 100%;font-weight: 800;"></td>
            </tr>
            <tr>
                <td><label>Blood Group</label></td>
                <td><input type="text" name="blood" value="<?php echo $result['b_group'] ?>" disabled="disabled" style="padding: 2px;width: 100%;font-weight: 800;"></td>
            </tr>
        </table>
<br>

<div>
    <?php
    $dbHost = "localhost";        //Location Of Database usually its localhost 
    $dbUser = "root";            //Database User Name 
    $dbPass = "";            //Database Password 
    $dbDatabase = "health";    //Database Name 
    $db = mysqli_connect($dbHost,$dbUser,$dbPass,$dbDatabase)or die("Error connecting to database."); 
    $raw_results = mysqli_query($db,"SELECT * FROM `medication` WHERE username='$reg'") or die(mysql_error()); 
    ?>
    <h2>Previous Medication</h2>
    <table border="1" width="50%">
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
                <td colspan="4" style="text-align: center;">NO Data</td>
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

<br>

<div class="form-group required">
    <h2>Please enter symptoms and medication given</h2>
        <table border="1" width="50%">
            <tr>
                <td>Symptoms<font style="color: red;">*</font></td>
                <td><input type="text" name="symptoms"  style="padding: 2px;background-color: #ffffff; color: #000;width: 100%;" required="required"></td>
            </tr>
            <tr>
                <td>Conclusion<font style="color: red;">*</font></td>
                <td><input type="text" name="conclusion"  style="padding: 2px;background-color: #ffffff; color: #000;width: 100%;" required="required"></td>
            </tr>
            <tr>
                <td>Medication<font style="color: red;">*</font></td>
                <td><input type="text" name="medicine"  style="padding: 2px;background-color: #ffffff; color: #000;width: 100%;" required="required"></td>
            </tr>
<script>
    function check(){
        if (document.getElementById('rbYes').checked) {
  document.getElementsByName("row")[0].style.display = "table-cell";
  document.getElementsByName("row1")[0].style.display = "table-cell";
  document.getElementById("doc").required = true;
}
else{
    document.getElementsByName("row")[0].style.display = "none";
  document.getElementsByName("row1")[0].style.display = "none";
  document.getElementById("doc").required = false;
    }
}
</script>
            <tr>
                <td><label for="yes_no_radio">Are you refering to any outside Doctor?<font style="color: red;">*</font></label></td>
                <td><p>
<input type="radio" name="yes_no" ID="rbYes" value="Yes" onclick="check();">Yes</input>
</p>
<p>
<input type="radio" name="yes_no" onclick="check();" ID="rbNo" checked value="No">No</input>
</p></td>
            </tr>
            <tr >
                <td name="row" style="display: none;">Doctor Name <font style="color: red;">*</font></td>
                <td name="row1" style="display: none;"><input type="text" id="doc" name="doctor_name"  style="padding: 2px;background-color: #ffffff; color: #000;width: 100%;"></td>
            </tr>
        </table>    
        </div>
        <br>

        <input type="hidden" name="reg" value="<?php echo $reg; ?>">
            <input type='submit' name='submit' value='Submit'  value="Sign in" style="width: 15%;" />
            <input type='button' name='back' value='Back' onclick="home.php" value="Sign in" style="width: 15%;" />
            
        </form>
        <br>
        
    </center>
    </div>

    <!-- //form ends here -->
    
</body>

</html>