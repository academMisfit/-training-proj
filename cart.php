<?php
require_once('header.php');
 ?>
<h2>Cart page</h2>
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
       echo "<li>".$row['name'].": ".$v[1]."</li>".gettype($v[1]);
       echo "<li style='list-style: none'>price:{$row['unit_price']}</li><a href='includes/process_cart.php?removeit={$row['id']}'>Remove item</a>";
       $sum += ($row['unit_price']*$v[1]);

     }
     mysqli_stmt_close($stmt);
     mysqli_close($conn);
     echo "<li>Total price: ".$sum."</li><br>";
     echo "<li><a href='includes/process_cart.php?clearcart'>Clear cart</a></li>";
     echo "</ul>";
     echo "<form action='order.php' method='post'>";
     echo "<button>Continue</button>";
     echo "</form>";
   }
 }
 else {
   echo "The cart is empty.";
 }
require_once('footer.php');
?>
