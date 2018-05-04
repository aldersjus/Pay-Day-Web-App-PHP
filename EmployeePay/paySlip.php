<?php

session_start();

if($_SESSION["worker"] == null){
    header("Location: http://localhost:8080/EmployeePay/index.php"); 
}

    
if($_GET["month"] != null && $_GET["database"] != null){
  
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "staff";
$paySlip = array();

$conn = mysqli_connect($servername, $username, $password, $dbname);
if(mysqli_error($conn)){
    
    die("Ërror Connecting");
}

$sql = "SELECT * FROM ".$_GET["database"];

if($result = mysqli_query($conn, $sql)){
    $found = false;
    while($row = mysqli_fetch_array($result)){
      
        if($row[2] == $_GET["month"]){
          $paySlip[0] = $row[0];
          $paySlip[1] = $row[1];
          $paySlip[2] = $row[2];
          $paySlip[3] = $row[3];
          $paySlip[4] = $row[4];
          $paySlip[5] = $row[5];
          $paySlip[6] = $row[6];
          $paySlip[7] = $row[7];
          $paySlip[8] = $row[8];
          $paySlip[9] = $row[9];
          $paySlip[10] = $row[10];
          $paySlip[11] = $row[11];
          $paySlip[12] = $row[12];
          $found = true;
          break;
        }
        
    }
    if(!$found){
        header("Location: http://localhost:8080/EmployeePay/unavailable.html"); 
    }
}else{
    header("Location: http://localhost:8080/EmployeePay/unavailableDatabase.html"); 
}
mysqli_close($conn);
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Pay Slip</title>
   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="bootstrap/js/bootstrap.min.js">
    <link rel="stylesheet" type="text/css" href="some.css">
</head>
<body>
    
     <nav class="navbar navbar-primary bg-primary">
            <a class="navbar-brand" href="#"><label class="text-white">Employee System</label></a>
         <ul class="nav">
             <li class="nav-item">
                  <p class="nav-link active"><a class="text-white" href="userPage.php">User Page</a></p>
             </li>
             <li class="nav-item">
                  <p class="nav-link active"><a class="text-white" href="logoutPage.php">Logout Page</a></p>
             </li>  
        </ul>     
    </nav>
    
    
    <div class="container" id="main">
	<div id="top">
			
			<br>
			<?php echo "Logged in as ". $_SESSION["worker"]."."; ?>
			<br><br>
            <hr>
            <h3>This month's salary.</h3>
	
			<br><br>
	</div>
	
	       <div>
                <table class="table table-bordered">
                    <tr><?php echo
                        "<th>".$paySlip[1]." </th>
                        <th> </th>
                        <th>  ".$paySlip[2]."</th>
                        <th> </th>"
                    ?>
                    </tr>
                    <tr>
                        <td>Hours Worked</td>
                        <td> <?php echo $paySlip[3]?></td>
                        <td>Overtime Worked</td>
                        <td> <?php echo $paySlip[4] ?></td>
                    </tr>

                    <tr>
                        <td>Base Pay</td>
                        <td> <?php echo $paySlip[5] ?></td>
                        <td>Overtime Pay</td>
                        <td><?php echo $paySlip[6] ?></td>
                    </tr>

                    <tr>
                        <td>Shift Allowance</td>
                        <td> <?php echo $paySlip[7] ?></td>
                        <td>Regularity Allowance</td>
                        <td> <?php echo $paySlip[8] ?></td>
                    </tr>

                    <tr>
                        <td>Health Deduction</td>
                        <td> <?php echo $paySlip[9] ?></td>
                        <td>Tax</td>
                        <td><?php echo $paySlip[10] ?></td>
                    </tr>

                    <tr>
                        <td>Total Pay</td>
                        <td> <?php echo $paySlip[11] ?></td>
                        <td>Actual Pay</td>
                        <td> <?php echo $paySlip[12] ?></td>
                    </tr>
                </table>
	       </div>
	</div>
</body>
</html>












