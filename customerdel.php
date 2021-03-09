<?php 
require 'core/init.php';
$general->logged_out_protect();
$id=$_GET['id'];
$customers->delete($id);
header('Location: customerlist.php');
?>