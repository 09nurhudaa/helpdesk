<?php 
require 'core/init.php';
$general->logged_out_protect();
$user = $users->userdata($_SESSION['loginid']);
$closetickets =  $tickets->get_tickets_by_status("Closed");
$tickets_count 	= count($closetickets);
$period1		= date('d-M-Y',strtotime("-1 month",time()));
$period2 		= date('d-M-Y',time());
$p1 = strtotime($period1);
$p2 = strtotime($period2);
$listtickets = $tickets->search_closed_ticket($p1, $p2);
if (isset($_POST['submit']))
{	$period1 	= strtotime($_POST['period1']);
	$period2 	= strtotime($_POST['period2']);
	$listtickets = $tickets->search_closed_ticket($period1, $period2);
	$period1	= date('d-M-Y',$period1);
	$period2 	= date('d-M-Y',$period2);
}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Search Tickets</title>
	<meta charset="utf-8" />
	<style type="text/css">
		body{background-image:url('images/corner.jpg');background-repeat:no-repeat;background-attachment:fixed;}
		.breadcrumb{font-size:12px;color:#0000A0;font-family: Arial, Helvetica, sans-serif;}
	</style>
  	<link rel="stylesheet" href="css/datatable.css" />
	<link rel="stylesheet" href="css/jquery-ui.css" />
	<script src="js/jquery.js"></script>
	<script src="js/jquery-ui.js"></script>
	<script src="js/jquery.dataTables.js"></script>
		<script type="text/javascript"> 
			$(document).ready(function(){
				$("#period1,#period2").datepicker({
				dateFormat  : "dd-M-yy",
				changeMonth : true,
				changeYear  : true, 
				});
			});
		</script>
	<script>
		$(document).ready(function(){
			$('#datatables').dataTable({
				"sScrollY": "100%",
				"sScrollX": "100%",
				"bScrollCollapse": true,
				"bPaginate": false,
				"bJQueryUI": true});			
		});
		$('#datatables').css('min-height','300');
	</script>
</head>
<body>
	<hr />
	<h1>Search Tickets in Knowledge Based</h1>
	<p>Total knowladge base : <strong><?php echo $tickets_count; ?></strong> tickets</p>
	<form name="searchform" method="post" action="">
		<p>	Period: <input type="text" id="period1" name="period1" readonly="readonly" value="<?php echo $period1; ?>"> to 
			<input type="text"  id="period2" name="period2" readonly="readonly"  value="<?php echo $period2; ?>"> 
			<input type="submit" name='submit' value="Search" /> 
		</p>
	</form>
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
		foreach ($listtickets as $ticket) {
			$sla = $slas->sla_data($ticket['sla']);
			$customer = $customers->customer_data($ticket['idcustomer']);
			$user = $users->userdata($ticket['assignee']);
			echo '<tr><td><a href=ticketread.php?id='.$ticket['id']. '>'.$ticket['ticketnumber'].'</a></td>'.
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
	<tfoot>
    <tr>
      <td>&nbsp;</td>
    </tr>
	</tfoot>
	</table>
</body>
</html>
