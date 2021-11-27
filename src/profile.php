<?php
require_once 'header.php';
if (isset($_SESSION['userid'])){
  $user_id = $_SESSION['userid'];
  require_once 'includes/config.php';
  $sql = "SELECT * FROM orders WHERE client_id = ?;";
  $stmt = mysqli_stmt_init($conn);
  mysqli_stmt_prepare($stmt, $sql);
  mysqli_stmt_bind_param($stmt, "s", $user_id);
  if (!mysqli_stmt_execute($stmt)) {
    echo "<p>Something went wrong, please try later.</p>";
  }
  else {
    $result = mysqli_stmt_get_result($stmt);
    if($orders = mysqli_fetch_all($result, MYSQLI_ASSOC)){
      echo "<ul>";
      foreach($orders as $k=>$v){
        $order_id = $v[id];
        echo "<li>Order id: ".$order_id."</li>";
        $sql = "SELECT o.amount, i.name, i.unit_price FROM order_items o INNER JOIN items i ON o.item_id = i.id WHERE o.order_id = ?;";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "s", $order_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if ($order_items = mysqli_fetch_all($result, MYSQLI_ASSOC)) {
          foreach($order_items as $k=>$v){
            echo "<li>".$v['name'].", amount: ".$v['amount'].", unit price: ".$v['unit_price']."</li>";
            echo "<li>Total sum: ".($v['amount']*$v['unit_price'])."</li>";
          }

        } else {
          echo "<li>No items found for order: ".$order_id ."</li>";
          echo "<li>".mysqli_error($conn)."</li><br>";
        }
      }
    }
    else {
      echo "No orders completed yet.";
    }

  }

}
else {
  header("location: index.php");
}
require_once 'footer.php';
 ?>
