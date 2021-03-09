<?php 
require 'core/init.php';
$general->logged_out_protect();
$changeby = $_SESSION['loginid'];
$user 	= $users->userdata($_SESSION['loginid']);
$id		= $_GET['id'];
$ticket	= $tickets->ticket_data($id);
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Update Ticket</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<style type="text/css">
		body{background-image:url('images/corner.jpg');background-repeat:no-repeat;background-attachment:fixed;font-family: Arial, Helvetica, sans-serif;}
		.breadcrumb{font-size:12px;color:#0000A0;}
		.formtable {text-align:left; font-size:12px;color:#000000; background-color:#f0f0f0;padding:10px;width:600px; }
		.errormsg {font-size:10pt;color:#ff0000;text-align:left;}
	</style>
</head>
<body>	
	<hr/>
	<div id="contentprint">
	<form name="ticketform" method="post" action="" onsubmit="return cekData();">
	<fieldset style="display: inline-block;">
	<?php echo '<legend> Ticket No: '.$ticket['ticketnumber'].'</legend>'; ?>
	<table class="formtable">
		<tr>
			<td width="120"> Customer </td><td> : </td>
			<td> 
			<?php 
				$customer=$customers->customer_data($ticket['idcustomer']);
				echo $customer['namacustomer'];
			?> </td>
		</tr>
		<tr>
			<td> Customer Product</td><td> : </td>
			<td> <?php echo $customer['customerproduct']; ?> </td>
		</tr>
		<tr>
			<td> Warranty Period</td><td> : </td>
			<td> 
			<?php 
				$project=$projects->get_project_customer($customer['idcustomer']);
				echo $project['warrantyperiod'].' Year';
			?> </td>
		</tr>
		<tr>
			<td> Contract Period</td><td> : </td>
			<td>
			<?php
				echo $project['contractperiod'].' Month';
			?>
			</td>
		</tr>
	</table>
	<br/>
	<table class="formtable">
		<tr>
			<td width="120">Ticket No:</td><td> : </td>	
			<td><?php echo $ticket['ticketnumber']; ?>
			<input type="hidden" size='20' name='ticketnumber' value="">
			</td>
		</tr>
		<tr>
			<td> Reported Date</td><td> : </td>
			<td> <?php echo date('d-M-Y',$ticket['reporteddate']); ?> </td>
		</tr>
		<tr>
			<td> Reported By </td><td> : </td>
			<td> <?php echo $ticket['reportedby']; ?> </td>
		</tr>
		<tr>
			<td> Urgency (SLA)</td><td> : </td>
			<td> 
			<?php 
				$sladata = $slas->sla_data($ticket['sla']);
				echo $sladata['namasla'];
			?>
			</td>
		</tr>
		<tr>
			<td> Problem Summary </td><td> : </td>
			<td> <?php echo $ticket['problemsummary']; ?> </td>
		</tr>
		<tr valign="top">
			<td> Problem Detail </td><td> : </td>
			<td> <?php echo nl2br($ticket['problemdetail']); ?> </td>
		</tr>
		<tr>
			<td> Telp </td><td> : </td>
			<td> <?php echo $ticket['telp']; ?> </td>
		</tr>
		<tr>
			<td> Email </td><td> : </td>
			<td> <?php echo $ticket['email']; ?> </td>
		</tr>
	</table>
	<br/>
	<table class="formtable">
		<tr>
			<td width="120"> Assign to </td><td> : </td>
			<td> 
			<?php
				$userassignee = $users->userdata($ticket['assignee']);
				echo $userassignee['fullname'];
			?>
			</td>
		</tr>
		<tr>
			<td> Status </td><td> : </td>
			<td> <?php echo $ticket['ticketstatus']; ?> </td>
		</tr>
		<tr valign="top">
			<td> Resolution </td><td> : </td>
			<td> <?php echo nl2br($ticket['resolution']); ?> </td>
		</tr>
	</table>
	</fieldset>
	</form>
	<br/>
	<fieldset style="display: inline-block;">
	<legend> Ticket Audit Trail</legend>
	<table class="formtable">
	<tr bgcolor="#e0e0e0" ><td width="150">Updated On</td><td width="150">Updated By</td><td>Description</td></tr>
	<?php
		$list_log_tickets = $tickets->get_audit_trail($id);
		foreach ($list_log_tickets as $log_ticket)
		{	$changed_by = $users->userdata($log_ticket['changeby']);
			echo '<tr><td>'.date('d-M-Y H:i:s',$log_ticket['changedate']).'</td>'.
				 '<td>'.$changed_by['fullname'].'</td>'.
				 '<td>'.$log_ticket['changes'].'</td></tr>';
		}
	?>
	</table>
	</fieldset>	
	</div>
	<br/><br/>
	<button type="button" onclick="printElem()">CETAK</button>

	<script type="text/javascript">
		
		function printElem() {
		    var content = document.getElementById('contentprint').innerHTML;
		    var mywindow = window.open('', 'Print', 'height=600,width=800');

		    mywindow.document.write('<html><head><title>Print</title>');
		    mywindow.document.write('</head><body >');
		    mywindow.document.write(content);
		    mywindow.document.write('</body></html>');

		    mywindow.document.close();
		    mywindow.focus()
		    mywindow.print();
		    mywindow.close();
		    return true;
		}
	</script>
</body>
</html>