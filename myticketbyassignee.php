<?php 
require 'core/init.php';
$general->logged_out_protect();
$user = $users->userdata($_SESSION['loginid']);
$tickets 		= $tickets->get_tickets_by_assignee($_SESSION['loginid']);
$tickets_count 	= count($tickets);
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>My Tickets</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<style type="text/css">
		body{background-image:url('images/corner.jpg');background-repeat:no-repeat;background-attachment:fixed;}
		.breadcrumb{font-size:12px;color:#0000A0;font-family: Arial, Helvetica, sans-serif;}
	</style>
  	<link rel="stylesheet" type="text/css" href="css/datatable.css" />
	<link rel="stylesheet" type="text/css" href="css/jquery-ui.css" />
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery.dataTables.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		$('#datatables').dataTable({
			"sScrollY": "400px",
			"sScrollX": "100%",
			"bScrollCollapse": true,
			"bPaginate": false,
			"bJQueryUI": true
		});			
	})
	</script>

</head>
<body>
	<hr/>
	<h1>List of tickets that assigned to me</h1>
	<p>Number of tickets: <strong><?php echo $tickets_count; ?></strong> </p>
	<table id="datatables" class="display">
    <thead>
        <tr>
            <th>Ticket No.</th>
			<th>Urgency</th>
            <th>Customer</th>
            <th>Reported Date</th>
			<th>Reported By</th>
            <th>Problem Summary</th>
			<th>Status</th>
			<th>Assignee</th>		
        </tr>
    </thead>
    <tbody>
		<?php 
		foreach ($tickets as $ticket) {
			$sla = $slas->sla_data($ticket['sla']);
			$customer = $customers->customer_data($ticket['idcustomer']);
			$user = $users->userdata($ticket['assignee']);
			echo '<tr><td><a href="ticketedit.php?id='.$ticket['id']. '">'.$ticket['ticketnumber'].'</a></td>'.
				 '<td>'.$sla['namasla'].'</td>'.
				 '<td>'.$customer['namacustomer'].'</td>'.
				 '<td>'.date('d-M-Y',$ticket['reporteddate']).'</td>'.
				 '<td>'.$ticket['reportedby'].'</td>'.
				 '<td>'.$ticket['problemsummary'].'</td>'.
				 '<td>'.$ticket['ticketstatus'].'</td>'.
				 '<td>'.$user['fullname'].'</td></tr>';
		}
		?>
    </tbody>
	</table>
	<p>&nbsp;</p>
</body>
</html>