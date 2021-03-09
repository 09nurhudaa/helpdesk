<?php 
require 'core/init.php';
$general->logged_out_protect();
if (isset($_POST['submit']))
{	$namacustomer 	= $_POST['namacustomer'];
	$password 		= $_POST['password'];
	$alamat 		= $_POST['alamat'];
	$Telp 			= $_POST['telp'];
	$email 			= $_POST['email'];
	$PIC 			= $_POST['PIC'];
	$selesperson 	= $_POST['selesperson'];
	$customerproduct= $_POST['customerproduct'];
	$customers->add_customer($namacustomer,$alamat,$Telp,$email,$PIC,$selesperson,$customerproduct);
	header('Location: customerlist.php');
	exit();
}
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Add New Customer</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<style type="text/css">
		body{background-image:url('images/corner.jpg');background-repeat:no-repeat;background-attachment:fixed;font-family: Arial, Helvetica, sans-serif;}
		.breadcrumb{font-size:12px;color:#0000A0;}
		.formtable {font-size:12px;color:#000000; background-color:#f0f0f0;padding:10px;width:500px;}
		.errormsg {font-size:10pt;color:#ff0000;text-align:left;}
	</style>
	<script type="text/javascript">
	function cekData()
	{	if (customerform.namacustomer.value == "")
		{	alert("Customer name must be filled!");
			customerform.namacustomer.focus();
			return false;
		}
		if (customerform.alamat.value == "")
		{	alert("Customer address must be filled!");
			customerform.alamat.focus();
			return false;
		}
		if (customerform.telp.value == "")
		{	alert("Customer telephone must be filled!");
			customerform.telp.focus();
			return false;
		}
		var customer_telp = customerform.telp.value;
		if(/\D/.test(customer_telp))
        {   alert("Customer telephone must be filled with numbers only!");
			customerform.telp.focus();
			return false;
        }
        if (customerform.email.value == "")
		{	alert("Customer email must be filled!");
			customerform.email.focus();
			return false;
		}  
		var filter = new RegExp(
			"^[_A-Za-z0-9-\\+]+(\\.[_A-Za-z0-9-]+)*@" +
			"[A-Za-z0-9-]+(\\.[A-Za-z0-9]+)*(\\.[A-Za-z]{2,})$");
		if (!filter.test(customerform.email.value))
		{	alert("Please enter a valid email address!");
			customerform.email.focus();
			return false;
		}	   
		else
			return true;   
	}
	</script>
</head>
<body>	
	<hr/>
	<form name="customerform" method="post" action="" onsubmit="return cekData();">
	<fieldset style="display: inline-block;">
	<legend> Add New Customer </legend>
	<table class="formtable">
		<tr align="left">
			<td> Customer Name</td><td> : </td>
			<td> <input type='text' size='50' name='namacustomer' maxlength="50"> </td>
		</tr>
		<tr align="left">
			<td> Address </td><td> : </td>
			<td> <textarea name="alamat" rows="3" cols="38"></textarea> </td>
		</tr>
		<tr align="left">
			<td> Telp </td><td> : </td>
			<td> <input type='text' size='20' name='telp' maxlength="20"> </td>
		</tr>
		<tr align="left">
			<td> Email </td><td> : </td>
			<td> <input type='text' size='50' name='email' maxlength="50"> </td>
		</tr>
		<tr align="left">
			<td> PIC</td><td> : </td>
			<td> <input type='text' size='50' name='PIC' maxlength="50"> </td>
		</tr>
		<tr align="left">
			<td> Sales Person</td><td> : </td>
			<td> <input type='text' size='50' name='selesperson' maxlength="50"> </td>
		</tr>
		<tr align="left">
			<td> Customer Product</td><td> : </td>
			<td><select name="customerproduct">
					<option value="EDC" selected="selected"> EDC </option>
					<option value="Data"> Data </option>
					<option value="EDCData"> EDC and Data </option>
				</select>
			</td>
		</tr>
		<tr align="left">
			<td> </td>
			<td> </td>
			<td> 
				<input type='submit' name='submit' value=' Save '>  
				<input type='reset' name='reset' value=' Reset '> 
			</td>
		</tr>
	</table>
	</fieldset>
	</form>

	<?php 
	if(empty($errors) === false){
		echo '<p class=errormsg>' . implode('</p><p class=errormsg>', $errors) . '</p>';
	}
	?>
</body>
</html>