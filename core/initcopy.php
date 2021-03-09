<?php 
ob_start(); // Added to avoid a common error of 'header already sent'
session_start();
require_once 'connect/database.php';
require_once 'classes/general.php';
require_once 'classes/users.php';
require_once 'classes/customers.php';
require_once 'classes/projects.php';
require_once 'classes/tickets.php';
require_once 'classes/news.php';
require_once 'classes/sla.php';
require_once 'classes/emails.php';

$general 	= new General();
$users 		= new Users($db);
$customers 	= new Customers($db);
$projects 	= new Projects($db);
$tickets 	= new Tickets($db);
$hdnews		= new HDNews($db);
$slas		= new SLA($db);
$emails		= new Emails($db);

$errors = array();
?>