<?php 
require 'core/init.php';
$general->logged_out_protect();
$id=$_GET['id'];
$member=$users->userdata($id);
if (isset($_POST['submit']))
{	$fullname 	= $_POST['fullname'];
	$username 	= htmlentities($_POST['username']);
	$password 	= $_POST['password'];
	$email 		= htmlentities($_POST['email']);
	$Telp 		= $_POST['telp'];
	$level 		= $_POST['level'];
	$locked 	= $_POST['locked'];
	//echo 'Old Passw: '.$member['password']. ' New Passw:'. $password;
	if ($password=="")
	{	$password = $member['password'];}
	$users->update($id,$username,$password,$email,$fullname,$Telp,$level,$locked);
	header('Location: userlist.php');
}
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Update User</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<LINK rel="stylesheet" type="text/css" href="css/styleform.css">
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
		else
			return true;
	}
	</script>
</head>
<body>	
	<hr/>
	<div id="notes"> *) All fields are required, except password <br/>
	if password is blank then password will not change
	</div><br/>
	<form name="userform" class="form" method="post" action="" onsubmit="return cekData();">
	<fieldset style="display: inline-block;">
	<legend> Edit User </legend>
	<label>Full Name :</label> <input type='text' size='30' name='fullname' value='<?php echo $member['fullname']; ?>'>
	<label>Email :</label> <input type='text' size='30' name='email' value='<?php echo $member['email']; ?>'> </td>
	<label>Telp :</label> <input type='text' size='30' name='telp' value='<?php echo $member['Telp']; ?>'> </td>
	<label>User Name :</label> <input type='text' size='30' name='username' value='<?php echo $member['username']; ?>' disabled> </td>
	<label>Password :</label> <input type='text' size='30' name='password'> </td>
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
		<input type='submit' name='submit' value=' Update '>  
		<input type='reset' name='reset' value=' Reset '> 
	</fieldset>
	</form>
</body>
</html>