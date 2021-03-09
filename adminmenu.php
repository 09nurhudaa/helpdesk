<?php 
require 'core/init.php';
$general->logged_out_protect();
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
<div id="headleftmenu">Data Master</div>
<ul>
  <li><a href="userlist.php" target="contentFrame">User List</a></li>
  <li><a href="customerlist.php" target="contentFrame">Customer List</a></li>
  <li><a href="projectlist.php" target="contentFrame">Project Info</a></li>
</ul>
</div>
<div id="leftmenu">
<div id="headleftmenu">Ticket Admin</div>
<ul>
  <li><a href="ticketlist.php" target="contentFrame">List all Tickets</a></li>
  <li><a href="slalist.php" target="contentFrame">SLA Setting</a></li>
  <li><a href="hdnews.php" target="contentFrame">Helpdesk News</a></li>
</ul>
</div>
<div id="leftmenu">
<div id="headleftmenu">System</div>
<ul>
  <li><a href="userlog.php" target="contentFrame">User Log</a></li>
  <li><a href="emaillog.php" target="contentFrame">Email Log</a></li>
  <li><a href="emailqueue.php" target="contentFrame">Email Queue</a></li>
  </ul>
</div>
</body>
</html>
