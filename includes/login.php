<?php
if(isset($_POST['login-submit'])){
  $email = $_POST['email'];
  $pwd = $_POST['pwd'];

  //validation of inputs
  if (empty($email) || empty($pwd)) {
    header("location: ../login_form.php?error=emptyinput");
    exit();
  }

  require_once "config.php";
  require_once "functions.php";
  if (!invalidEmail($email)){
    login_user($conn, $email, $pwd);
  }


}
else {
  header("location: ../login_form.php");
}
 ?>
