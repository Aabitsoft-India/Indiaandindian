<?php 
error_reporting(E_ALL ^ E_DEPRECATED);

$host="localhost";
$uname="root";
$pwd="";
$db="veg07";

$conn=mysql_connect($host,$uname,$pwd);

mysql_select_db($db,$conn);

/*if (mysql_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  */
?>