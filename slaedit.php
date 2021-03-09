<?php 
require 'core/init.php';
$general->logged_out_protect();
$user = $users->userdata($_SESSION['loginid']);
if($user['level'] != "Admin")
{ 	exit("You don't have permission to access this page!"); }
$slaid		= $_GET['id'];
$sla		= $slas->sla_data($slaid);
if (isset($_POST['submit']))
{	$namasla 		= $_POST['namasla'];
	$responsetime 	= $_POST['responsetime'];
	$resolutiontime = $_POST['resolutiontime'];
	$slawarning		= $_POST['slawarning'];
	$slas->update_sla($slaid,$namasla,$responsetime,$resolutiontime,$slawarning);
	header('location:slalist.php');
}
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Add New SLA</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<style type="text/css">
		body{background-image:url('images/corner.jpg');background-repeat:no-repeat;background-attachment:fixed;font-family: Arial, Helvetica, sans-serif;}
		.breadcrumb{font-size:12px;color:#0000A0;}
		.formtable {font-size:12px;color:#000000; background-color:#f0f0f0;padding:10px;width:500px;}
		.errormsg {font-size:10pt;color:#ff0000;text-align:left;}
	</style>
</head>
<body>	
	<hr/>
	<form method="post" action="">
	<fieldset style="display: inline-block;">
	<legend> Edit SLA </legend>
	<table class="formtable">
		<tr>
			<td> SLA Level </td><td> : </td>
			<td>
				<input type='text' size='5' name='slaid' value='<?php echo $slaid; ?>' disabled />
			</td>
		</tr>
		<tr>
			<td> SLA Name </td><td> : </td>
			<td> <input type='text' size='30' name='namasla' value='<?php echo $sla['namasla']; ?>'> </td>
		</tr>
		<tr>
			<td> Response Time </td><td> : </td>
			<td><select name="responsetime">
				<option value='<?php echo $sla['responsetime']; ?>' selected="selected"> <?php echo $sla['responsetime']; ?> </option>
				<script>
					for (var i=1;i<=24;i++)
					{	document.write("<option value=" + i + ">" + i + "</option>"); }
				</script>
				</select> 
				Hours
			</td>
		</tr>
		<tr>
			<td> Resolution Time </td><td> : </td>
				<td><select name="resolutiontime">
				<option value='<?php echo $sla['resolutiontime']; ?>' selected="selected"> <?php echo $sla['resolutiontime']; ?> </option>
				<script>
					for (var i=1;i<=999;i++)
					{	document.write("<option value=" + i + ">" + i + "</option>"); }
				</script>
				</select> 
				Hours
			</td>
		</tr>
		<tr>
			<td> SLA Warning Time </td><td> : </td>
				<td><select name="slawarning">
				<option value='<?php echo $sla['slawarning']; ?>' selected="selected"> <?php echo $sla['slawarning']; ?> </option>
				<script>
					for (var i=1;i<=999;i++)
					{	document.write("<option value=" + i + ">" + i + "</option>"); }
				</script>
				</select> 
				Hours
			</td>
		</tr>
		<tr>
			<td> </td><td> </td>
			<td> <br/>
				<input type='submit' name='submit' value=' Save '> &nbsp;&nbsp; 
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