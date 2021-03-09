<?php 
class Reports{
	private $db;
	public function __construct($database)
	{   $this->db = $database; }	
	
	public function data_report($idreport)
	{	$query = $this->db->prepare("SELECT * FROM `tickets` WHERE `slaid`= ?");
		$query->bindValue(1, $slaid);
		try{
			$query->execute();
			return $query->fetch();
		} catch(PDOException $e){
			die($e->getMessage());
		}
	} 
	
	public function data_report_002()
	{	$query = $this->db->prepare("SELECT * FROM `sla` ORDER BY `slaid` ASC");
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll();
	}

}