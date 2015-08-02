<?php
include_once("function/conn.php");
?>
<form name="form1" method="post" action="function/activity.php" enctype="multipart/form-data">
<table style="margin:20% 0 0 40%;">
<tr><td>Product Code</td><td><input type="text" name="product_code"  ></td></tr>
<tr><td>Product Name</td><td><input type="text" name="product_name"  ></td></tr>
<tr><td>Product Describe</td><td><input type="text" name="product_desc"  ></td></tr>
<tr><td>Base Price</td><td><input type="text" name="price"  ></td></tr>
<tr><td>Product  Image</td><td><input type="file" name="uploadedimage"  ></td></tr>
<tr><td colspan="2" align="center"><input type="submit" name="addproduct" value="Submit" ></td></tr>
</table>
</form>