<?php 
require '../core/init.php';
$general->logged_out_protect();
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Summary Report</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<style type="text/css">
		body{background-image:url('../images/corner.jpg');background-repeat:no-repeat;background-attachment:fixed;font:12px arial,sans-serif;}
		.breadcrumb{font-size:12px;color:#0000A0;}
		h1{font-size:14px;color:#000000;}
		#table-a a {text-decoration:none;}
		#table-a a:hover {text-decoration:underline;}
		#table-a
		{   font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
			font-size: 12px;
			width: 600px;
			text-align: center;
			border-collapse: collapse;
		}
		#table-a th
		{   font-size: 13px;
			font-weight: normal;
			padding: 8px;
			background: #b9c9fe;
			border-top: 4px solid #aabcfe;
			border-bottom: 1px solid #fff;
			color: #039;
		}
		#table-a td
		{   padding: 8px;
			background: #e8edff;
			border-bottom: 1px solid #fff;
			color: #669;
			border-top: 1px solid transparent;
		}
		#table-a tr:hover td
		{   background: #d0dafd;
			color: #339;
		}
	</style>
</head>
<body>
	<hr/>
	<h1>[RPT001] Ticket Resolved by technician</h1>
	<br/>
	
	<table id="table-a">
		<thead>
		<tr align="center">
			<th width="203" rowspan="2">Technician</th>
		</tr>
			<tr align="center">
			<th width="58">Resolved Total</th>
			<th width="59">Detail</th>
		</tr>
		</thead>
		<tbody>
			<?php 
			$ticket_list = $tickets->get_technician_resolved_total();
			foreach ($ticket_list as $ticket)
			{	
				echo '<tr><td>'.$ticket['resolvedby'].'</td>'.
					 '<td>'.$ticket['total'].'</td>';
			}
			?>
		</tbody>
	</table>
	
	<p>&nbsp;</p>
</body>
</html>