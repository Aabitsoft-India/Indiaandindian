<?php
session_start();
unset($_SESSION['mobile']);
header("Location: customer.php");
?>