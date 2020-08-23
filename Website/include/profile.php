<!DOCTYPE html>
<?php
session_start();
include 'include/connect.php';
include("include/header.php");
if(!isset($_SESSION['rollnumber']))
header("location:login.php");
$rollnumber=$_SESSION['rollnumber'];
$insert="Select * from users where rollnumber='$rollnumber'";
 $query=mysqli_query($con,$insert);
$row=mysqli_fetch_array($query);
		    	
		        $id=$row['id'];
		        $firstname=$row['firstname'];
		        $lastname=$row['lastname'];
		        $tos=$row['tos'];
		       	
		  
$select="select * from graph where id='$id'";
$q=mysqli_query($con,$select);
$row1=mysqli_fetch_array($q);
$score=$row1['score'];
 $rowcount=mysqli_num_rows($q);
 $date=$row1['date'];
$data=array();
for($i=0;$i<$rowcount;$i++){
	array_push($data,array("y" =>$score, "label" => $date));
}

?>

<html>
<head>
	<title>hoii</title>
</head>
<body>
	<div id="chartContainer" style="height: 300px; width: 100%;"></div>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	title: {
		text: "Push-ups Over a Week"
	},
	axisY: {
		title: "Number of Push-ups"
	},
	data: [{
		type: "line",
		dataPoints: <?php echo json_encode($data, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>	
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>	
	

</body>
</html>