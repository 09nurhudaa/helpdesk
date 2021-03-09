<?php 
class Users{
	private $db;
	public function __construct($database)
	{   $this->db = $database; }	
	public function user_exists($username) 
	{	$query = $this->db->prepare("SELECT COUNT(`id`) FROM `users` WHERE `username`= ?");
		$query->bindValue(1, $username);
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
	{	$query = $this->db->prepare("SELECT COUNT(`id`) FROM `users` WHERE `email`= ?");
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
	public function register($username,$password,$email,$fullname,$Telp,$level,$locked)
	{	$time 		= time();
		$ip 		= $_SERVER['REMOTE_ADDR'];
		$email_code = sha1($username + microtime());
		$password   = sha1($password);
	 	$query 	= $this->db->prepare("INSERT INTO `users` (`username`,`level`, `password`, `fullname`, `email`, `Telp`,`ip`, `time`, `email_code`, `confirmed`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,?)");
	 	$query->bindValue(1, $username);
		$query->bindValue(2, $level);
		$query->bindValue(3, $password);
		$query->bindValue(4, $fullname);
		$query->bindValue(5, $email);
		$query->bindValue(6, $Telp);
		$query->bindValue(7, $ip);
		$query->bindValue(8, $time);
		$query->bindValue(9, $email_code);
		$query->bindValue(10, 1);
	 	try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}
	public function update($id,$username,$password,$email,$fullname,$Telp,$level,$locked)
	{	$time 		= time();
		$ip 		= $_SERVER['REMOTE_ADDR'];
		$email_code = sha1($username + microtime());
		$password   = sha1($password);
	 	$query 	= $this->db->prepare("UPDATE `users` SET `level` = ? , `password` = ? , `fullname` = ? , `email` = ? , `Telp` = ? ,`ip` = ? , `time` = ? , `email_code` = ? ,`confirmed` = ? WHERE `id` = ?");
		$query->bindValue(1, $level);
		$query->bindValue(2, $password);
		$query->bindValue(3, $fullname);
		$query->bindValue(4, $email);
		$query->bindValue(5, $Telp);
		$query->bindValue(6, $ip);
		$query->bindValue(7, $time);
		$query->bindValue(8, $email_code);
		$query->bindValue(9, $locked);
		$query->bindValue(10, $id);
	 	try{
			$query->execute();
		}
		catch(PDOException $e){
			die($e->getMessage());
		}
	}
	public function changepwd($id,$password)
	{	$password   = sha1($password);
	 	$query 	= $this->db->prepare("UPDATE `users` SET `password` = ? WHERE `id` = ?");
		$query->bindValue(1, $password);
		$query->bindValue(2, $id);
	 	try{
			$query->execute();
		}
		catch(PDOException $e){
			die($e->getMessage());
		}
	}
	public function delete($id){
		$sql="DELETE FROM `users` WHERE `id` = ?";
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
	{	$query = $this->db->prepare("SELECT COUNT(`id`) FROM `users` WHERE `email` = ? AND `email_code` = ? AND `confirmed` = ?");
		$query->bindValue(1, $email);
		$query->bindValue(2, $email_code);
		$query->bindValue(3, 0);
		try{
			$query->execute();
			$rows = $query->fetchColumn();
			if($rows == 1){
				$query_2 = $this->db->prepare("UPDATE `users` SET `confirmed` = ? WHERE `email` = ?");
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
	{	$query = $this->db->prepare("SELECT COUNT(`id`) FROM `users` WHERE `username`= ? AND `confirmed` = ?");
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
	public function login($username, $password)
	{	$query = $this->db->prepare("SELECT `password`, `id` FROM `users` WHERE `username` = ?");
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
	public function userdata($id)
	{	$query = $this->db->prepare("SELECT * FROM `users` WHERE `id`= ?");
		$query->bindValue(1, $id);
		try{
			$query->execute();
			return $query->fetch();
		} catch(PDOException $e){
			die($e->getMessage());
		}
	} 
	public function get_user_by_id($id)
	{	$query = $this->db->prepare("SELECT * FROM `users` WHERE `id`= ?");
		$query->bindValue(1, $id);
		try{
			$query->execute();
			return $query->fetch();
		} catch(PDOException $e){
			die($e->getMessage());
		}
	} 
	public function get_user_by_level($level)
	{	$query = $this->db->prepare("SELECT * FROM `users` WHERE `level`= ?");
		$query->bindValue(1, $level);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll();
	}
	public function get_users()
	{	$query = $this->db->prepare("SELECT * FROM `users` ORDER BY `time` DESC");
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll();
	}
	public function log_users($iduser,$log)
	{	$time 		= time();
		$ip 		= $_SERVER['REMOTE_ADDR'];
		$browser	= $_SERVER['HTTP_USER_AGENT'];
	 	$query 	= $this->db->prepare("INSERT INTO `log_users` (`iduser`,`time`,`ip`,`browser`,`log`) VALUES (?, ?, ?, ?, ?)");
	 	$query->bindValue(1, $iduser);
		$query->bindValue(2, $time);
		$query->bindValue(3, $ip);
		$query->bindValue(4, $browser);
		$query->bindValue(5, $log);
	 	try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}
	public function get_users_log()
	{	$query = $this->db->prepare("SELECT * FROM `log_users` ORDER BY `time` DESC");
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll();
	}
}