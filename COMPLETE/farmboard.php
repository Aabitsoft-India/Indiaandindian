<?php
include_once("function/conn.php");
$mob=$_GET['uid'];
?>
<form name="form1" method="post" action="function/activity.php" onsubmit="return checkForm(this);">
<table style="margin:4% 0 0 34%;">
<tr><td>Mobile Number</td><td><input type="text" name="mobile" value="<?php echo $mob;?>"></td></tr>
<tr><td>User Name</td><td><input type="text" name="uname" value=""></td></tr>
<tr><td>Address</td><td><input type="text" name="address" value=""></td></tr>
<tr><td>Pin Code</td><td><input type="text" name="pincode" value=""></td></tr>
<tr><td>Landline Number</td><td><input type="text" name="phone" value=""></td></tr>
<tr><td>Email</td><td><input type="text" name="email" value=""></td></tr>
<tr><td>No of People</td><td><input type="text" name="nop" value=""></td></tr>
<tr><td align="center" colspan="2"><input type="submit" name="farm_insert" value="Make Client"></td></tr>
</table>
</form>
<script type="text/javascript">
function checkForm(form)
  {
    if(form.mobile.value == "") {
      alert("Error: Mobile Number cannot be blank!");
      form.mobile.focus();
      return false;
    }
	 if(form.uname.value == "") {
      alert("Error: User Name cannot be blank!");
      form.uname.focus();
      return false;
    }
	 if(form.address.value == "") {
      alert("Error: Address cannot be blank!");
      form.address.focus();
      return false;
    }
	 if(form.pincode.value == "") {
      alert("Error: Pincode cannot be blank!");
      form.pincode.focus();
      return false;
    }
	else{
	var phoneno = /^\d{6}$/;  
  if(form.pincode.value.match(phoneno)){  
      return true;  
  }  
  else  
  {  
     alert("Not a valid PIN Code");  
     return false;  
  }  
  }  
	 if(form.phone.value == "") {
      alert("Error: Landline Number cannot be blank!");
      form.phone.focus();
      return false;
    }
	else{
	var phoneno1 = /^\d{10}$/;  
  if(form.phone.value.match(phoneno1))
  {  
      return true;  
  }  
  else  
  {  
     alert("Not a valid Phone ");  
     return false;  
  }  
  } 
	 if(form.email.value == "") {
      alert("Error:Email Address cannot be blank!");
      form.email.focus();
      return false;
    }
	else{
		if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(form.email.value))  
	  {  
		return (true)  
	  }  
    alert("You have entered an invalid email address!")  
    return (false)  
	}
	 if(form.nop.value == "") {
      alert("Error: No of people cannot be blank!");
      form.nop.focus();
      return false;
    }
    return true;
  }
</script>