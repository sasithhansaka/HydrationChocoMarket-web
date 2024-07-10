<?php
$servername="localhost";
$username="root";
$pass="";
$dbname="luxeb";

$conn=mysqli_connect($servername,$username,$pass,$dbname);
if(!$conn){
    die("connection failed".mysqli_connect_error());
}
// echo"connected succes!!!!";
?>