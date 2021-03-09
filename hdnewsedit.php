<?php 
require 'core/init.php';
$general->logged_out_protect();
$id=$_GET['id'];
$thenews=$hdnews->news_data($id);
if (isset($_POST['submit']))
{	$newsdate 	= strtotime($_POST['newsdate']);
	$title 		= $_POST['title'];
	$detail 	= $_POST['detail'];
	$user 		= $users->userdata($_SESSION['loginid']);
	$createdby 	= ucwords(strtolower($user['fullname']));
	$createdon 	= strtotime(now);
	$expired 	= strtotime($_POST['expireddate']);
	
	$hdnews->update_news($id,$newsdate,$title,$detail,$createdby,$createdon,$expired);
	header('Location: hdnews.php');
}
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Add Helpdesk News</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<style type="text/css">
		body{font-size:12px;background-image:url('images/corner.jpg');background-repeat:no-repeat;background-attachment:fixed;font-family: Arial, Helvetica, sans-serif;}
		.breadcrumb{font-size:12px;color:#0000A0;}
		.formtable {font-size:12px;color:#000000; background-color:#f0f0f0;padding:10px;width:600px;}
		.errormsg {font-size:10pt;color:#ff0000;text-align:left;}
	</style>
	<link rel="stylesheet" href="css/jquery-ui.css" />
	<script type="text/javascript" src="js/jquery.js"></script>
	<script src="js/jquery-ui.js"></script>
	<script type="text/javascript"> 
		$(document).ready(function(){
			$("#newsdate,#expireddate").datepicker
			({dateFormat:"dd-M-yy",changeMonth:true,changeYear:true,});
		});
	</script>
	<script type="text/javascript">
	function cekData()
	{	if (newsform.title.value == "")
		{	alert("Headline News must be filled!");
			newsform.title.focus();
			return false;
		}
		if (newsform.detail.value == "")
		{	alert("Detail News must be filled!");
			newsform.detail.focus();
			return false;
		}
		else
			return true;   
	}
	</script>
</head>
<body>	
	<hr/>
	<form name="newsform" method="post" action="" onsubmit="return cekData();">
	<fieldset style="display: inline-block;">
	<legend> Update Helpdesk News </legend>
	<table class="formtable">
		<tr align="left">
			<td> News Date </td><td> : </td>
			<td><input type="text" id="newsdate" name="newsdate" readonly="readonly" value="<?php echo date('d-M-Y',$thenews['newsdate']); ?>">
			</td>
		</tr>
		<tr align="left">
			<td> Headline News</td><td> : </td>
			<td> <input type='text' size='70' name='title' maxlength="70" value="<?php echo $thenews['title']; ?>"> </td>
		</tr>
		<tr align="left">
			<td> News Detail </td><td> : </td>
			<td> <textarea name="detail" rows="3" cols="50"><?php echo $thenews['detail']; ?></textarea> </td>
		</tr>
		<tr align="left">
			<td> News Expired Date</td><td> : </td>
			<td><input type="text" id="expireddate" name="expireddate" readonly="readonly" value="<?php echo date('d-M-Y',$thenews['expired']); ?>">
			</td>
		</tr>
		<tr align="left">
			<td> </td>
			<td> </td>
			<td> <br/>
				<input type='submit' name='submit' value=' Update '>  &nbsp;&nbsp;&nbsp;
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