<?php 
date_default_timezone_set('Asia/Jakarta');
require 'core/init.php';
$general->logged_out_protect();
$user = $users->userdata($_SESSION['loginid']);
if($user['level'] != "Admin")
{ 	exit("You don't have permission to access this page!"); }
if (isset($_POST['submit']))
{	echo 'Sending email queue... Please wait!';	
	header('Location: emailqueue.php?success');	
}
$logs 			  = $emails->get_email_queue();
$emailqueue_count = count($logs);
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Email Queue</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<style type="text/css">
		body{background-image:url('images/corner.jpg');background-repeat:no-repeat;background-attachment:fixed;}
		.breadcrumb{font-size:12px;color:#0000A0;font-family: Arial, Helvetica, sans-serif;}
		.textmsg {font-size:10pt;color:#ff0000;text-align:left;}
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
	<h1>Email Queue</h1>
	<form name="emailqueueform" method="post" action="">
	<p>Number of email not sent yet: <strong><?php echo $emailqueue_count; ?></strong> </p>
	<p><input type="submit" name='submit' value="Send Email Queue Now" /> 
	</form>
	<span class="textmsg">
	<?php 
		if (isset($_GET['process']) && empty($_GET['process']))
		{echo 'Sending email queue... Please wait!';}
		if (isset($_GET['success']) && empty($_GET['success']))
		{echo 'Sending email queue is done!';}
	?></span>
	</p>
	<table id="datatables" class="display">
    <thead>
        <tr>
            <th>Send Date</th>
			<th>To</th>
           <!--  <th>CC</th> -->
			<th>Subject</th>
			<th>Status</th>
        </tr>
    </thead>
    <tbody>
		<?php 
		foreach ($logs as $log)
		{	$idemail = $log['idemail'];
			echo '<tr><td><a href="emailsend.php?id='.$idemail.'">'.date('d-M-Y H:i', $log['senddate']).'</a></td>'.
				 '<td>'.$log['emailto'].'</td>'.
				 // '<td>'.$log['emailcc'].'</td>'.
				 '<td>'.$log['emailsubject'].'</td>'.
				 '<td>'.$log['emailstatus'].'</td></tr>';
		}
		?>
    </tbody>
	</table>
</body>
</html>