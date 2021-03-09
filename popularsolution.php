<?php 
require 'core/init.php';
$general->logged_out_protect();
$user = $users->userdata($_SESSION['loginid']);
$tickets 		= $tickets->get_tickets_by_status("Closed");
$tickets_count 	= count($tickets);
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Popular Solution</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<style type="text/css">
		body{margin:10px;background-image:url('images/corner.jpg');background-repeat:no-repeat;background-attachment:fixed;}
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
	</script>
</head>
<body>
	<hr/>
	<h1>Popular Solution By Product Category</h1>
	<p>EDC : <strong><?php echo $tickets_count; ?></strong> tickets </p>
	<p>Data : <strong><?php echo $tickets_count; ?></strong> tickets </p>
	<p>EDC and Data : <strong><?php echo $tickets_count; ?></strong> tickets </p>
	<table id="datatables" class="display">
    <thead>
        <tr>
            <th>Customer</th>
            <th>Reported Date</th>
            <th>Problem Summary</th>
			      <th>Problem Detail</th>
			      <th>Resolution</th>
			      <th>Resolved By</th>
        </tr>
    </thead>
    <tbody>
		<?php 
		foreach ($tickets as $ticket) {
			$sla = $slas->sla_data($ticket['sla']);
			$customer = $customers->customer_data($ticket['idcustomer']);
			echo '<tr><td>'.$customer['namacustomer'].'</td>'.
				 '<td>'.date('d-M-Y',$ticket['reporteddate']).'</td>'.
				 '<td>'.$ticket['problemsummary'].'</td>'.
				 '<td>'.$ticket['problemdetail'].'</td>'.
				 '<td>'.$ticket['resolution'].'</td>'.
				 '<td>'.$ticket['resolvedby'].'</td></tr>';
		}
		?>
    </tbody>
	</table>
	<p>&nbsp;</p>
</body>
</html>
