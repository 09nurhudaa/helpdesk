<?php 
require 'core/init.php';
$general->logged_out_protect();
if (isset($_POST['submit'])) 
{	if ($users->user_exists($_POST['username']) == true && !empty($_POST['username']))
    {	$errors[] = 'Sorry, username '.$_POST['username'].' is already exists!';
	}
	if ($users->email_exists($_POST['email']) == true && !empty($_POST['email']))
    {	$errors[] = 'Sorry, email '.$_POST['email'].' is already exists!';
	}
	if(empty($errors) === true)
	{	$fullname 	= $_POST['fullname'];
		$username 	= htmlentities($_POST['username']);
		$password 	= $_POST['password'];
		$email 		= htmlentities($_POST['email']);
		$Telp 		= $_POST['telp'];
		$level 		= $_POST['level'];
		$locked 	= $_POST['locked'];
		$users->register($username,$password,$email,$fullname,$Telp,$level,$locked);
		header('Location: userlist.php');
	}
}
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Add New User</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<link href="css/styleform.css" rel="stylesheet" type="text/css" />
	<style type="text/css">
		body{background-image:url('images/corner.jpg');background-repeat:no-repeat;background-attachment:fixed;font-family: Arial, Helvetica, sans-serif;}
	</style>
	<script type="text/javascript">
	function cekData()
	{	if (userform.fullname.value == "")
		{	alert("User full name must be filled!");
			userform.fullname.focus();
			return false;
		}
        if (userform.email.value == "")
		{	alert("User email address must be filled!");
			userform.email.focus();
			return false;
		}  
		var filter = new RegExp(
			"^[_A-Za-z0-9-\\+]+(\\.[_A-Za-z0-9-]+)*@" +
			"[A-Za-z0-9-]+(\\.[A-Za-z0-9]+)*(\\.[A-Za-z]{2,})$");
		if (!filter.test(userform.email.value))
		{	alert("Please enter a valid email address!");
			userform.email.focus();
			return false;
		}
		if (userform.telp.value == "")
		{	alert("User telephone must be filled!");
			userform.telp.focus();
			return false;
		}
		if(/\D/.test(userform.telp.value))
        {   alert("User telephone must be filled with numbers only!");
			userform.telp.focus();
			return false;
        }
		if (userform.username.value == "")
		{	alert("Username must be filled!");
			userform.username.focus();
			return false;
		}  
		if (userform.password.value == "" || (userform.password.value).length < 3)
		{	alert("User password must be filled at least 3 characters!");
			userform.password.focus();
			return false;
		}  
		else
			return true;   
	}
	</script>
</head>
<body>	
	<hr/>
	<div id="notes"> *) All fields are required</div><br/>
	<form name="userform" class="form" method="post" action="" onsubmit="return cekData();">
	<fieldset>
	<legend> Add New User </legend>
	<label>Full Name :</label> <input type='text' size='30' name='fullname'/> <br/>
	<label>Email :</label> <input type='text' size='30' name='email'/> <br/>
	<label>Telp :</label> <input type='text' size='30' name='telp'> <br/>
	<label>User Name :</label> <input type='text' size='30' name='username'> <br/>
	<label>Password :</label> <input type='text' size='30' name='password'> <br/>
	<label>User Level :</label> 
		<select name="level">
			<option value="User" selected="selected"> User </option>
			<option value="Manager"> Manager </option>
			<option value="Admin"> Admin </option>
			<option value="Technical Support"> Technical Support</option>
		</select><br/>
	<label>Lock User : </label>	
		<input type="radio" name="locked" value="0" /> <font color="#ffffff"> Yes </font>
		<input type="radio" name="locked" value="1" CHECKED /> <font color="#ffffff"> No </font>
	<label>&nbsp;</label><br/>
		<input type="submit" name="submit" value="Save"> 
		<input type="reset" name="reset" value="Reset"> 
	</fieldset>
	</form>
	<?php 
	if(empty($errors) === false){
		echo '<p class=errormsg>' . implode('</p><p class=errormsg>', $errors) . '</p>';
	}
	?>
</body>
</html>