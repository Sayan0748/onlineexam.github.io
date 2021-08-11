<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
  
 require 'partial/dbconnect.php';
 $username=$_POST["username"];
 $password=$_POST["password"];
 $cpassword=$_POST["cpassword"];
 $existSql="SELECT * FROM `users` WHERE `username` = '$username'";
 $result=mysqli_query($conn,$existSql);
 $numExistRows=mysqli_num_rows($result);
 if($numExistRows>0){
   $exists=true;
   $showError='Username already taken';
   
 }
 else{
   $exists=false;

   if(($password==$cpassword)){
   $sql="INSERT INTO `users` (`username`, `Password`, `date`) VALUES ('$username', '$password', CURRENT_TIMESTAMP())";
   $result=mysqli_query($conn,$sql);
   if($result){
       $showAlert = true;  
   }
   
 }

 else{
  $showError = 'Password mismatched';
}
 }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>SIGNUP</title>
  </head>
  <body>
    <?php require 'partial/nav.php' ?>
    <?php
    if($showAlert){
    echo' 
    <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success</strong> You can now login.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

if($showError){
  echo' 
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>Error!</strong> '.$showError.'
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
?>

    <div class="container" >
      <h1 class="text-center">Sign Up to Our Website</h1>
      <form action="/login/signup.php" method="post">
         <div class="form-group col-md-5" >
           <label for="username" class="form-label">USERNAME</label>
        <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
  </div>
  <div class="form-group col-md-5" >
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <div class="form-group col-md-5" >
    <label for="cpassword" class="form-label">CONFIRM-Password</label>
    <input type="password" class="form-control" id="cpassword" name="cpassword">
  </div>
  
  <button type="submit" class="btn btn-primary">SIGNUP</button>
</form>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    -->
  </body>
</html>