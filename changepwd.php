<?php 
require 'core/init.php';
$general->logged_out_protect();
$user 	= $users->userdata($_SESSION['loginid']);
$userid	= $user['id'];
if (isset($_POST['submit']))
{	$oldpassword 	= sha1($_POST['oldpassword']);
	$userpassword	= $user['password'];
	if ($oldpassword != $userpassword)
	{	$errors[] = 'The old password does not match!';	
	}else
	{	$newpassword1 	= $_POST['newpassword1'];
		$users->changepwd($userid,$newpassword1);
		$users->log_users($_SESSION['loginid'],"Change the old password");
		header('Location: changepwd.php?success');
	}
}
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Change Password</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<style type="text/css">
		body{background-image:url('images/corner.jpg');background-repeat:no-repeat;background-attachment:fixed;font-family: Arial, Helvetica, sans-serif;}
		.breadcrumb{font-size:12px;color:#0000A0;}
		.errormsg {font-size:10pt;color:#ff0000;text-align:left;}
		.form {margin:0; padding:0; font-size:14px; }
		.form fieldset{border: #000000 solid 1px;width:98%;margin-bottom:20px;background-color: #ffffff;color: #000000;}
		.form legend{text-transform:uppercase;font-size:14px;padding:4px;background-color: #acb8c12e;}
		.form label{display: inline-block;width:150px;text-align:left;padding:6px;vertical-align:center;}
	</style>
	<script type="text/javascript">
	function cekData()
	{	if (userform.oldpassword.value == "")
		{	alert("Please type your old password!");
			userform.oldpassword.focus();
			return false;
		}
		if (userform.newpassword1.value == "")
		{	alert("Please type your new password!");
			userform.newpassword1.focus();
			return false;
		}
		if (userform.newpassword2.value == "")
		{	alert("Please retype your new password!");
			userform.newpassword2.focus();
			return false;
		} 
		if (userform.newpassword1.value != userform.newpassword2.value)
		{	alert("Please retype the same new password !");
			userform.newpassword1.focus();
			return false;
		} 
		else
			return true;   
	}
	</script>
</head>
<body>	
	<hr/>
	<form name="userform" class="form" method="post" action=""  onsubmit="return cekData();">
	<fieldset>
	<legend> Change Password </legend>
	<label>Old Password :</label> <input type='password' size='30' name='oldpassword'> <br/>
	<label>New Password :</label> <input type='password' size='30' name='newpassword1'> <br/>
	<label>Retype New Password :</label> <input type='password' size='30' name='newpassword2'> <br/>
	<label>&nbsp;</label><br/>
		<input type="submit" name="submit" value="Save"> 
		<input type="reset" name="reset" value="Reset"> 
	</fieldset>
	</form>
	<br/>
	<?php
	if(empty($errors) === false){
		echo '<p class=errormsg>' . implode('</p><p class=errormsg>', $errors) . '</p>';
	}
	if (isset($_GET['success']) && empty($_GET['success'])) {
		echo 'Your password has been changed. Please logout and relogin with the new password.';
	}
	?>
</body>
</html>