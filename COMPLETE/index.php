<?php
include_once("function/conn.php");
?>
<form name="form1" method="post" action="function/activity.php" onsubmit="return checkForm(this);">
<table style="margin:20% 0 0 40%;">
<tr><td>User Name</td><td><input type="text" name="uname"  ></td></tr>
<tr><td>Password</td><td><input type="password" name="pwd"  ></td></tr>
<tr><td colspan="2" align="center"><input type="submit" name="submit" value="Submit" ></td></tr>
</table>
</form>
<script type="text/javascript">
function checkPassword(str)
  {
    var re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/;
    return re.test(str);
  }

  function checkForm(form)
  {
    if(form.uname.value == "") {
      alert("Error: Username cannot be blank!");
      form.uname.focus();
      return false;
    }
    re = /^\w+$/;
    if(!re.test(form.uname.value)) {
      alert("Error: Username must contain only letters, numbers and underscores!");
      form.uname.focus();
      return false;
    }
    if(form.pwd.value != "" && form.pwd.value == form.pwd2.value) {
      if(!checkPassword(form.pwd.value)) {
        alert("The password you have entered is not valid!");
        form.pwd.focus();
        return false;
      }
    } else {
      alert("Error: Please check that you've entered and confirmed your password!");
      form.pwd.focus();
      return false;
    }
    return true;
  }
</script>