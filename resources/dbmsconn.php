<?php
  if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
  die('Direct access not allowed');
  exit();
  };
  
?>

<?php
  $dbServer="localhost:3306";
  $dbUser="root";
  $dbPass="";
  $dbName="shareid";
  $connect= mysqli_connect($dbServer,$dbUser,$dbPass,$dbName);
 ?>
