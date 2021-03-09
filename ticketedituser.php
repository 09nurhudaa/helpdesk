<?php 
require 'core/init.php';
$general->logged_out_protect();
$changeby = $_SESSION['loginid'];
$user 	= $users->userdata($_SESSION['loginid']);
$id		= $_GET['id'];
$ticket	= $tickets->ticket_data($id);
if ($ticket['ticketstatus']=="Closed")
{	header("Location: ticketread.php?id=$id");
	exit();
}
if (isset($_POST['submit']))
{	$sla 			= $_POST['sla'];
	$reporteddate 	= $_POST['reporteddate'];
	$reportedmonth 	= $_POST['reportedmonth'];
	$reportedyear 	= $_POST['reportedyear'];
	$datetimeStr 	= $reportedyear.'-'.$reportedmonth.'-'.$reporteddate;
	$reporteddate 	= strtotime($datetimeStr);
	
	$reportedby		= $_POST['reportedby'];
	$telp 			= $_POST['telp'];
	$email 			= $_POST['email'];
	$problemsummary	= $_POST['problemsummary'];
	$problemdetail	= $_POST['problemdetail'];
	$assignee		= $_POST['idassignee'];
	$ticketstatus	= $_POST['ticketstatus'];
	$resolution		= $_POST['resolution'];
	$pendingby		= $_POST['pendingby'];
	$pendingdate 	= $_POST['pendingdate'];
	$resolvedby		= $_POST['resolvedby'];
	$resolveddate 	= $_POST['resolveddate'];
	$closedby		= $_POST['closedby'];
	$closeddate		= $_POST['closeddate'];
	$changes		= "Re-assigned the ticket.";
	if ($ticketstatus=="Pending")
	{	$pendingby		= $user['username'];
		$pendingdate 	= strtotime(now);
		$changes		= "Change Status to Pending.";
	}
	if ($ticketstatus=="Resolved")
	{	$resolvedby		= $user['username'];
		$resolveddate 	= strtotime(now);
		$changes		= "Change Status to Resolved.";
	}
	if ($ticketstatus=="Closed")
	{	$closedby		= $user['username'];
		$closeddate		= strtotime(now);
		$changes		= "Change Status to Closed.";
	}
	$tickets->update_ticket($id,$sla,$reporteddate,$reportedby,$telp,$email,$problemsummary,$problemdetail,$ticketstatus,$assignee,$assigneddate,$pendingby, $pendingdate, $resolution,$resolvedby,$resolveddate,$closedby,$closeddate);
	$tickets->log_tickets($id,$sla,$reporteddate,$reportedby,$telp,$email,$problemsummary,$problemdetail,$ticketstatus,$assignee,$assigneddate,$pendingby, $pendingdate, $resolution,$resolvedby,$resolveddate,$closedby,$closeddate,$changes,$changeby);
	header('Location: ticketlistuser.php');
}
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
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript">
	function cekData()
	{	if (ticketform.resolution.value == "")
		{	alert("Resolution must be filled!");
			ticketform.resolution.focus();
			return false;
		}
		if (ticketform.ticketstatus.value == "Closed")
		{	if(ticketform.oldticketstatus.value != "Resolved")
			{	alert("You must set status to resolved before closed!");
				ticketform.ticketstatus.focus();
				return false;
			}
		}
		else
			return true;
	}
	</script>
</head>
<body>	
	<hr/>
	<form name="ticketform" method="post" action="" onsubmit="return cekData();">
	<fieldset style="display: inline-block;">
	<?php echo '<legend> Ticket No: '.$ticket['ticketnumber'].'</legend>'; ?>
	<div class="breadcrumb">*) Field Required</div> 
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
			<input type="hidden" size='20' name='ticketnumber' value="<?php echo $ticket['ticketnumber']; ?>">
			</td>
		</tr>
		<tr>
			<td> Reported Date</td><td> : </td>
			<td><?php echo date('d-M-Y H:i',$ticket['reporteddate']); ?>
			<input type="hidden" name="reporteddate" value="<?php echo $ticket['reporteddate']; ?>"></td>
		</tr>
		<tr>
			<td> Reported By </td><td> : </td>
			<td><?php echo $ticket['reportedby']; ?>
			<input type='hidden' name="reportedby" value="<?php echo $ticket['reportedby']; ?>"> </td>
		</tr>
		<tr>
			<td> Urgency (SLA)</td><td> : </td>
			<td><?php $sladata = $slas->sla_data($ticket['sla']); echo $sladata['namasla'];?>
				<input type='hidden' name='sla' value="<?php echo $ticket['sla']; ?>"> </td>
				
		</tr>
		<tr>
			<td> Problem Summary </td><td> : </td>
			<td> <?php echo $ticket['problemsummary']; ?>
			<input type="hidden" name="problemsummary" value="<?php echo $ticket['problemsummary']; ?>"> </td>
		</tr>
		<tr valign="top">
			<td> Problem Detail </td><td> : </td>
			<td> <?php echo nl2br($ticket['problemdetail']); ?> </td>
		</tr>
		<tr>
			<td> Telephone </td><td> : </td>
			<td> <?php echo $ticket['telp']; ?>
			<input type='hidden' name='telp' value='<?php echo $ticket['telp']; ?>'> </td>
		</tr>
		<tr>
			<td> Email </td><td> : </td>
			<td> <?php echo $ticket['email']; ?>
			<input type='hidden' name='email' value='<?php echo $ticket['email']; ?>'> </td>
		</tr>
	</table>
	<br/>
	<table class="formtable">
		<tr>
			<td width="120"> Assign to </td><td> : </td>
			<td> <?php $userassignee = $users->userdata($ticket['assignee']); echo $userassignee['fullname']; ?>
			<input type='hidden' name='idassignee' value='<?php echo $ticket['assignee']; ?>'> </td>
		</tr>
		<tr>
			<td> Status* </td><td> : </td>
			<td> <input type="hidden" name="oldticketstatus" value="<?php echo $ticket['ticketstatus']; ?>"> 
			<select name="ticketstatus">
				<?php
					echo '<option value=' . $ticket['ticketstatus']. ' selected="selected">'.  $ticket['ticketstatus'] . '</option>';
				?>
				<option value="Assigned"> Assigned </option>
				<option value="Resolved"> Resolved </option>
				<option value="Pending"> Pending </option>
				<option value="Closed"> Closed </option>
			</select> 
			</td>
		</tr>
		<tr valign="top">
			<td> Resolution* </td><td> : </td>
			<td> <textarea name="resolution" rows="3" cols="38"><?php echo $ticket['resolution']; ?></textarea> </td>
		</tr>
		<tr>
			<td> </td><td> </td>
			<td> <input type="hidden" name="pendingby" value="<?php echo $ticket['pendingby']; ?>"> 
				 <input type="hidden" name="pendingdate" value="<?php echo $ticket['pendingdate']; ?>"> 
				 <input type="hidden" name="resolvedby" value="<?php echo $ticket['resolvedby']; ?>"> 
				 <input type="hidden" name="resolveddate" value="<?php echo $ticket['resolveddate']; ?>"> 
				 <input type="hidden" name="closedby" value="<?php echo $ticket['closedby']; ?>"> 
				 <input type="hidden" name="closeddate" value="<?php echo $ticket['closeddate']; ?>"> 
			</td>
		</tr>
		<tr>
			<td> </td> <td> </td>
			<td> 
				<input type='submit' name='submit' value=' Submit '>  &nbsp;&nbsp;&nbsp;
				<input type='reset' name='reset' value=' Reset '> 
			</td>
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
	<br/><br/>
</body>
</html>