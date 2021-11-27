<?php
if (!isset($_POST['signup-submit'])){
  header("location:../sign_up_form");
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
    header("location: ../sign_up_form?error=emptyinput");
    exit();
  }
  if(invalidAccName($accname) !== false) {
    header("location: ../sign_up_form?error=invaliduid");
    exit();
  }
  if(invalidEmail($email)) {
    header("location: ../sign_up_form?error=invalidemail");
    exit();
  }
  if($pwd !== $repasswd) {
    header("location: ../sign_up_form?error=pwdsdontmatch");
    exit();
  }

  create_user($accname, $email, $pwd,$conn);
}
?>
