<?php
//TODO improve security, prevent SQL injection. Set cookies to remember user.
session_start();
$myUserName = "";
if($_POST){
   $found = false;
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "staff";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if(mysqli_error($conn)){

        die("Ërror Connecting");
    }

    $sql = "SELECT * FROM workers";

    if($result = mysqli_query($conn, $sql)){

        while($row = mysqli_fetch_array($result)){

            if($row[1] == $_POST["user"] && $row[2] == $_POST["password"]){
               $_SESSION["worker"] = $row[1];
               $_SESSION["database"] = $row[4];
               $found = true;
               header("Location: http://localhost:8080/EmployeePay/userPage.php?user=".$row[1]."&database=".$row[4]); 
               break;    
            }

        }
        if($found == false){
            header("Location: http://localhost:8080/EmployeePay/invalidUserPassword.html"); 
        }
        
    }else{
        header("Location: http://localhost:8080/EmployeePay/unavailableDatabase.html"); 
    }
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="some.css">
	<meta charset="UTF-8">
    
	<title>Login Page</title>

    <script type="text/javascript">
        function validateForm(){
            
            var name = document.forms["myForm"]["user"].value;
            var password = document.forms["myForm"]["password"].value;
            var message = "";
            
            if(name == "" || password == ""){
                message += "Please enter valid details.\n"
            }
            
            if(name.match(/[0-9]/g) != null){
                message += "There should be no numbers in the name entry.\n"
            }
            
            
            if(password.startsWith("i") == false){
                message += "Password should start with i.\n"
            } 
            
            if(message != ""){
                alert(message)
                return false;
            }
        }
    </script>
    
</head>
    <body>
        <nav class="navbar navbar-primary bg-primary">
             <a class="navbar-brand" href="#"><label class="text-white">Employee System</label></a>
             <ul class="nav">
                 <li class="nav-item">
                    <h6 class="text-white">This application was built by Justin Alderson using HTML, CSS, Bootstrap, Javascript and PHP.</h6>
                 </li> 
            </ul>     
        </nav>
        <div class="container" id="main">
            <h3 >Login to see your salary.</h3>
            <hr>
           
            <form name="myForm" action="" method="post" onsubmit="return validateForm()">
                  <div class="form-group">
                       <input type="text" class="form-control" name="user" id="userName" class="edittext" placeholder="Login ID">
                  </div>
                  <div class="form-group">
                        <input type="password" class="form-control" name="password" id="userPassword" class="edittext" placeholder="Password">
                  </div>
                  <button type="submit" class="btn btn-primary" name="login">LOGIN</button>
            </form>
        </div>
    </body>
</html>

















