<?php
require '../core/init.php';
$general->logged_out_protect();
//$user = $users->userdata($_SESSION['id']);
//if($user['level'] != "Admin")
//{ 	exit("You don't have permission to access this page!"); }
$tickets 		= $tickets->get_tickets();
$json='[';
foreach ($tickets as $ticket) 
{	$customer=$customers->customer_data($ticket['idcustomer']);	
	$userassignee = $users->userdata($ticket['assignee']);
	$json.='{"Problem": "'. $ticket['problemsummary'] . '",'.
	'"Company": "'.$customer['namacustomer']. '",'.
	'"Assignee": "'.$userassignee['fullname']. '",'.
	'"reported date": "'.date('d-M-Y',$ticket['reporteddate']). '",'.
	'"Status": "'.$ticket['ticketstatus']. '"},';
}
echo substr($json, 0, -1).']';

