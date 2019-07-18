<?php
   session_start();
?>




<!doctype html>
<html lang="en">
<title>Login</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="styles/login.css">
<!------ Include the above in your HEAD tag ---------->

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="images/user_icon.png" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <form method="post">
      <input type="text" id="login" class="fadeIn second" name="username" placeholder="Username">
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password">
      <input type="submit" class="fadeIn fourth" name="login" value="Log In">
    </form>

    <?php

     
      require_once "classes/User.php";

      $user = new User;

      if(isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $user->login($username, $password);
      }
    
    ?>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>

  </div>
</div>
