<?php 
class Projects{
	private $db;
	public function __construct($database)
	{   $this->db = $database; }	
	public function project_exists($projectid) 
	{	$query = $this->db->prepare("SELECT COUNT(`id`) FROM `projects` WHERE `projectid`= ?");
		$query->bindValue(1, $projectid);
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
	public function add_project($projectname,$idcustomer,$deliverybegin,$deliveryend,$installbegin,$installend,$uatbegin,$uatend,$billstartdate,$billduedate,$warrantyperiod,$contractstartdate,$contractperiod)
	{	$querystring = "INSERT INTO `projects` (`projectname`,`idcustomer`, `deliverybegin`, `deliveryend`, `installbegin`, `installend`,`uatbegin`,`uatend`,`billstartdate`, `billduedate`, `warrantyperiod`, `contractstartdate`, `contractperiod`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$query 	= $this->db->prepare($querystring);
		$query->bindValue(1, $projectname);
		$query->bindValue(2, $idcustomer);
		$query->bindValue(3, $deliverybegin);
		$query->bindValue(4, $deliveryend);
		$query->bindValue(5, $installbegin);
		$query->bindValue(6, $installend);
		$query->bindValue(7, $uatbegin);
		$query->bindValue(8, $uatend);
		$query->bindValue(9, $billstartdate);
		$query->bindValue(10, $billduedate);
		$query->bindValue(11, $warrantyperiod);
		$query->bindValue(12, $contractstartdate);
		$query->bindValue(13, $contractperiod);
	 	try{
			$query->execute();
	 	}catch(PDOException $e){
			die($e->getMessage());
		}
	}
	public function update_project ($projectid,$projectname,$idcustomer,$deliverybegin,$deliveryend,$installbegin,$installend,$uatbegin,$uatend,$billstartdate,$billduedate,$warrantyperiod,$contractstartdate,$contractperiod)
	{	$querystring = "UPDATE `projects` SET `projectname` = ? , `idcustomer` = ? , `deliverybegin` = ? , `deliveryend` = ? , `installbegin` = ? ,`installend` = ? , `uatbegin` = ? , `uatend` = ? ,`billstartdate` = ?, `billduedate` = ? , `warrantyperiod` = ? ,`contractstartdate` = ?,`contractperiod` = ? WHERE `projectid` = ?";
		$query 	= $this->db->prepare($querystring);
	 	$query->bindValue(1, $projectname);
		$query->bindValue(2, $idcustomer);
		$query->bindValue(3, $deliverybegin);
		$query->bindValue(4, $deliveryend);
		$query->bindValue(5, $installbegin);
		$query->bindValue(6, $installend);
		$query->bindValue(7, $uatbegin);
		$query->bindValue(8, $uatend);
		$query->bindValue(9, $billstartdate);
		$query->bindValue(10, $billduedate);
		$query->bindValue(11, $warrantyperiod);
		$query->bindValue(12, $contractstartdate);
		$query->bindValue(13, $contractperiod);	
		$query->bindValue(14, $projectid);
	 	try{
			$query->execute();
		}
		catch(PDOException $e){
			die($e->getMessage());
		}
	
	}
	public function delete($id){
		$sql="DELETE FROM `projects` WHERE `projectid` = ?";
		$query = $this->db->prepare($sql);
		$query->bindValue(1, $id);
		try{
			$query->execute();
		}
		catch(PDOException $e){
			die($e->getMessage());
		}
	}	
	public function project_data($id)
	{	$query = $this->db->prepare("SELECT * FROM `projects` WHERE `projectid`= ?");
		$query->bindValue(1, $id);
		try{
			$query->execute();
			return $query->fetch();
		} catch(PDOException $e){
			die($e->getMessage());
		}
	} 
	public function get_projects()
	{	$query = $this->db->prepare("SELECT * FROM `projects` ORDER BY `projectid` DESC");
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll();
	}
	public function get_project_customer($id) //get project_data by idcustomer
	{	$query = $this->db->prepare("SELECT * FROM `projects` WHERE `idcustomer`= ? ORDER BY `contractstartdate` DESC LIMIT 1");
		$query->bindValue(1, $id);
		try{
			$query->execute();
			return $query->fetch();
		} catch(PDOException $e){
			die($e->getMessage());
		}
	} 
}