

<?php

$SERVER="remotemysql.com:3306";
$username="V71tgJYlvy";
$password="gYv17kFJ6a";
$database="V71tgJYlvy";

$conn = mysqli_connect($SERVER,$username,$password,$database);

if(! $conn ) {
    die('Could not connect: ' . mysqli_error());
 }
 echo 'Connected successfully';
 $existSql="SELECT * FROM `student` WHERE `name` = 'sayan'";
 $result=mysqli_query($conn,$existSql);
 $numExistRows=mysqli_num_rows($result);
 echo $numExistRows;

?>
