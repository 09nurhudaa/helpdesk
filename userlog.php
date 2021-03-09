<?php 
require 'core/init.php';
$general->logged_out_protect();
$user = $users->userdata($_SESSION['loginid']);
if($user['level'] != "Admin")
{ 	exit("You don't have permission to access this page!"); }
$logs 		= $users->get_users_log();
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>User Log</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<style type="text/css">
		body{background-image:url('images/corner.jpg');background-repeat:no-repeat;background-attachment:fixed;}
		.breadcrumb{font-size:12px;color:#0000A0;font-family: Arial, Helvetica, sans-serif;}
	</style>
  	<link rel="stylesheet" type="text/css" href="css/datatable.css" />
	<link rel="stylesheet" type="text/css" href="css/jquery-ui.css" />
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/jquery.dataTables.js" type="text/javascript"></script>
	<script type="text/javascript" charset="utf-8">
	$(document).ready(function(){
		$('#datatables').dataTable({
			"sScrollY": "400px",
			"sScrollX": "100%",
			"bScrollCollapse": true,
			"bPaginate": false,
			"bJQueryUI": true
		});			
	})
	function delete_confirm(link) {
		var msg = confirm('Are you sure to delete this user?');
		if(msg == false) {
			return false;
		}
	}
	</script>

</head>
<body>
	<hr/>
	<h1>User Log</h1>
	<table id="datatables" class="display">
    <thead>
        <tr>
            <th>Log Date</th>
			<th>User</th>
            <th>IP</th>
            <th>Browser</th>
			<th>Log</th>
        </tr>
    </thead>
    <tbody>
		<?php 
		foreach ($logs as $log)
		{	$username = $users->get_user_by_id($log['iduser']);
			echo '<tr><td>'.date('d-M-Y H:i', $log['time']).'</td>'.
				 '<td>'.$username['username'].'</td>'.
				 '<td>'.$log['ip'].'</td>'.
				 '<td>'.$log['browser'].'</td>'.
				 '<td>'.$log['log'].'</td></tr>';
		}
		?>
    </tbody>
	</table>
</body>
</html>