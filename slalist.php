<?php 
require 'core/init.php';
$general->logged_out_protect();
$user = $users->userdata($_SESSION['loginid']);
if($user['level'] != "Admin")
{ 	exit("You don't have permission to access this page!"); }
$sla 		= $slas->get_sla();
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>SLA Setting</title>
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
			"sScrollY": "300px",
			"sScrollX": "100%",
			"bScrollCollapse": true,
			"bPaginate": false,
			"bJQueryUI": true
		});			
	})
	function delete_confirm(link) {
		var msg = confirm('Are you sure to delete this sla?');
		if(msg == false) {
			return false;
		}
	}
	</script>

</head>
<body>
	<hr/>
	<h1>SLA Setting</h1>
	<p><button onclick="window.location='slaadd.php';">Add New SLA</button></p>
	<div style="width:700px">
	<table id="datatables" class="display">
    <thead>
        <tr>
            <th>SLA Level</th>
			<th>SLA</th>
			<th>Response Time</th>
            <th>Resolution Time</th>
			<th>SLA Warning Time</th>			
			<th><img src="images/delete.png" alt="Delete" width="20px" height="20px" align="middle" title="Delete Record"></th>
        </tr>
    </thead>
    <tbody>
		<?php 
		foreach ($sla as $slaval) {
			echo '<tr><td>'.$slaval['slaid'].'</td>'.
				 '<td><a href=slaedit.php?id='.$slaval['slaid']. '>'.$slaval['namasla'].'</a></td>'.
				 '<td>'.$slaval['responsetime'].' Hours</td>'.
				 '<td>'.$slaval['resolutiontime'].' Hours</td>'.
				 '<td>'.$slaval['slawarning'].' Hours</td>'.
				 '<td><a href=sladel.php?id='.$slaval['slaid']. ' onclick="return delete_confirm();">del</a></td></tr>';
		}
		?>
    </tbody>
	</table>
	</div>
	<p>&nbsp;</p>
</body>
</html>