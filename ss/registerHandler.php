<?php
include("include/connect.php");

    if(isset($_POST['submit'])){
        $firstname=htmlentities(mysqli_real_escape_string($con,$_POST['firstname']));
        $lastname=htmlentities(mysqli_real_escape_string($con,$_POST['lastname']));
        $password=htmlentities(mysqli_real_escape_string($con,$_POST['password']));
        $rollnumber=htmlentities(mysqli_real_escape_string($con,$_POST['rollnumber']));
        $year=htmlentities(mysqli_real_escape_string($con,$_POST['year']));
        $branch=htmlentities(mysqli_real_escape_string($con,$_POST['branch']));
        $section=htmlentities(mysqli_real_escape_string($con,$_POST['section']));
        $hackerrank=htmlentities(mysqli_real_escape_string($con,$_POST['hackerrank']));
        $interviewbit=htmlentities(mysqli_real_escape_string($con,$_POST['interviewbit']));
        $codeforces=htmlentities(mysqli_real_escape_string($con,$_POST['codeforces']));
        $codechef=htmlentities(mysqli_real_escape_string($con,$_POST['codechef']));
      
        
        if(strlen($password)<9){
            echo "<script>
            alert('password must be more than 9 characters');

            </script>";
            exit();
        }
        $check_email="select * from users where rollnumber='$rollnumber'";
        $run_email=mysqli_query($con,$check_email);
        $check=mysqli_num_rows($run_email);
        if($check==1){
            echo "<script>alert('Rollnumber already exists')</script>";
            echo "<script>window.open('register.php',' _self')</script>";
            exit();
        }
        $insert="insert into users(
        firstname,lastname,rollnumber,password,year,branch,section,hackerrank,
        interviewbit,codeforces,codechef
        )
        values('$firstname','$lastname','$rollnumber','$password','$year','$branch','$section','$hackerrank',
        '$interviewbit','$codeforces','$codechef')";
        $query=mysqli_query($con,$insert);
        if($query){
            echo "<script> setTimeout(function(){alert('Welldone $firstname , You Succesfully created account');},1000) </script>";
            echo "<script>window.open('index.php','_self');
exit;</script>";

            
        }else{
            echo "<script>alert('$query')</script>";
            echo "<script>window.open('signup.php',' _self');exit;</script>";
            
        }
    }
?>