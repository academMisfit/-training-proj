<?php
if (isset($_POST['finish-order'])){
  session_start();
  require_once "config.php";
  require_once "functions.php";
  if (!isset($_POST['email']) || invalidEmail($_POST['email'])) {
    header("location: ../order?error=invalidemail");
    exit;
  }
  $email = $_POST['email'];
  if (isset($_SESSION['cart'])){
    if (isset($_SESSION['userid'])){
      mysqli_begin_transaction($conn);
      try {
        //insert into orders
        $sql = "INSERT INTO orders (client_id) VALUES (?);";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 's', $_SESSION['userid']);
        mysqli_stmt_execute($stmt);
        $order_id = mysqli_insert_id($conn);
        //insert into order_items
        $sql = "INSERT INTO order_items (order_id, item_id, amount) VALUES (?,?,?);";
        $stmt = mysqli_prepare($conn, $sql);
        foreach($_SESSION['cart'] as $k=>$v){
          mysqli_stmt_bind_param($stmt, 'sss', $order_id, $k, $v[1]);
          mysqli_stmt_execute($stmt);
        }
        mysqli_commit($conn);
        mysqli_close($conn);
        header("location: ../order?order_id=".$order_id);
      } catch (mysqli_sql_exception $exception) {
        mysqli_rollback($mysqli);
        header("location: ..order?error=commit");
        exit;
      }
    }
    else {
      $user_id = user_exists($conn, $email);
      if (!$user_id){
        //insert new client
        $sql = "INSERT INTO clients (email) VALUES (?);";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 's', $email);
        mysqli_stmt_execute($stmt);
        $user_id = mysqli_insert_id($conn);
      }
      mysqli_begin_transaction($conn);
      try {
        //insert into orders
        $sql = "INSERT INTO orders (client_id) VALUES (?);";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 's', $user_id);
        mysqli_stmt_execute($stmt);
        $order_id = mysqli_insert_id($conn);
        //insert into order_items
        $sql1 = "INSERT INTO order_items (order_id, item_id, amount) VALUES (?,?,?);";
        $stmt1 = mysqli_prepare($conn, $sql1);
        foreach($_SESSION['cart'] as $k=>$v){
          mysqli_stmt_bind_param($stmt1, 'sss', $order_id, $k, $v[1]);
          mysqli_stmt_execute($stmt1);
        }
        mysqli_commit($conn);
        mysqli_close($conn);
        header("location: ../order?order_id=".$order_id);
      } catch (mysqli_sql_exception $exception) {
        mysqli_rollback($mysqli);
        header("location: ..order?error=commit");
        exit;
      }
    }
  }
} else {
  header("location: ../");
}
 ?>
