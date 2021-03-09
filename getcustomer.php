<?php 
require 'core/init.php';
$general->logged_out_protect();
$id_cust = $_GET['idcustomer'];
$customer=$customers->customer_data($id_cust);
$project=$projects->get_project_customer($id_cust);
$warrantyperiod=$project['warrantyperiod'];
$warrantystartdate=date('d-M-Y',$project['uatend']); //tanggal selesai UAT dihitung sebagai awal masa garansi
$warrantyenddate=date('d-M-Y', strtotime($warrantystartdate . " + " . $warrantyperiod . " years"));
$contractperiod=$project['contractperiod'];
$contractstartdate=date('d-M-Y',$project['contractstartdate']);
$contractenddate=date('d-M-Y', strtotime($contractstartdate . " + " . $contractperiod . " months"));
if($warrantyperiod=="")
{	$warrantyperiod=0;$warrantystartdate=0;$warrantyenddate=0;}
if($contractperiod=="")
{	$contractperiod=0;$contractstartdate=0;$contractenddate=0;}
$data_customer=array
(	'customerproduct'=>$customer['customerproduct'],
	'warrantyperiod'=>$warrantyperiod,
	'warrantystartdate'=>$warrantystartdate,
	'warrantyenddate'=>$warrantyenddate,
	'contractperiod'=>$contractperiod,
	'contractstartdate'=>$contractstartdate,
	'contractenddate'=>$contractenddate
);
echo json_encode($data_customer);

?>