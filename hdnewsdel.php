<?php 
require 'core/init.php';
$general->logged_out_protect();

$id=$_GET['id'];
$hdnews->delete($id);
header('Location: hdnews.php');
?>