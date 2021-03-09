<?php 
require 'core/init.php';
$general->logged_out_protect();
$id=$_GET['id'];
$tickets->delete($id);
header('Location: ticketlist.php');
?>