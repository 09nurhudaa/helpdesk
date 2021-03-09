<?php 
require 'core/init.php';
$general->logged_out_protect();
$id	= $_GET['id'];
$news = $hdnews->news_data($id);
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Helpdesk News</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<style type="text/css">
		body{background-image:url('images/corner.jpg');background-repeat:no-repeat;background-attachment:fixed;font-family: Arial, Helvetica, sans-serif;}
		.breadcrumb{font-size:12px;color:#0000A0;}
		.formtable {font-size:12px;color:#000000; background-color:#f0f0f0;padding:10px;width:100%;}
		.errormsg {font-size:10pt;color:#ff0000;text-align:left;}
	</style>
</head>
<body onload="init();">
	<hr/>
	<p style="font-family:arial;color:red;font-size:16px;">Helpdesk Breaking News</p>
	<table class="formtable">
	<?php
		echo '<tr><td> From :'.$news['createdby']. '</td></tr>'.
			 '<tr><td>'. date('d-M-Y',$news['createdon']) .'</td></tr>'.
			 '<tr><td><p style="font-family:arial;color:black;font-size:20px;">'.$news['title'].'</p></td></tr>'.
			 '<tr><td><p style="font-family:arial;color:black;font-size:14px;">'.nl2br($news['detail']).'</p></td></tr>';
	?>
	</table>
</body>
</html>