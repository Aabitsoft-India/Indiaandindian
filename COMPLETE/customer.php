<?php
session_start();
include_once("function/conn.php");
 if(isset($_SESSION["username"])){
echo "Username ". $_SESSION['username'];
 }
?>

<a href="addproduct.php">Add Product</a>
<a href="dashboard.php">view Product</a>
<form name="form1" method="post" action="function/activity.php" onSubmit="return ValidateForm()">
<table style="margin:20% 0 0 35%;">
<tr><td>Client Mobile</td><td><input type="text" name="mobile"></td>
<td colspan="2" align="center"><input type="submit" name="mobconnect" value="GO >>" onclick="phonenumber(document.form1.mobile)"></td></tr>
</table>
</form>
<script type="text/javascript">
function phonenumber(inputtxt)  
{  
  var phoneno = /^\d{10}$/;  
  if(inputtxt.value.match(phoneno))  
  {  
      return true;  
  }  
  else  
  {  
     alert("Not a valid Phone Number");  
     return false;  
  }  
}  
</script>