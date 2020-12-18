<?php
if (!isset($_POST['signup-submit'])){
  header("location:../sign_up_form.php");
}
else {
  $accname = $_POST['accname'];
  $email = $_POST['email'];
  $pwd = $_POST['passwd'];
  $repasswd = $_POST['repasswd'];

  require_once "config.php";
  require_once "functions.php";
  //validate inputs
  if (empty($email) || empty($pwd) || empty($repasswd)){
    header("location: ../sign_up_form.php?error=emptyinput");
    exit();
  }
  if(invalidAccName($accname) !== false) {
    header("location: ../sign_up_form.php?error=invaliduid");
    exit();
  }
  if(invalidEmail($email)) {
    header("location: ../sign_up_form.php?error=invalidemail");
    exit();
  }
  if($pwd !== $repasswd) {
    header("location: ../sign_up_form.php?error=pwdsdontmatch");
    exit();
  }

  create_user($accname, $email, $pwd,$conn);
}
?>
