<?php 
require 'core/init.php';
$general->logged_out_protect();
$id=$_GET['id'];
$projects->delete($id);
header('location: projectlist.php');
?>