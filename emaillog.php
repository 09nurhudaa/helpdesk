<?php 
require 'core/init.php';
$general->logged_out_protect();
$user = $users->userdata($_SESSION['loginid']);
if($user['level'] != "Admin")
{ 	exit("You don't have permission to access this page!"); }
$logs 	= $emails->get_email();
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Email Log</title>
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
	<h1>Email Log</h1>
	<table id="datatables" class="display">
    <thead>
        <tr>
            <th>Send Date</th>
			<th>To</th>
            <th>CC</th>
			<th>Subject</th>
			<th>Status</th>
        </tr>
    </thead>
    <tbody>
		<?php 
		foreach ($logs as $log)
		{	echo '<tr><td>'.date('d-M-Y H:i', $log['senddate']).'</td>'.
				 '<td>'.$log['emailto'].'</td>'.
				 '<td>'.$log['emailcc'].'</td>'.
				 '<td>'.$log['emailsubject'].'</td>'.
				 '<td>'.$log['emailstatus'].'</td></tr>';
		}
		?>
    </tbody>
	</table>
</body>
</html>