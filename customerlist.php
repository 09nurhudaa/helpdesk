<?php 
require 'core/init.php';
$general->logged_out_protect();
$user = $users->userdata($_SESSION['loginid']);
if($user['level'] != "Admin")
{ 	exit("You don't have permission to access this page!"); }

$members 		= $customers->get_customers();
$member_count 	= count($members);
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Customer List</title>
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
		var msg = confirm('Are you sure to delete this customer?');
		if(msg == false) {
			return false;
		}
	}
	</script>

</head>
<body>
	<hr/>
	<h1>Customer List</h1>
	<p>Number of registered customer: <strong><?php echo $member_count; ?></strong> </p>
	<p><button onclick="window.location='customeradd.php';">Add New Customer</button></p>
	<table id="datatables" class="display">
    <thead>
        <tr>
            <th>ID Customer</th>
			<th>Nama Customer</th>
            <th>Alamat</th>
            <th>Telepon</th>
			<th>PIC</th>
            <th>Sales Person</th>
			<th>Customer Product</th>
			<th><img src="images/delete.png" alt="Delete" width="20px" height="20px" align="middle" title="Delete Record"></th>
        </tr>
    </thead>
    <tbody>
		<?php 
		foreach ($members as $member)
		{	if (@$member['confirmed']=='1')
			{$locked='No';}
			else
			{$locked='Yes';}
			$disp_id_customer=sprintf("%04s", $member['idcustomer']);
			echo '<tr><td><a href=customeredit.php?id='.$member['idcustomer']. '>'.$disp_id_customer.'</a></td>'.
				 '<td>'.$member['namacustomer'].'</td>'.
				 '<td>'.$member['alamat'].'</td>'.
				 '<td>'.$member['Telp'].'</td>'.
				 '<td>'.$member['PIC'].'</td>'.
				 '<td>'.$member['selesperson'].'</td>'.
				 '<td>'.$member['customerproduct'].'</td>'.
				 '<td><a href=customerdel.php?id='.$member['idcustomer']. ' onclick="return delete_confirm();">del</a></td></tr>';
		}
		?>
    </tbody>
	</table>
	<p>&nbsp;</p>
</body>
</html>