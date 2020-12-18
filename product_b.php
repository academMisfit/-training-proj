<?php
require_once "header.php";
echo "<h2>Hi, this is product B</h2>";
require_once (__DIR__) . '/includes/config.php';
$name = 'product_b';
if (!$conn) {
  echo "<p>Connection is not established. ".mysqli_connect_error();
} else {
  $sql = 'SELECT * FROM items WHERE name = ?';
  if ($stmt = mysqli_prepare($conn, $sql)) {
    mysqli_stmt_bind_param($stmt, "s", $name);
    if (mysqli_stmt_execute($stmt)){
      $result = mysqli_stmt_get_result($stmt);
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
      $price = $row['unit_price'];
      $prod_id = $row['id'];
    } else {
      echo "Something went wrong. Try later.";
    }
  }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
echo "<p>Price for unit: " . $price ."</p>";
 ?>
 <form class="product-form" action="includes/process_cart.php" method="post">
   Enter amount:
   <input type="text" name="amount" placeholder="0">
   <input type="hidden" name="product_name" value="<?php echo $name; ?>">
   <input type="hidden" name="product_id" value="<?php echo $prod_id; ?>">
   <button type="submit" name="addto-cart"> Add to Cart </button>
 </form>
<?php
  if (isset($_GET['addedtocart'])){
    echo "<p>The item was added.</p>";
  }
  require_once 'footer.php';
?>
