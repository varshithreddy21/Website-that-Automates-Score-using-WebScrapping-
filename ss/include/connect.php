<?php
$con=$con=mysqli_connect("localhost","root","","students");
$sql = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
rollnumber VARCHAR(50) NOT NULL,
password VARCHAR(50) NOT NULL,
year INT(6) NOT NULL,
branch VARCHAR(20) NOT NULL,
section VARCHAR(20) NOT NULL,
hackerrank VARCHAR(50) NOT NULL,
interviewbit VARCHAR(50) NOT NULL,
codeforces VARCHAR(50) NOT NULL,
codechef VARCHAR(50) NOT NULL,
hrs INT(6) DEFAULT 0,
ibs INT(6) DEFAULT 0,
cfs INT(6) DEFAULT 0,
ccs INT(6) DEFAULT 0,
tos INT(7) DEFAULT 0,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
$userstable=mysqli_query($con,$sql);

?>
