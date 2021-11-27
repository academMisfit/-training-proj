<?php
// The MySQL service named in the docker-compose.yml.
$host = 'db';
$user = 'root';
$passwd = 'root_password';
$dbName = 'proto';

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$conn = mysqli_connect($host, $user, $passwd, $dbName);
/* Set the desired charset after establishing a connection */
mysqli_set_charset($conn, 'utf8');

if (!$conn) {
  printf("Error: ", mysqli_get_host_info($mysqli));
}
 ?>
