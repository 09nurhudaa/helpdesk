<?php 
class HDNews{
	private $db;
	public function __construct($database)
	{   $this->db = $database; }	
	public function add_news($newsdate,$title,$detail,$createdby,$createdon,$expired)
	{ 	$query 	= $this->db->prepare("INSERT INTO `news` (`newsdate`,`title`, `detail`, `createdby`, `createdon`, `expired`) VALUES (?, ?, ?, ?, ?, ?)");
	 	$query->bindValue(1, $newsdate);
		$query->bindValue(2, $title);
		$query->bindValue(3, $detail);
		$query->bindValue(4, $createdby);
		$query->bindValue(5, $createdon);
		$query->bindValue(6, $expired);
	 	try{
			$query->execute();
	 	}catch(PDOException $e){
			die($e->getMessage());
		}
	}
	public function update_news($id,$newsdate,$title,$detail,$createdby,$createdon,$expired)
	{ 	$query 	= $this->db->prepare("UPDATE `news` SET `newsdate` = ? , `title` = ? ,`detail` = ? , `createdby` = ? , `createdon` = ? , `expired` = ? WHERE `id` = ?");
		$query->bindValue(1, $newsdate);
		$query->bindValue(2, $title);
		$query->bindValue(3, $detail);
		$query->bindValue(4, $createdby);
		$query->bindValue(5, $createdon);
		$query->bindValue(6, $expired);
		$query->bindValue(7, $id);
	 	try{
			$query->execute();
		}
		catch(PDOException $e){
			die($e->getMessage());
		}
	}
	public function delete($id){
		$sql="DELETE FROM `news` WHERE `id` = ?";
		$query = $this->db->prepare($sql);
		$query->bindValue(1, $id);
		try{
			$query->execute();
		}
		catch(PDOException $e){
			die($e->getMessage());
		}
	}	
	
	public function news_data($id)
	{	$query = $this->db->prepare("SELECT * FROM `news` WHERE `id`= ?");
		$query->bindValue(1, $id);
		try{
			$query->execute();
			return $query->fetch();
		} catch(PDOException $e){
			die($e->getMessage());
		}
	} 
	public function get_news()
	{	$query = $this->db->prepare("SELECT * FROM `news` ORDER BY `newsdate` ASC");
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll();
	}	
	public function get_headline_news()
	{	$query = $this->db->prepare("SELECT * FROM `news` WHERE UNIX_TIMESTAMP( curdate( ) ) < `expired` ORDER BY `newsdate` ASC");
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll();
	}	
}