<!DOCTYPE html>
<?php
session_start();
include 'include/connect.php';
include("include/header.php");
if(!isset($_SESSION['rollnumber']))
header("location:login.php");
?>

<html>
<head>
	<title>hoii</title>
</head>
<body>
	
		<div class="card" style="margin:50px;" >
			<hr>
			<?php

			$getLeaderboard="select * from users  ORDER by tos DESC LIMIT 0,10";
		    	$run=mysqli_query($con,$getLeaderboard);
		    	$i=1;
		    	while($row=mysqli_fetch_array($run)){
		    	
		        $rollnumber=$row['rollnumber'];
		        $firstname=$row['firstname'];
		        $lastname=$row['lastname'];
		        $tos=$row['tos'];
		       	echo "<div class='row' style='margin:2px;'>
		       	<div class='col-md-2'>$i</div>
		       	<div class='col-md-3'>$firstname $lastname</div>
		       	<div class='col-md-3'>$rollnumber</div>
		       	<div class='col-md-3'>$tos</div>
		       	</div><hr>";
		        $i=$i+1;

			}



		?>



		</div>

</body>
</html>