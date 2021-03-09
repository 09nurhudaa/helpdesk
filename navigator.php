<?php 
require 'core/init.php';
$general->logged_out_protect();
$user 		= $users->userdata($_SESSION['loginid']);
?> 
<!DOCTYPE HTML>
<html>
<head>
	<title>Helpdesk System</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<link rel=stylesheet type="text/css" href="css/style.css">
</head>
<body bgcolor="#b8bbbd">
<div id="leftmenu">
<div id="headleftmenu">My Tickets</div>
<ul>
  
  <?php
		if ($user['level'] != "Technical Support")
		{	echo '<li><a href="myticketbyrequester.php" target="contentFrame">My Request</a></li>'; 
		}
	?>
  <li><a href="myticketbyassignee.php" target="contentFrame">My Assignment</a></li>
  <li><a href="myticketbyresolver.php" target="contentFrame">My Resolution</a></li>
  <li><a href="myticketwaitforclosed.php" target="contentFrame">Waiting for Close</a></li>
  <li><a href="ticketlistuser.php" target="contentFrame">View All Opened Tickets</a></li>
</ul>
</div>
<div id="leftmenu">
<div id="headleftmenu">Knowledge Base</div>
<ul>
  <li><a href="searchticket.php" target="contentFrame">Search Ticket</a></li>
  <li><a href="popularsolution.php" target="contentFrame">Popular Solution</a></li>
</ul>
</div>
<?php
	if ($user['level'] == "Manager" || $user['level'] == "Admin")
	{	echo '<div id="leftmenu">
				<div id="headleftmenu">Helpdesk Statistic</div>
					<ul>
					<li><a href="pivot/hdpivot.php" target="contentFrame">Pivot Table</a></li>
					<li><a href="statistic/chart.php" target="contentFrame">SLA Chart</a></li>
					</ul>
			 </div>'; 
	}
?>
</body>
</html>
<!-- //<li><a href="statistic/summaryreport.php" target="contentFrame">Summary Report List</a></li>// -->