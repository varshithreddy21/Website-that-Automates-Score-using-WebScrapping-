<?php
session_start();
include("include/connect.php");
if(isset($_POST['login'])){
    $rollnumber=htmlentities(mysqli_real_escape_string($con,$_POST['rollnumber']));
    $password=htmlentities(mysqli_real_escape_string($con,$_POST['password']));
    //echo $rollnumber;
    //echo $password;
    $query="select * from users where rollnumber='$rollnumber'and password='$password'";
    $users=mysqli_query($con,$query);
    $fetch=mysqli_fetch_array($users);
    $user_id=$fetch['id'];
    if(mysqli_num_rows($users)>0){
    
        $_SESSION['rollnumber']=$rollnumber;
   echo "<script> window.open('index.php?id=$user_id','_self');exit;</script>";
    }else{
       echo "<script> alert('Wrong rollnumber or password!!');
        window.open('login.php');
        exit;
        </script>";
    }
}

?>