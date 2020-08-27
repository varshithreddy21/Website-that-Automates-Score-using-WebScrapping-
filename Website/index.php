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

			if(isset($_GET['year'])||isset($_GET['branch'])||isset($_GET['class'])){
				#echo "<script>alert('hiii');</script>";
				$year=$_GET['year'];
				$branch=$_GET['branch'];
				$section=$_GET['class'];
				$getLeaderboard="select * from users where year=  ORDER by tos DESC";
				if($year!="Year"&&$branch!="Branch"&&$section!="Class"){
					$getLeaderboard="select * from users where year='$year' and branch='$branch' and section='$section'  ORDER by tos DESC";
				}elseif ($year!="Year"&&$branch!="Branch"&&$section=="Class") {
						$getLeaderboard="select * from users where year='$year' and branch='$branch'  ORDER by tos DESC";
				}elseif ($year!="Year"&&$branch=="Branch"&&$section=="Class") {
					# code...
					$getLeaderboard="select * from users where year='$year'   ORDER by tos DESC";
				}elseif ($year=="Year"&&$branch!="Branch"&&$section=="Class") {
					$getLeaderboard="select * from users where year='$year'   ORDER by tos DESC";
				}else{
					$getLeaderboard="select * from users where year=  ORDER by tos DESC";
				}
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
			}else{
				$getLeaderboard1="select * from users  ORDER by tos DESC";
		    	$run1=mysqli_query($con,$getLeaderboard1);
		    	$i=1;
		    	while($row=mysqli_fetch_array($run1)){
		    	
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
			}
			
			
			?>




		</div>
		<div class="card" style="align-items: center;"><form action="index.php">
  <div class="form-row align-items-center">
    <div class="col-auto my-1">
      <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Year</label>
      <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="year">
        <option selected>Year</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
      </select>
    </div>
    <div class="col-auto my-1">
      <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Branch</label>
      <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="branch">
        <option selected>Branch</option>
        <option value="CSE">CSE</option>
        <option value="IT">IT</option>
        <option value="MECH">MECH</option>
        <option value="ECE">ECE</option>
        <option value="EEE">EEE</option>
        <option value="CIVIL">CIVIL</option>
      </select>
    </div>
     <div class="col-auto my-1">
      <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Class</label>
      <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="class">
        <option selected>Class</option>
        <option value="A">A</option>
        <option value="B">B</option>
        <option value="C">C</option>
        <option value="D">D</option>
      </select>
    </div>
    <div class="col-auto my-1">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form></div>

</body>
</html>