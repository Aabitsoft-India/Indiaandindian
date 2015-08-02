<?php 
error_reporting(E_ALL ^ E_DEPRECATED);

$host="localhost";
$uname="arimaapp_veg";
$pwd="Veg43@!";
$db="arimaapp_veg";

$conn=mysql_connect($host,$uname,$pwd);

mysql_select_db($db,$conn);

/*if (mysql_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $db_host="localhost";
$db_username="arimaapp_veg";
$db_password="Veg43@!";
$db_name="arimaapp_veg";
  */
?>