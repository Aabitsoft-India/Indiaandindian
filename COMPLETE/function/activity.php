<?php 
//error_reporting(E_ALL ^ E_DEPRECATED);
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
			header("Location:../dashboard.php?uid=$mobile");
		}
	}
if(isset($_POST['addproduct'])){
	$product_code=$_POST['product_code'];
	$product_name=$_POST['product_name'];
	$product_desc=$_POST['product_desc'];
	//$product_img_name=$_POST['product_img_name'];
	$price=$_POST['price'];
	
	if (!empty($_FILES["uploadedimage"]["name"])) {

	$file_name=$_FILES["uploadedimage"]["name"];
	$temp_name=$_FILES["uploadedimage"]["tmp_name"];
	$imgtype=$_FILES["uploadedimage"]["type"];
	$ext= GetImageExtension($imgtype);
	$imagename=date("d-m-Y")."-".time().$ext;
	$target_path = "images/".$imagename;
	

if(move_uploaded_file($temp_name, "../images/".$imagename)) {

 		$script="INSERT INTO products( product_code, product_name, product_desc, product_img_name, price) VALUES ('".$product_code."','".$product_name."','".$product_desc."','".$target_path."',".$price.")";//, '".$product_img_name."'
	//echo "INSERT INTO ds_products (product_code, product_name, product_desc, price) VALUES ('".$product_code."', '".$product_name."', '".$product_desc."', $price)";//, '".$product_img_name."'
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