<?php 
require '../core/init.php';
$general->logged_out_protect();
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Summary Report List</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<style type="text/css">
		body{background-image:url('../images/corner.jpg');background-repeat:no-repeat;background-attachment:fixed;font:12px arial,sans-serif;}
		.breadcrumb{font-size:12px;color:#0000A0;font-family: Arial, Helvetica, sans-serif;}
		a{text-decoration:none;}
		a:hover{text-decoration:underline;}
	</style>
</head>
<body>
	<div class="breadcrumb"> >> Helpdesk Ststistic >> Summary Report List</div>
	<hr/>
	<h2>Helpdesk Statistic Summary Report List</h2>
	<ol>
		<li><a href="RPT001.php">[RPT001] Ticket Resolved by Tehnician </a></li><br/>
		<li><a href="RPT002.php">[RPT002] Complaints report by Customer </li><br/>
	</ol>
	<p>&nbsp;</p>
</body>
</html>