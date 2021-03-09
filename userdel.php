<?php 
require 'core/init.php';
$general->logged_out_protect();
$id=$_GET['id'];
$users->delete($id);
header('Location: userlist.php');
?>