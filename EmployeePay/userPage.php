<?php
session_start();
if($_SESSION["worker"] == null){
    header("Location: http://localhost:8080/EmployeePay/index.php"); 
}
?>

<html>
	<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="some.css">
		
		<title>Logged in</title>	
	</head>
	<body>
        <nav class="navbar navbar-primary bg-primary">
             <a class="navbar-brand" href="#"><label class="text-white">Employee System</label></a>
             <ul class="nav">
                 <li class="nav-item">
                      <p class="nav-link active"><a class="text-white" href="logoutPage.php">Logout Page</a></p>
                </li>
            </ul>     
        </nav>
		
		<?php
			$titles = array("January","February","March","April","May","June","July","August","September","October","November","December");
            $month = date("n");
		?>
        
		<div id="main">
            <?php
              echo "Logged in as  ".$_SESSION["worker"].".";
            ?>
            <br>
            <br>
            <hr>
            <h3>Select the month below. </h3>
			<br>
			<table class="table table-bordered">
				<tr>
					<th>Month</th>
					<th>Pay Slip</th>
				</tr>
                <?php
                    for($i = 0; $i <= 11; $i++){
                        if($i < $month){
                           echo "<tr>
							 	<td>".$titles[$i]."</td>".
								"<td><a href='paySlip.php?month=$titles[$i]&database=$_SESSION[database]'>Link to pay slip</a></td></tr>";
                           
                        }else{
                           echo "<tr>
							 	<td>$titles[$i]</td>
								<td>Link to pay slip</td>
							</tr>";
                        }
                    }
                
                ?>
			</table> 
		</div>
	</body>
</html>
















