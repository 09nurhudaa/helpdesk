<?php 
require 'core/init.php';
$general->logged_out_protect();
$id=$_GET['id'];
$slas->delete($id);
header('Location: slalist.php');
?>