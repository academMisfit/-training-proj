<?php
require_once "header.php";
?>
<h2>Login page</h2>
<form class="login-form" action="includes/login.php" method="post">
  Enter email:<input type="text" name="email" placeholder="Email"><br>
  Enter password:<input type="password" name="pwd" placeholder="Password"><br>
  <button type="submit" name="login-submit">Login</button>
</form>
<?php
if (isset($_GET['error'])) {
  if ($_GET['error'] == "emptyinput") {
    echo "<p>Fill in all fields!</p>";
  }
  else if ($_GET['error'] == "wronglogin") {
    echo "<p>Email or password are wrong!</p>";
  }
}
require_once "footer.php";
 ?>
