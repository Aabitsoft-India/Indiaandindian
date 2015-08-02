<?php
session_start();
include_once("config.php");

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View shopping cart</title>
<link href="style/style.css" rel="stylesheet" type="text/css"></head>
<body>
<div id="products-wrapper">
 <h1>View Cart</h1>
 <?php 
 if(isset($_SESSION["username"])){
 echo "Caller Name: ". $_SESSION['username'].'<br/>';

 $mobile=$_SESSION['mobile']; 
 $query="select * from ds_customer where mobile=".$mobile;
 $data=$mysqli->query($query);
 $obj1 = $data->fetch_object();
 $cust_name=$obj1->name;
 $cust_add=$obj1->address;
 $cust_phone=$obj1->phone;
 $cust_pin=$obj1->pincode;
 //echo $cust_name;
 //echo $cust_add;
 //echo $cust_phone;
 //echo $cust_pin;
 echo '<table style="border:solid #00ff0f 1px;"><tr><td>Customer Name:<b>'.$cust_name.'</b></td><td>Customer Address:<b>'.$cust_add.'</b> , <b>'.$cust_pin.'</b></td></tr><tr><td>Cuetomer Phone:<b>'.$cust_phone.'</b></td><td></td></tr></table>';
 }
 ?>
 <div class="view-cart">
 	<?php
    $current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	if(isset($_SESSION["products"]))
    {
	    $total = 0;
		echo '<form method="post" action="paypal-express-checkout/process.php">';
		echo '<ul>';
		$cart_items = 0;
		foreach ($_SESSION["products"] as $cart_itm)
        {
           $product_code = $cart_itm["code"];
		   $results = $mysqli->query("SELECT product_name,product_desc, price FROM products WHERE product_code='$product_code' LIMIT 1");
		   $obj = $results->fetch_object();
		   
		    echo '<li class="cart-itm">';
			echo '<span class="remove-itm"><a href="cart_update.php?removep='.$cart_itm["code"].'&return_url='.$current_url.'">&times;</a></span>';
			echo '<div class="p-price">'.$currency.$obj->price.'</div>';
            echo '<div class="product-info">';
			echo '<h3>'.$obj->product_name.' (Code :'.$product_code.')</h3> ';
            echo '<div class="p-qty">Qty : '.$cart_itm["qty"].'</div>';
            echo '<div>'.$obj->product_desc.'</div>';
			echo '</div>';
            echo '</li>';
			$subtotal = ($cart_itm["price"]*$cart_itm["qty"]);
			$total = ($total + $subtotal);

			echo '<input type="hidden" name="item_name['.$cart_items.']" value="'.$obj->product_name.'" />';
			echo '<input type="hidden" name="item_code['.$cart_items.']" value="'.$product_code.'" />';
			echo '<input type="hidden" name="item_desc['.$cart_items.']" value="'.$obj->product_desc.'" />';
			echo '<input type="hidden" name="item_qty['.$cart_items.']" value="'.$cart_itm["qty"].'" />';
			$cart_items ++;
			
        }
    	echo '</ul>';
		echo '<span class="check-out-txt">';
		echo '<strong>Total : '.$currency.$total.'</strong>  ';
		echo '</span>';
		echo '</form>';
		
    }else{
		echo 'Your Cart is empty';
	}
	echo '<a href="print_pdf.php">Print TO PDF</a>';
	echo '<a href="new_cust.php">New Customer</a>';
    ?>
    </div>
	
</div>
</body>
</html>
