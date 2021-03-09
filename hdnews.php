<?php 
require 'core/init.php';
$general->logged_out_protect();
$user = $users->userdata($_SESSION['loginid']);
if($user['level'] != "Admin")
{ 	exit("You don't have permission to access this page!"); }
$news 		= $hdnews->get_news();
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Helpdesk News</title>
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
		var msg = confirm('Are you sure to delete this news?');
		if(msg == false) {
			return false;
		}
	}
	</script>

</head>
<body>
	<hr/>
	<h1>Helpdesk News</h1>
	<p><button onclick="window.location='hdnewsadd.php';">Add News</button></p>
	<table id="datatables" class="display">
    <thead>
        <tr>
			<th>News Date</th>
			<th>Headline News</th>
            <th>Created By</th>
            <th>Created on</th>
			<th>News Expired</th>
			<th><img src="images/delete.png" alt="Delete" width="20px" height="20px" align="middle" title="Delete Record"></th>
        </tr>
    </thead>
    <tbody>
		<?php 
		foreach ($news as $thenews)
		{
			echo '<td>'.date('d-M-Y',$thenews['newsdate']).'</td>'.
				 '<td>'.'<a href=hdnewsedit.php?id='.$thenews['id']. '>'.$thenews['title'].'</td>'.
				 '<td>'.$thenews['createdby'].'</td>'.
				 '<td>'.date('d-M-Y',$thenews['createdon']).'</td>'.
				 '<td>'.date('d-M-Y',$thenews['expired']).'</td>'.
				 '<td><a href=hdnewsdel.php?id='.$thenews['id']. ' onclick="return delete_confirm();">del</a></td></tr>';
		}
		?>
    </tbody>
	</table>
	<p>&nbsp;</p>
</body>
</html>