<?php
if(isset($_SESSION['email'])){
  $email = $_SESSION['email'];
}
else {
  $email = "";
}
 ?>
 <form class="" action="includes/process_order.php" method="post">
   <input type="text" name="email" value="<?php echo $email; ?>">
   <input type="submit" name="finish-order" value="Order">
 </form>
