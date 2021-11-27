<?php
require_once 'header.php';
 ?>
<h1>Registration form</h1>
<form class="signup-form" action="includes/sign_up.php" method="post">
  Enter name:
  <input type="text" name="accname" placeholder="Name..."><br>
  Enter email*:
  <input type="text" name="email" placeholder="Email..."><br>
  Enter password*:
  <input type="password" name="passwd" placeholder="Password..."><br>
  Re-enter password*:
  <input type="password" name="repasswd" placeholder="Repeat password..."><br>
  <button type="submit" name="signup-submit">Sign up</button>
</form>
<?php
  if (isset($_GET['error'])) {
    if ($_GET['error'] == "emptyinput") {
      echo "<p>Fill in all fields marked with asterisk!</p>";
    }
    else if ($_GET['error'] == "invaliduid") {
      echo "<p>Choose a proper username!</p>";
    }
    else if ($_GET['error'] == "invalidemail") {
      echo "<p>Provided email is not correct!</p>";
    }
    else if ($_GET['error'] == "pwdsdontmatch") {
      echo "<p>Passwords don't match!</p>";
    }
    else if ($_GET['error'] == "stmtfailed") {
      echo "<p>Something went wrong, please try later!</p>";
    }
  }
require_once 'footer.php';
?>
