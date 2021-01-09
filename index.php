<?php
//header
require_once (__DIR__). '/header.php';
require_once (__DIR__). '/includes/config.php';

echo "<h1>Main page</h1>";
if (!$conn) {
  echo "<p>Connection is not established. ".mysqli_connect_error();
} else {
  $sql = 'SELECT * FROM items';
  if ($result = mysqli_query($conn, $sql)) {
    if(mysqli_num_rows($result)>0){
      echo "<table>";
      echo "<thead>";
        echo "<tr>";
          echo "<th>#</th>";
          echo "<th>Product name</th>";
        echo "</tr>";
      echo "</thead>";
      echo "<tbody>";
      $index = 1;
      while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $index."</td>";
        echo "<td><a href='".$row['name']."'>" . $row['name'] . "</a></td>";
        echo "</tr>";
        $index +=1;
      }
      echo "</tbody>";
      echo"</table>";
      mysqli_free_result($result);
    } else {
      echo "<p>No records were found.</p>";
    }
  } else {
    echo "Error: Could not able to execute '".$sql ."' ".mysqli_error($conn);
  }
}
mysqli_close($conn);
//footer
require_once (__DIR__).'/footer.php';
 ?>
