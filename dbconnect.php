<?php

$SERVER="localhost";
$username="root";
$password="";
$database="users";

$conn = mysqli_connect($SERVER,$username,$password,$database);

if(!$conn){
    //echo"sucess";
 //}
 //else{
    die("ERROR". mysqli_connect_error());
}

?>