<!DOCTYPE html>
<?php
session_start();
include 'include/connect.php';
include("include/header.php");
if(!isset($_SESSION['rollnumber']))
header("location:login.php");
$id=$_GET['id'];
$insert="Select * from users where id=$id";
 $query=mysqli_query($con,$insert);
$row=mysqli_fetch_array($query);
		    	
		       $rollnumber=$row['rollnumber'];
		        $firstname=$row['firstname'];
		        $lastname=$row['lastname'];
		        $tos=$row['tos'];
		        $ibs=$row['ibs'];
		        $cfs=$row['cfs'];
		        $ccs=$row['ccs'];
		       	
		  
$select="select * from graph where id=$id";
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
		<?php
		echo "<div class='card' style='margin-top:10px '>
			<div class='row ' style='margin:2px;'>
				<div class='col-md-2'><strong>Rollnumber</strong></div>
		       	<div class='col-md-2'><strong>Name</strong></div>
		       	<div class='col-md-2'><strong>InterviewbitScore</strong></div>
		       	<div class='col-md-2'><strong>CodeforcesScore</strong></div>
		       	<div class='col-md-2'><strong>CodechefScore</strong></div>
		       	<div class='col-md-2'><strong>TotalScore</strong></div>
		       	</div></div>"; 
		echo "<div class='card'>
			<div class='row ' style='margin:2px;'>
				<div class='col-md-2'>$rollnumber</div>
		       	<div class='col-md-2'>$firstname $lastname</div>
		       	<div class='col-md-2'>$ibs</div>
		       	<div class='col-md-2'>$cfs</div>
		       	<div class='col-md-2'>$ccs</div>
		       	<div class='col-md-2'>$tos</div>
		       	</div></div>"; 
		?>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	title: {
		text: "Scorecard Graph"
	},
	axisY: {
		title: "Total Score"
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