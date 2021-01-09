<?php
//sign up validation functions
function invalidAccName($name){
  return (!preg_match("/^[a-zA-Z0-9]*$/", $name));
}
function invalidEmail($email) {
  return (!filter_var($email, FILTER_VALIDATE_EMAIL));
}

function create_user($name, $email, $pwd, $conn){
  $sql = "INSERT INTO clients (name, password, email) VALUES (?,?,?);";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header('location: ../sign_up_form?error=stmtfailed');
    exit();
  }
  $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);
  $name = empty($name) ? "anonym" : $name;

  mysqli_stmt_bind_param($stmt, "sss", $name, $hashedpwd, $email);
  if(!mysqli_stmt_execute($stmt)){
    header('location: ../sign_up_form?error=stmtfailed');
  }
  else {
    mysqli_stmt_close($stmt);
    header("location: ../");
  }
}

function login_user($conn, $email, $pwd) {
  $sql = "SELECT * FROM clients WHERE email = ?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../login_form?error=stmtfailed");
    exit();
  }

  mysqli_stmt_bind_param($stmt, "s", $email);
  mysqli_stmt_execute($stmt);

  $result = mysqli_stmt_get_result($stmt);
  if (!$row = mysqli_fetch_assoc($result)) {
    header("location: ../login_form?error=wronglogin");
    exit();
  }
  else {
    $hashedpwd = $row['password'];
    if (password_verify($pwd, $hashedpwd)) {
      session_start();
      $_SESSION['useruid'] = $row['name'];
      $_SESSION['userid'] = $row['id'];
      $_SESSION['email'] = $row['email'];
      header("location: ../");
      exit();
    }
    else {
      header("location: ../login_form?error=wronglogin");
      exit();
    }
  }
}

function user_exists($conn, $email) {
  $sql = "SELECT * FROM clients WHERE email = ?;";
  $stmt = mysqli_stmt_init($conn);
  mysqli_stmt_prepare($stmt, $sql);
  mysqli_stmt_bind_param($stmt, "s", $email);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  if(!$row = mysqli_fetch_assoc($result)){
    return false;
  }
  else {
    return $row['id'];
  }
}
 ?>
