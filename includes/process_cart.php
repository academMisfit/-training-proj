<?php
if (isset($_POST['addto-cart'])){
  session_start();
  if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
  }
  $amount = $_POST['amount'];
  $prod_name = $_POST['product_name'];
  $prod_id = $_POST['product_id'];
  //validation of submitted form
  require_once 'config.php';
  $sql = "SELECT id FROM items WHERE name = ?;";
  $stmt = mysqli_stmt_init($conn);
  mysqli_stmt_prepare($stmt, $sql);
  mysqli_stmt_bind_param($stmt, "s", $prod_name);
  if(!mysqli_stmt_execute($stmt)){
    header("Location: ../index.php");
    exit;
  }
  $result = mysqli_stmt_get_result($stmt);
  if (!$row = mysqli_fetch_assoc($result)) {
    header("Location: ../index.php");
    exit();
  }
  if (!ctype_digit($amount)){
    header("Location: ../".$prod_name."?invalidamount");
    exit;
  }
  if (!ctype_digit($prod_id)){
    header('Location: ../index.php');
    exit;
  }

  $_SESSION['cart'][$prod_id] = array($product_name, $amount);

  header("location: ../".$prod_name."?addedtocart");
}
else if (isset($_GET['removeit'])){
  $item_id = $_GET['removeit'];
  session_start();
  unset($_SESSION['cart'][$item_id]);
  if (!count($_SESSION['cart'])){
    unset($_SESSION['cart']);
  }
  header("location: ../cart");
}
else if (isset($_GET['clearcart'])){
  session_start();
  unset($_SESSION['cart']);
  header("location: ../cart");
}
 ?>
