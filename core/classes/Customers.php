<?php 
class Customers{
	private $db;
	public function __construct($database)
	{   $this->db = $database; }	
	public function customer_exists($customername) 
	{	$query = $this->db->prepare("SELECT COUNT(`id`) FROM `customers` WHERE `customername`= ?");
		$query->bindValue(1, $customername);
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

	public function email_exists($email)
	{	$query = $this->db->prepare("SELECT COUNT(`id`) FROM `customers` WHERE `email`= ?");
		$query->bindValue(1, $email);
		try{
			$query->execute();
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
	public function add_customer($namacustomer,$alamat,$Telp,$email,$PIC,$selesperson,$customerproduct)
	{	$time 		= time();
		$ip 		= $_SERVER['REMOTE_ADDR'];
	 	$query 	= $this->db->prepare("INSERT INTO `customers` (`namacustomer`, `alamat`, `Telp`, `email`, `PIC`,`selesperson`, `customerproduct`, `time`, `ip`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$query->bindValue(1, $namacustomer);
		$query->bindValue(2, $alamat);
		$query->bindValue(3, $Telp);
		$query->bindValue(4, $email);
		$query->bindValue(5, $PIC);
		$query->bindValue(6, $selesperson);
		$query->bindValue(7, $customerproduct);
		$query->bindValue(8, $time);
		$query->bindValue(9, $ip);
	 	try{
			$query->execute();
	 	}catch(PDOException $e){
			die($e->getMessage());
		}
	}
	public function update_customer($idcustomer,$namacustomer,$alamat,$Telp,$email,$PIC,$selesperson,$customerproduct)
	{	$time 		= time();
		$ip 		= $_SERVER['REMOTE_ADDR'];
	 	$query 	= $this->db->prepare("UPDATE `customers` SET `namacustomer` = ? , `alamat` = ? , `Telp` = ? , `email` = ? , `PIC` = ? , `selesperson` = ? ,`customerproduct` = ? ,`ip` = ? , `time` = ? WHERE `idcustomer` = ?");
		$query->bindValue(1, $namacustomer);
		$query->bindValue(2, $alamat);
		$query->bindValue(3, $Telp);
		$query->bindValue(4, $email);
		$query->bindValue(5, $PIC);
		$query->bindValue(6, $selesperson);
		$query->bindValue(7, $customerproduct);
		$query->bindValue(8, $ip);
		$query->bindValue(9, $time);
		$query->bindValue(10, $idcustomer);
	 	try{
			$query->execute();
		}
		catch(PDOException $e){
			die($e->getMessage());
		}
	}
	public function delete($id){
		$sql="DELETE FROM `customers` WHERE `idcustomer` = ?";
		$query = $this->db->prepare($sql);
		$query->bindValue(1, $id);
		try{
			$query->execute();
		}
		catch(PDOException $e){
			die($e->getMessage());
		}
	}	
	
	public function activate($email, $email_code)
	{	$query = $this->db->prepare("SELECT COUNT(`id`) FROM `customers` WHERE `email` = ? AND `email_code` = ? AND `confirmed` = ?");
		$query->bindValue(1, $email);
		$query->bindValue(2, $email_code);
		$query->bindValue(3, 0);
		try{
			$query->execute();
			$rows = $query->fetchColumn();
			if($rows == 1){
				$query_2 = $this->db->prepare("UPDATE `customers` SET `confirmed` = ? WHERE `email` = ?");
				$query_2->bindValue(1, 1);
				$query_2->bindValue(2, $email);				
				$query_2->execute();
				return true;
			}else{
				return false;
			}
		} catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function email_confirmed($username)
	{	$query = $this->db->prepare("SELECT COUNT(`id`) FROM `customers` WHERE `username`= ? AND `confirmed` = ?");
		$query->bindValue(1, $username);
		$query->bindValue(2, 1);
		try{
			$query->execute();
			$rows = $query->fetchColumn();
			if($rows == 1){
				return true;
			}else{
				return false;
			}
		} catch(PDOException $e){
			die($e->getMessage());
		}
	}
	public function login_customer($username, $password)
	{	$query = $this->db->prepare("SELECT `email`, `ticket_id` FROM `customers` WHERE `email` = ?");
		$query->bindValue(1, $username);
		try{
			$query->execute();
			$data 				= $query->fetch();
			$stored_password 	= $data['password'];
			$id   				= $data['id'];
			if($stored_password === sha1($password)){
				return $id;	
			}else{
				return false;	
			}
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}
	public function customer_data($id)
	{	$query = $this->db->prepare("SELECT * FROM `customers` WHERE `idcustomer`= ?");
		$query->bindValue(1, $id);
		try{
			$query->execute();
			return $query->fetch();
		} catch(PDOException $e){
			die($e->getMessage());
		}
	} 
	public function get_customers()
	{	$query = $this->db->prepare("SELECT * FROM `customers` ORDER BY `namacustomer` ASC");
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll();
	}	
}