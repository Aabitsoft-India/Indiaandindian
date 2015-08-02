<!DOCTYPE html>
<html>
<?php
session_start();
include_once("function/conn.php");
?>
<title></title>
<script type="text/javascript">
var editor = CKEDITOR.replace( 'prod_desc', {
	filebrowserBrowseUrl : 'ckfinder/ckfinder.html',
	filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',
	filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?type=Flash',
	filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
	filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});
CKFinder.setupCKEditor( editor, '../' );
</script>
<script src="include/ckeditor/ckeditor.js"></script>
</body>
<form name="form1" method="post" action="function/activity.php" enctype="multipart/form-data">
<table style="margin:4% 0 0 10%;">
<tr><td>Product Code</td><td><input type="text" name="product_code" tabindex="1"></td></tr>
<tr><td>Product English Name</td><td><input type="text" name="product_eng_name" placeholder="Product English Name" tabindex="2"></td><td><input type="text" name="product_mt_name" placeholder="Product Hindi Name" tabindex="3"></td></tr>
<tr><td>Product Type</td><td><select name="prod_type" tabindex="4"><option>Vegetables</option><option>Fruit</option></select></td></tr>
<tr><td>Family Type</td><td><input type="text" name="family_type" placeholder="Family Type" tabindex="5"></td></tr>
<tr><td>Product  Image</td><td><input type="file" name="uploadedimage" tabindex="6"></td></tr>
<tr><td>Seasonality</td><td><select name="prod_season" tabindex="7"><option>Yes</option><option>No</option></select></td></tr>
<tr><td>Form</td><td><input type="text" name="form" placeholder="Form" tabindex="8"></td></tr>
<tr><td>Unit</td><td><select name="prod_unit" tabindex="9"><option>BUNCH</option><option>GRAMS</option><option>PCS</option></select></td></tr>
<tr><td>wt</td><td><input type="text" name="wt" placeholder="Weight" tabindex="10"></td><td><input type="number" name="wt_base_price" placeholder="Weight Price" tabindex="11"></td></tr>
<tr><td>wt0</td><td><input type="text" name="wt0" placeholder="Weight" tabindex="12"></td><td><input type="number" name="wt0_base_price" placeholder="Weight Price" tabindex="13"></td></tr>
<tr><td>wt1</td><td><input type="text" name="wt1" placeholder="Weight" tabindex="14"></td><td><input type="number" name="wt1_base_price" placeholder="Weight Price"tabindex="15"></td></tr>
<tr><td>wt2</td><td><input type="text" name="wt2" placeholder="Weight"tabindex="16"></td><td><input type="number" name="wt2_base_price" placeholder="Weight Price" tabindex="17"></td></tr>
<tr><td>wt3</td><td><input type="text" name="wt3" placeholder="Weight" tabindex="18"></td><td><input type="number" name="wt3_base_price" placeholder="Weight Price" tabindex="19"></td></tr>
<tr><td>Product Describe</td><td colspan="2"><textarea id="prod_desc" name="product_desc" cols="20" rows="4" placeholder="Product Description" tabindex="20"></textarea></td></tr>
<tr><td colspan="2" align="center"><input type="submit" name="addproduct" value="Submit" ></td></tr>
</table>
</form>
<?php
/*
ENGLISH NAME	
Hindi Name	
Rate (Rs.)/ kg. or pc.	
product type	
Family	Type	
LIFE SPAN	
seasonality	
FORM	
unit	
wt	
WT0	
wt1	
wt2	
wt3	
wt4	
description
*/
?>
</body>
</html>