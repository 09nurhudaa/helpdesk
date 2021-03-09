<?php 
class SLA{
	private $db;
	public function __construct($database)
	{   $this->db = $database; }	
	public function sla_exists($slaid) 
	{	$query = $this->db->prepare("SELECT COUNT(`slaid`) FROM `sla` WHERE `slaid`= ?");
		$query->bindValue(1, $slaid);
		try
		{	$query->execute();
			$rows = $query->fetchColumn();
			if($rows == 1){
				return true;
			}else{
				return false;
			}
		} catch (PDOException $e){
			die($e->getMessage());
		}
	}
	public function add_sla($slaid,$namasla,$responsetime,$resolutiontime,$slawarning)
	{	$querystring = "INSERT INTO `sla` (`slaid`,`namasla`,`responsetime`, `resolutiontime`, `slawarning`) VALUES (?, ?, ?, ?, ?)";
		$query 	= $this->db->prepare($querystring);
	 	$query->bindValue(1, $slaid);
		$query->bindValue(2, $namasla);
		$query->bindValue(3, $responsetime);
		$query->bindValue(4, $resolutiontime);
		$query->bindValue(5, $slawarning);
	 	try{
			$query->execute();
	 	}catch(PDOException $e){
			die($e->getMessage());
		}
	}
	public function update_sla($slaid,$namasla,$responsetime,$resolutiontime,$slawarning)
	{	$querystring = "UPDATE `sla` SET `namasla` = ? , `responsetime` = ? , `resolutiontime` = ?, `slawarning` = ?  WHERE `slaid` = ?";
		$query 	= $this->db->prepare($querystring);
	 	$query->bindValue(1, $namasla);
		$query->bindValue(2, $responsetime);
		$query->bindValue(3, $resolutiontime);
		$query->bindValue(4, $slawarning);
		$query->bindValue(5, $slaid);
	 	try{
			$query->execute();
		}
		catch(PDOException $e){
			die($e->getMessage());
		}
	
	}
	public function delete($id){
		$sql="DELETE FROM `sla` WHERE `slaid` = ?";
		$query = $this->db->prepare($sql);
		$query->bindValue(1, $id);
		try{
			$query->execute();
		}
		catch(PDOException $e){
			die($e->getMessage());
		}
	}
	public function sla_data($slaid)
	{	$query = $this->db->prepare("SELECT * FROM `sla` WHERE `slaid`= ?");
		$query->bindValue(1, $slaid);
		try{
			$query->execute();
			return $query->fetch();
		} catch(PDOException $e){
			die($e->getMessage());
		}
	} 
	public function get_sla()
	{	$query = $this->db->prepare("SELECT * FROM `sla` ORDER BY `slaid` ASC");
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll();
	}
}