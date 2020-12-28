<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Proto index page</title>
  </head>
  <body>
  <ul>
    <li><a href="index">Home</a><br></li>
    <?php
      if (isset($_SESSION['useruid'])) {
        echo "<li><a href='profile'>Profile</a></li>";
        echo "<li><a href='includes/logout'>Log out</a></li>";
      }
      else {
        echo '<li><a href="login_form">Log in</a></li>';
        echo '<li><a href="sign_up_form">Sign up</a></li>';
      }
     ?>
    <li><a href="cart">Cart</a> </li>
  </ul>
