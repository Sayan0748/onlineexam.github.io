<?php


$SERVER="remotemysql.com:3306";
$username="V71tgJYlvy";
$password="gYv17kFJ6a";
$database="V71tgJYlvy";

$conn = mysqli_connect($SERVER,$username,$password,$database);

if(!$conn){
    //echo"sucess";
 //}
 //else{
    die("ERROR". mysqli_connect_error());
}


?>