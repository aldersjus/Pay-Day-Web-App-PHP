<?php

session_start();
if($_SESSION["worker"] == null){
    header("Location: http://localhost:8080/EmployeePay/index.php"); 
}

if($_POST){
    session_unset();
    session_destroy();
    session_write_close();
    //setcookie(session_name(),'',0,'/');
    header("Location: http://localhost:8080/EmployeePay/loggedOut.html"); 
}
?>

<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="some.css">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Confirm Log Out</title>
</head>
    <nav class="navbar navbar-primary bg-primary">
         <a class="navbar-brand" href="#"><label class="text-white">Employee System</label></a>
         <ul class="nav">
             <li class="nav-item">
                <p class="nav-link active"><a class="text-white" href="userPage.php">User Page</a></p>
             </li>
        </ul>     
    </nav>
<body>
     <div class="container" id="main">
	    <?php
		   echo "<p>".$_SESSION['worker'].", to complete your log out click the button.</p>"
        ?>
        <hr>
        <h3>Have a good month.</h3>
        <br>
		<form action="" method="post">
             <button type="submit" class="btn btn-primary" name="logout">LOGOUT</button>
		</form>
    </div>
</body>
</html>












