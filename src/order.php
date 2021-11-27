<?php
require_once "header.php";
?>
<h2>Order details</h2>
<?php
if (isset($_SESSION['cart'])){
  require_once "includes/config.php";
  $sql = "SELECT * FROM items WHERE id = ?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "<p>Oops! Something went wrong, please try later.</p>";
    exit();
  }
  else {
    echo "<ul>";
    $sum = 0;
    foreach($_SESSION['cart'] as $k=>$v) {
      mysqli_stmt_bind_param($stmt, "s", $k);
      if(!mysqli_stmt_execute($stmt)){
        echo "<p>Something went wrong, try later.</p>";
        exit();
      }
      $result = mysqli_stmt_get_result($stmt);
      if (!$row = mysqli_fetch_assoc($result)) {
        echo "<p>Item not found.</p>";
        exit();
      }
      echo "<li>".$row['name'].": ".$v[1]."</li>";
      $sum += ($row['unit_price']*$v[1]);

    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    echo "<li>Total price: ".$sum."</li>";
    echo "</ul>";
  }
  if (isset($_GET['order_id'])){
    echo "<p>Order completed successfully. Order id: ".$_GET['order_id'];
  }
  else if (isset($_GET['error'])){
    switch ($_GET['error']){
      case 'invalidemail':
        require_once "includes/finish_order_form.php";
        echo "<p>Provided email is not valid.</p>";
        break;
      case 'commit':
        echo "<p>Something went wrong, please try later.</p>";
        break;
    }
  }
  else {
    require_once "includes/finish_order_form.php";
  }

  require_once "footer.php";
}
else {
  header("Location: index.php");
}
 ?>
