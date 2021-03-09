<?php 
require 'core/init.php';
$general->logged_out_protect();
$user = $users->userdata($_SESSION['loginid']);
if($user['level'] != "Admin")
{ 	exit("You don't have permission to access this page!"); }
$projects 		= $projects->get_projects();
$projects_count = count($projects);
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Project List</title>
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
		var msg = confirm('Are you sure to delete this user?');
		if(msg == false) {
			return false;
		}
	}
	</script>

</head>
<body>
	<hr/>
	<h1>Project Info</h1>
	<p>Number of registered projects: <strong><?php echo $projects_count; ?></strong> </p>
	<p><button onclick="window.location='projectadd.php';">Add New Project</button></p>
	<table id="datatables" class="display">
    <thead>
        <tr>
            <th>Project ID</th>
			<th>Customer</th>
            <th>Delivery Begin</th>
            <th>Delivery End</th>
			<th>Install Begin</th>
            <th>Install End</th>
			<th>UAT Begin</th>
			<th>UAT End</th>
			<th>Bill Start Date</th>
			<th>Bill Due Date</th>
			<th>Warranty Period</th>
			<th>Contract Start Date</th>
			<th>Contract Period</th>			
			<th><img src="images/delete.png" alt="Delete" width="20px" height="20px" align="middle" title="Delete Record"></th>
        </tr>
    </thead>
    <tbody>
		<?php 
		foreach ($projects as $project) {
			$customer=$customers->customer_data($project['idcustomer']);
			$disp_id_project=sprintf("%04s", $project['projectid']);
			echo '<tr><td><a href=projectedit.php?id='.$project['projectid']. '>'.$disp_id_project.'</a></td>'.
				 '<td>'.$customer['namacustomer'].'</td>'.
				 '<td>'.date('d-M-Y',$project['deliverybegin']).'</td>'.
				 '<td>'.date('d-M-Y',$project['deliveryend']).'</td>'.
				 '<td>'.date('d-M-Y',$project['installbegin']).'</td>'.
				 '<td>'.date('d-M-Y',$project['installend']).'</td>'.
				 '<td>'.date('d-M-Y',$project['uatbegin']).'</td>'.
				 '<td>'.date('d-M-Y',$project['uatend']).'</td>'.
				 '<td>'.date('d-M-Y',$project['billstartdate']).'</td>'.
				 '<td>'.date('d-M-Y',$project['billduedate']).'</td>'.
				 '<td>'.$project['warrantyperiod'].' Year</td>'.
				 '<td>'.date('d-M-Y',$project['contractstartdate']).'</td>'.
				 '<td>'.$project['contractperiod'].' Month</td>'.
				 '<td><a href=projectdel.php?id='.$project['projectid']. ' onclick="return delete_confirm();">del</a></td></tr>';
		}
		?>
    </tbody>
	</table>
	<p>&nbsp;</p>
</body>
</html>