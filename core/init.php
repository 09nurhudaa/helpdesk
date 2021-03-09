<?php 
ob_start(); // Added to avoid a common error of 'header already sent'
session_start();
require_once 'connect/database.php';
function my_autoload($class)
{   $filename = 'classes/'.$class.'.php';
	include_once $filename;
}
spl_autoload_register('my_autoload');
try {
	$general 	= new General();
	$users 		= new Users($db);
	$customers 	= new Customers($db);
	$projects 	= new Projects($db);
	$tickets 	= new Tickets($db);
	$hdnews		= new HDNews($db);
	$slas		= new SLA($db);
	$emails		= new Emails($db);
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}
?>