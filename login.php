<?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
  
 require 'partial/dbconnect.php';
 $username=$_POST["username"];
 $password=$_POST["password"];
 

   $sql="Select * from users where username='$username' AND password='$password'";
   $result=mysqli_query($conn,$sql);
   $num=mysqli_num_rows($result);
   if($num==1){
     $login=true;
     session_start();
     $_SESSION['loggedin']=true;
     $_SESSION['username']=$username;
     header("location: welcome.php");
   }
   else{
     $showError=true;
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

    <title>LOGIN</title>
  </head>
  <body>
    <?php require 'partial/nav.php' ?>
    <?php
    if($login){
    echo' 
    <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success</strong> You are logged in.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

if($showError){
  echo' 
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>Error!</strong> You can not login password mismatch.
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
?>

    <div class="container" >
      <h1 class="text-center">LOGIN TO CONTINUE</h1>
      <form action="/login/login.php" method="post">
         <div class="form-group col-md-6" >
           <label for="username" class="form-label">USERNAME</label>
        <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
  </div>
  <div class="form-group col-md-6" >
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  
  
  <button type="submit" class="btn btn-primary">LOGIN</button>
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