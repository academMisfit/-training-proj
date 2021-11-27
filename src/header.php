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
    <li><a href="index.php">Home</a><br></li>
    <?php
      if (isset($_SESSION['useruid'])) {
        echo "<li><a href='profile.php'>Profile</a></li>";
        echo "<li><a href='includes/logout.php'>Log out</a></li>";
      }
      else {
        echo '<li><a href="login_form.php">Log in</a></li>';
        echo '<li><a href="sign_up_form.php">Sign up</a></li>';
      }
     ?>
    <li><a href="cart.php">Cart <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']>0)) { echo "(". count($_SESSION['cart']) .")";} ?></a> </li>
  </ul>
