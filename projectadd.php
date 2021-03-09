<?php 
date_default_timezone_set("Asia/Jakarta");
$date = date('m/d/Y h:i:s', time());
require 'core/init.php';
$general->logged_out_protect();
if (isset($_POST['submit']))
{	$projectname 	= $_POST['projectname'];
	$idcustomer 	= $_POST['idcustomer'];
	
	$deliverybegin 	= strtotime($_POST['deliverybegin']);
	$deliveryend 	= strtotime($_POST['deliveryend']);
	
	$installbegin 	= strtotime($_POST['installbegin']);
	$installend 	= strtotime($_POST['installend']);

	$uatbegin 	= strtotime($_POST['uatbegin']);
	$uatend 	= strtotime($_POST['uatend']);
	
	$billstartdate 	= strtotime($_POST['billstartdate']);
	$billduedate 	= strtotime($_POST['billduedate']);
	
	$warrantyperiod = $_POST['warrantyperiod'];

	$contractstartdate 	= strtotime($_POST['contractstartdate']);
	$contractperiod = $_POST['contractperiod'];
	
	$projects->add_project($projectname,$idcustomer,$deliverybegin,$deliveryend,$installbegin,$installend,$uatbegin,$uatend,$billstartdate,$billduedate,$warrantyperiod,$contractstartdate,$contractperiod);
	header('location: projectlist.php');
}
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Add New User</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<style type="text/css">
		body{font-size:12px;background-image:url('images/corner.jpg');background-repeat:no-repeat;background-attachment:fixed;font-family: Arial, Helvetica, sans-serif;}
		.breadcrumb{font-size:12px;color:#0000A0;}
		.formtable {font-size:12px;color:#000000; background-color:#f0f0f0;padding:10px;width:550px;}
		.errormsg {font-size:10pt;color:#ff0000;text-align:left;}
	</style>
	<link rel="stylesheet" href="css/jquery-ui.css" />
	<script src="js/jquery.js"></script>
	<script src="js/jquery-ui.js"></script>
	<script type="text/javascript"> 
		$(document).ready(function(){
			$("#deliverybegin,#deliveryend,#installbegin,#installend,#uatbegin,#uatend,#billstartdate,#billduedate,#contractstartdate").datepicker
			({dateFormat:"dd-M-yy",changeMonth:true,changeYear:true,});
		});
	</script>
	<script type="text/javascript"> 
	function cekData()
	{	if (projectform.projectname.value == "")
		{	alert("Project Name must be filled!");
			projectform.projectname.focus();
			return false;
		}
		else
			return true;   
	}
	</script>
</head>
<body>	
	<hr/>
	<form name="projectform" method="post" action="" onsubmit="return cekData();">
	<fieldset style="display: inline-block;">
	<legend> ADD NEW PROJECT </legend>
	<table class="formtable">
		<tr>
			<td width="100"> Project Name :</td>
			<td> <input type='text' size='30' name='projectname'> </td>
		</tr>
		<tr>
			<td> Customer : </td>
			<td> 
			<?php
				$customers = $customers->get_customers();
				echo '<select name="idcustomer">';
				foreach ($customers as $customerval)
				{	echo '<option value=' . $customerval['idcustomer'] . '>' .  $customerval['namacustomer'] . '</option>';
				}
				echo '</select>';
			?>
			</td>
		</tr>
	</table><br/>
	<table class="formtable">
		<tr>
			<td width="100"> Delivery Date : </td>
			<td>
				<input type="text" id="deliverybegin" name="deliverybegin" readonly="readonly"> 
				&nbsp;&nbsp; Until :&nbsp;&nbsp;
				<input type="text" id="deliveryend" name="deliveryend" readonly="readonly"> 
			</td>
		</tr>
	</table><br/>
	<table class="formtable">
		<tr>
			<td width="100"> Install Date : </td>
			<td>
				<input type="text" id="installbegin" name="installbegin" readonly="readonly"> 
				&nbsp;&nbsp; Until :&nbsp;&nbsp;
				<input type="text" id="installend" name="installend" readonly="readonly"> 
			</td>
		</tr>
	</table><br/>
	<table class="formtable">
		<tr>
			<td width="100"> UAT Date : </td>
			<td>
				<input type="text" id="uatbegin" name="uatbegin" readonly="readonly"> 
				&nbsp;&nbsp; Until :&nbsp;&nbsp;
				<input type="text" id="uatend" name="uatend" readonly="readonly"> 
			</td>
		</tr>
	</table><br/>
	<table class="formtable">
		<tr>
			<td width="100"> Bill Date : </td>
			<td>
				<input type="text" id="billstartdate" name="billstartdate" readonly="readonly"> 
				&nbsp;&nbsp; Until :&nbsp;&nbsp;
				<input type="text" id="billduedate" name="billduedate" readonly="readonly"> 
			</td>
		</tr>
	</table><br/>
	<table class="formtable">
		<tr>
			<td width="100"> Warranty Period : </td>
			<td><select name="warrantyperiod" style="width:50px;">
				<script>
					for (var i=1;i<=3;i++)
					{	document.write("<option value=" + i + ">" + i + "</option>"); }
				</script>
				</select> Year 
			</td>
		</tr>
	</table><br/>
	<table class="formtable">
		<tr>
			<td width="100"> Contract Start : </td>
			<td>
				<input type="text" id="contractstartdate" name="contractstartdate" readonly="readonly"> 
				&nbsp;&nbsp; Contract Period : &nbsp;&nbsp; 
				<select name="contractperiod" style="width:50px;">
				<script>
					for (var i=1;i<=36;i++)
					{	document.write("<option value=" + i + ">" + i + "</option>"); }
				</script>
				</select> Month
			</td>
		</tr>
		<tr>
			<td>&nbsp; </td>
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