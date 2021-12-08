<?php
session_start();

if( isset($_SESSION["login"]) ) {
  header("Location: homeDokter.php");
  exit;
}

require 'auth/functions.php';

if( isset($_POST["login"]) ){
  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

  //cek username
  if( mysqli_num_rows($result) === 1) {
    //cek password
    $row = mysqli_fetch_assoc($result);
    if( $password == $row["password"] && $row["role"] == "dokter") {
      //set session
      $_SESSION["login"] = true;
      header("Location: homeDokter.php");
      exit;
    }
    elseif( $password == $row["password"] && $row["role"] == "apoteker") {
      //set session
      $_SESSION["login"] = true;
      header("Location: homeApoteker.php");
      exit;
    }
  }
  $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" href="css/login.css">
    
    <!-- Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">

    <title>Login | medic.In</title>
  </head>
  
  <!-- Form Login -->
  <body>
    <?php if( isset($error)) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      Username atau password yang anda masukkan salah
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif; ?>

    <div class="login-form">
      <form action="index.php" method="post" class="signin-form">
        <div class="form-head">
          <h3>medic.In</h3>
          <hr/>
        </div>
        <div class="form-group">
          <input type="text" class="form-control item" name="username" placeholder="Username">
          <input type="password" class="form-control item" name="password" placeholder="Password">
        </div>
        <div class="form-group text-center">
          <a href="p"><button name="login" class="btn btn-block login">LOGIN</button></a>
        </div>
      </form>
    </div>
    <!-- Akhir Form Login -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>