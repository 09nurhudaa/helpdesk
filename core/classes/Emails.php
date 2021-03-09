<?php 
date_default_timezone_set('Asia/Jakarta');
class Emails{
	private $db;
	public function __construct($database)
	{   $this->db = $database; }	
	public function add_email($idticket,$senddate,$emailto,$emailcc,$emailbcc,$emailsubject,$message,$emailstatus)
	{	$querystring = "INSERT INTO `log_emails` (`idticket`,`senddate`,`emailto`,`emailcc`, `emailbcc`,`emailsubject`,`message`, `emailstatus`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
		$query 	= $this->db->prepare($querystring);
		$query->bindValue(1, $idticket);
	 	$query->bindValue(2, $senddate);
		$query->bindValue(3, $emailto);
		$query->bindValue(4, $emailcc);
		$query->bindValue(5, $emailbcc);
		$query->bindValue(6, $emailsubject);
		$query->bindValue(7, $message);
		$query->bindValue(8, $emailstatus);
	 	try{
			$query->execute();
	 	}catch(PDOException $e){
			die($e->getMessage());
		}
	}
	public function add_sla_remainder($idticket,$ticketnumber,$slasenddate,$emailto,$emailcc,$emailbcc,$emailsubject,$message)
	{	$emailsubject = "Ticket No: $ticketnumber has reached 75% of SLA Resolution Goal Time";
		$message = 
"Dear Assignee, \r\n
We remaind you that your ticket No: $ticketnumber has reached 75% of SLA Resolution Goal Time.\r\n
Please give resolution for this ticket as soon as posible.\r\n
Thank you. \r\n
Regards, \r\n
Helpdesk";
		$querystring = "INSERT INTO `log_emails` (`idticket`,`senddate`,`emailto`,`emailcc`, `emailbcc`,`emailsubject`,`message`, `emailstatus`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
		$query 	= $this->db->prepare($querystring);
		$query->bindValue(1, $idticket);
	 	$query->bindValue(2, $slasenddate);
		$query->bindValue(3, $emailto);
		$query->bindValue(4, $emailcc);
		$query->bindValue(5, $emailbcc);
		$query->bindValue(6, $emailsubject);
		$query->bindValue(7, $message);
		$query->bindValue(8, 'SLA Remainder');
	 	try{
			$query->execute();
	 	}catch(PDOException $e){
			die($e->getMessage());
		}
	}
	public function update_status_email($idemail,$emailstatus)
	{	$querystring = "UPDATE `log_emails` SET `emailstatus` = ? WHERE `idemail` = ?";
		$query 	= $this->db->prepare($querystring);
	 	$query->bindValue(1, $emailstatus);
		$query->bindValue(2, $idemail);
	 	try{
			$query->execute();
		}
		catch(PDOException $e){
			die($e->getMessage());
		}
	
	}
	public function delete($idemail){
		$sql="DELETE FROM `log_emails` WHERE `idemail` = ?";
		$query = $this->db->prepare($sql);
		$query->bindValue(1, $idemail);
		try{
			$query->execute();
		}
		catch(PDOException $e){
			die($e->getMessage());
		}
	}
	public function get_email_by_idemail($idemail)
	{	$query = $this->db->prepare("SELECT * FROM `log_emails` WHERE `idemail`= ?");
		$query->bindValue(1, $idemail);
		try{
			$query->execute();
			return $query->fetch();
		} catch(PDOException $e){
			die($e->getMessage());
		}
	} 
	public function get_email_by_idticket($idticket)
	{	$query = $this->db->prepare("SELECT * FROM `log_emails` WHERE `idticket`= ?");
		$query->bindValue(1, $idticket);
		try{
			$query->execute();
			return $query->fetch();
		} catch(PDOException $e){
			die($e->getMessage());
		}
	}
	public function get_email_by_status($emailstatus)
	{	$query = $this->db->prepare("SELECT * FROM `log_emails` WHERE `emailstatus`= ?");
		$query->bindValue(1, $emailstatus);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll();
	}
	public function get_email_sla_remainder()
	{	$query = $this->db->prepare("SELECT * FROM `log_emails` WHERE `emailstatus`= ? and senddate <= UNIX_TIMESTAMP(NOW())");
		$query->bindValue(1,'SLA Remainder');
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll();
	}
	public function get_email()
	{	$query = $this->db->prepare("SELECT * FROM `log_emails` ORDER BY `idemail` ASC");
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll();
	}
	public function get_email_queue()
	{	$query = $this->db->prepare("SELECT * FROM `log_emails` WHERE `emailstatus` <> 'Sent' AND senddate <= UNIX_TIMESTAMP(NOW()) ORDER BY `senddate` ASC");
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll();
	}
	public function get_email_queue_by_id($idemail)
	{	$query = $this->db->prepare("SELECT * FROM `log_emails` WHERE `idemail`= ?");
		$query->bindValue(1, $idemail);
		try{
			$query->execute();
			return $query->fetch();
		} catch(PDOException $e){
			die($e->getMessage());
		}
	}
	public function send_new_ticket()
	{	if (substr(php_uname(), 0, 7) == "Windows"){
			//$cmd = "D:\mowes_portable\www\helpdesk\batch\sendnewticket.bat";
			$cmd = "C:xampp\htdocs\helpdesk\batch\sendnewticket.bat";
			$WshShell = new COM("WScript.Shell");
			$oExec = $WshShell->Run("cmd /C $cmd", 0, false);
			return $oExec == 0 ? true : false;  
		}
		else {
			$cmd = "php /batch/sendnewticket.bat";
			exec($cmd . " > /dev/null &");  
		} 
	}
	public function send_sla_remainder()
	{	if (substr(php_uname(), 0, 7) == "Windows"){
			//$cmd = "D:\mowes_portable\www\helpdesk\batch\sendslaremainder.bat";
			$cmd = "C:\xampp\htdocs\helpdesk\batch\sendslaremainder.bat";
			$WshShell = new COM("WScript.Shell");
			$oExec = $WshShell->Run("cmd /C $cmd", 0, false);
			return $oExec == 0 ? true : false;  
		}
		else {
			$cmd = "php /batch/sendslaremainder.bat";
			exec($cmd . " > /dev/null &");  
		} 
	}
}