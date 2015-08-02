<?php 
//error_reporting(E_ALL ^ E_DEPRECATED);
session_start();

include_once("conn.php");

    function GetImageExtension($imagetype)
   	 {
       if(empty($imagetype)) return false;
       switch($imagetype)
       {
           case 'image/bmp': return '.bmp';
           case 'image/gif': return '.gif';
           case 'image/jpeg': return '.jpg';
           case 'image/png': return '.png';
           default: return false;
       }
     }

if(isset($_POST['submit'])){
    $_SESSION['username'] = $_POST['uname'];
	$uname=$_POST['uname'];
	$pwd=$_POST['pwd'];
	//echo $uname.' '.$pwd;
	$result = mysql_query("select * from ds_telecaller where user='".$uname."' and pwd='".$pwd."'");
	if(mysql_num_rows($result) == 1){
		header("Location:../customer.php");
	}
	else{
		header("Location:../login.php");
	}	
}
if(isset($_POST['mobconnect'])){
	$_SESSION['mobile'] = $_POST['mobile'];
	$mobile=$_POST['mobile'];
	$todate=Date("y-m-d");
	$totime=Date("h:i:sa");
	//echo $mobile;
	$result = mysql_query("select * from ds_customer where mobile='".$mobile."'");
	if(mysql_num_rows($result) == 1){
		header("Location:../index1.php");
	}
	else{
		$add_customer = "insert into ds_customer(mobile,created_date) values(".$mobile.",".$todate.")";
		echo $add_customer;
		if(mysql_query($add_customer)==1){
			header("Location:../farmboard.php?uid=$mobile");
		}
	}
}
if(isset($_POST['farm_insert'])){
	$mobile=$_POST['mobile'];
	$todate=Date("y-m-d");
	$totime=Date("h:i:sa");
	$uname=$_POST['uname'];
	$address=$_POST['address'];
	$pincode=$_POST['pincode'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$nop=$_POST['nop'];
	//echo $mobile;
		$update_customer = "UPDATE ds_customer SET name='".$uname."',email='".$email."',address='".$address."',phone=".$phone.",pincode=".$pincode.",nop=".$nop.",created_date='".$todate."' where mobile=".$mobile."";
		echo $update_customer;
		if(mysql_query($update_customer)==1){
			header("Location:../index1.php?uid=$mobile");
		}
	}
if(isset($_POST['addproduct'])){
	$product_code=$_POST['product_code'];
	$product_eng_name=$_POST['product_eng_name'];
	$product_mt_name=$_POST['product_mt_name'];
	$prod_type=$_POST['prod_type'];
	$family_type=$_POST['family_type'];
	$prod_season=$_POST['prod_season'];
	$form=$_POST['form'];
	$prod_unit=$_POST['prod_unit'];
	$wt=$_POST['wt'];
	$wt_base_price=$_POST['wt_base_price'];
	$wt0=$_POST['wt0'];
	$wt0_base_price=$_POST['wt0_base_price'];
	$wt1=$_POST['wt1'];
	$wt1_base_price=$_POST['wt1_base_price'];
	$wt2=$_POST['wt2'];
	$wt2_base_price=$_POST['wt2_base_price'];
	$wt3=$_POST['wt3'];
	$wt3_base_price=$_POST['wt3_base_price'];
	$product_desc=$_POST['product_desc'];
	echo 'product_code '.$product_code.'<br/>product_eng_name'.$product_eng_name.'<br/>product_mt_name'.$product_mt_name.'<br/>product_type'.$prod_type.'<br/>family type<br/>'.$family_type.'<br/>Product season<br/>'.$prod_season.'<br/>form<br/>'.$form.'<br/>Product unit<br/>'.$prod_unit.'<br/>wt<br/>'.$wt.'<br/>base price<br/>'.$wt_base_price.'<br/>wt'.$wt0.'<br/>base price'.$wt0_base_price.'<br/>wt1'.$wt1.'<br/>family type<br/>'.$wt1_base_price.'<br/>family type<br/>'.$wt2.'<br/>family type<br/>'.$wt2_base_price.'<br/>family type<br/>'.$wt3.'<br/>family type<br/>'.$wt3_base_price.'<br/>family type<br/>'.$product_desc;
	
	if (!empty($_FILES["uploadedimage"]["name"])) {

	$file_name=$_FILES["uploadedimage"]["name"];
	$temp_name=$_FILES["uploadedimage"]["tmp_name"];
	$imgtype=$_FILES["uploadedimage"]["type"];
	$ext= GetImageExtension($imgtype);
	$imagename=date("d-m-Y")."-".time().$ext;
	$target_path = "images/".$imagename;
	

if(move_uploaded_file($temp_name, "../images/".$imagename)) {

 		$script="INSERT INTO `products`(`product_code`, `product_eng_name`, `product_mt_name`, `type`, `family_type`, `uploadedimage`, `seasonality`, `form`, `unit`, `wt`, `wt_base_price`, `wt0`, `wt0_base_price`, `wt1`, `wt1_base_price`, `wt2`, `wt2_base_price`, `wt3`, `wt3_base_price`, `wt4_product_desc`) VALUES(
		     ".$product_code.",'".$product_eng_name."','".$product_mt_name."','".$prod_type."','".$family_type."', '".$target_path."','".$prod_season."','".$form."','".$prod_unit."','".$wt."','".$wt_base_price."','".$wt0."','".$wt0_base_price."','".$wt1."','".$wt1_base_price."','".$wt2."','".$wt2_base_price."','".$wt3."','".$wt3_base_price."','".$product_desc."')";
	//echo "INSERT INTO ds_products (product_code, product_name, product_desc, price) VALUES ('".$product_code."', '".$product_name."', '".$product_desc."', $price)";//, '".$product_img_name."'
	echo $script;
	if(mysql_query($script)==1){
		header("Location:../customer.php");
		//echo "Good";
	}
}
}else{
   exit("Error While uploading image on the server");
} 

}
?>