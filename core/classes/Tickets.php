<?php 
date_default_timezone_set('Asia/Jakarta');
date("h:i:sa");
class Tickets{
	private $db;
	public function __construct($database)
	{   $this->db = $database; }	
	public function ticket_exists($projectid) 
	{	$query = $this->db->prepare("SELECT COUNT(`id`) FROM `tickets` WHERE `ticketnumber`= ?");
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
	public function add_ticket($ticketnumber,$sla,$idcustomer,$reporteddate,$reportedby,$telp,$email,$problemsummary,$problemdetail,$ticketstatus,$assignee,$documentedby)
	{	$current  = time();
		$querystring = "INSERT INTO `tickets` (`ticketnumber`,`sla`,`idcustomer`,`reporteddate`, `reportedby`, `telp`, `email`, `problemsummary`,`problemdetail`,`ticketstatus`,`assignee`,`documentedby`,`documenteddate`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$query 	= $this->db->prepare($querystring);
	 	$query->bindValue(1, $ticketnumber);
		$query->bindValue(2, $sla);
		$query->bindValue(3, $idcustomer);
		$query->bindValue(4, $reporteddate);
		$query->bindValue(5, $reportedby);
		$query->bindValue(6, $telp);
		$query->bindValue(7, $email);
		$query->bindValue(8, $problemsummary);
		$query->bindValue(9, $problemdetail);
		$query->bindValue(10, $ticketstatus);
		$query->bindValue(11, $assignee);
		$query->bindValue(12, $documentedby);
		$query->bindValue(13, $current);
	 	try{
			$query->execute();
	 	}catch(PDOException $e){
			die($e->getMessage());
		}
	}
	public function update_ticket($id,$sla,$reporteddate,$reportedby,$telp,$email,$problemsummary,$problemdetail,$ticketstatus,$assignee,$assigneddate,$pendingby, $pendingdate, $resolution,$resolvedby,$resolveddate,$closedby,$closeddate)
	{	$querystring = "UPDATE `tickets` SET `sla` = ? , `reporteddate` = ? , `reportedby` = ? , `telp` = ? ,`email` = ? , `problemsummary` = ? , `problemdetail` = ? ,`ticketstatus` = ?, `assignee` = ? , `assigneddate` = ?, `pendingby` = ?,`pendingdate` = ?, `resolution` = ? ,`resolvedby` = ?,`resolveddate` = ?,`closedby` = ?,`closeddate` = ? WHERE `id` = ?";
		$query 	= $this->db->prepare($querystring);
	 	$query->bindValue(1, $sla);
		$query->bindValue(2, $reporteddate);
		$query->bindValue(3, $reportedby);
		$query->bindValue(4, $telp);
		$query->bindValue(5, $email);
		$query->bindValue(6, $problemsummary);
		$query->bindValue(7, $problemdetail);
		$query->bindValue(8, $ticketstatus);
		$query->bindValue(9, $assignee);
		$query->bindValue(10, $assigneddate);
		$query->bindValue(11, $pendingby);
		$query->bindValue(12, $pendingdate);
		$query->bindValue(13, $resolution);
		$query->bindValue(14, $resolvedby);
		$query->bindValue(15, $resolveddate);
		$query->bindValue(16, $closedby);	
		$query->bindValue(17, $closeddate);
		$query->bindValue(18, $id);
	 	try{
			$query->execute();
		}
		catch(PDOException $e){
			die($e->getMessage());
		}
	}
	public function delete($id){
		$sql="DELETE FROM `tickets` WHERE `id` = ?";
		$query = $this->db->prepare($sql);
		$query->bindValue(1, $id);
		try{
			$query->execute();
		}
		catch(PDOException $e){
			die($e->getMessage());
		}
	}	
	public function ticket_data($id)
	{	$query = $this->db->prepare("SELECT * FROM `tickets` WHERE `id`= ?");
		$query->bindValue(1, $id);
		try{
			$query->execute();
			return $query->fetch();
		} catch(PDOException $e){
			die($e->getMessage());
		}
	}
	public function get_tickets()
	{	$query = $this->db->prepare("SELECT * FROM `tickets` ORDER BY `ticketnumber` DESC");
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll();
	}
	public function get_opened_tickets()
	{	$query = $this->db->prepare("SELECT * FROM `tickets` WHERE `ticketstatus` <> 'Closed' ORDER BY `ticketnumber` DESC");
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll();
	}
	public function get_tickets_by_requester($userid)
	{	$query = $this->db->prepare("SELECT * FROM `tickets` WHERE `documentedby`= ? ORDER BY `ticketnumber` DESC");
		$query->bindValue(1, $userid);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll();
	}
	public function get_tickets_by_assignee($userid)
	{	$query = $this->db->prepare("SELECT * FROM `tickets` WHERE `assignee`= ? ORDER BY `ticketnumber` DESC");
		$query->bindValue(1, $userid);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll();
	}
	public function get_tickets_by_resolver($username)
	{	$query = $this->db->prepare("SELECT * FROM `tickets` WHERE `resolvedby`= ? ORDER BY `ticketnumber` DESC");
		$query->bindValue(1, $username);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll();
	}
	public function get_tickets_by_resolver_not_closed($username)
	{	$query = $this->db->prepare("SELECT * FROM `tickets` WHERE `resolvedby`=? and `ticketstatus` <> ? ORDER BY `ticketnumber` DESC");
		$query->bindValue(1, $username);
		$query->bindValue(2, 'Closed');
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll();
	}
	public function get_tickets_by_status($ticketstatus)
	{	$query = $this->db->prepare("SELECT * FROM `tickets` WHERE `ticketstatus`=? ORDER BY `ticketnumber` DESC");
		$query->bindValue(1, $ticketstatus);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll();
	}
	public function search_closed_ticket($fromperiod, $toperiod)
	{	$query = $this->db->prepare("SELECT * FROM `tickets` WHERE `documenteddate` >= ? AND `documenteddate` <= ? AND `ticketstatus` = 'Closed' ORDER BY `documenteddate` DESC");
		$query->bindValue(1, $fromperiod);
		$query->bindValue(2, $toperiod);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll();
	}
	public function count_tickets_by_customer()
	{	$query = $this->db->prepare("SELECT `idcustomer`, count(*) as `total` FROM `tickets` GROUP BY `idcustomer` ORDER BY total DESC LIMIT 5");
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll();
	}
	public function count_tickets_by_status()
	{	$query = $this->db->prepare("SELECT ticketstatus, count(*) as total FROM `tickets` GROUP BY ticketstatus");
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll();
	}
	public function count_resolved_tickets_by_month()
	{	$sql="SELECT Month(FROM_UNIXTIME(`documenteddate`)) as Bulan, Count(*) as Total FROM `tickets` WHERE (`ticketstatus`='Resolved' OR `ticketstatus`='Closed') AND FROM_UNIXTIME(`documenteddate`) >= CURDATE() - INTERVAL 1 YEAR GROUP BY Month(FROM_UNIXTIME(`documenteddate`))";
		$query = $this->db->prepare($sql);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll();
	}
	public function count_inprogress_tickets_by_month()
	{	$sql="SELECT Month(FROM_UNIXTIME(`documenteddate`)) as Bulan, Count(*) as Total FROM `tickets` WHERE (`ticketstatus`='Assigned' OR `ticketstatus`='Pending') AND FROM_UNIXTIME(`documenteddate`) >= CURDATE() - INTERVAL 1 YEAR GROUP BY Month(FROM_UNIXTIME(`documenteddate`))";
		$query = $this->db->prepare($sql);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll();
	}
	public function get_last_ticket()
	{	$query = $this->db->prepare("SELECT * FROM `tickets` ORDER BY id DESC LIMIT 1");
		try{
			$query->execute();
			return $query->fetch();
		} catch(PDOException $e){
			die($e->getMessage());
		}
	}/*
	public function notify_assignee($id,$ticketnumber,$email_assignee)
	{	if (substr(php_uname(), 0, 7) == "Windows"){
			$cmd = "D:\mowes_portable\www\helpdesk\batch\sendemail.bat";
			$WshShell = new COM("WScript.Shell");
			$oExec = $WshShell->Run("cmd /C $cmd", 0, false);
			return $oExec == 0 ? true : false;  
		}
		else {
			$cmd = "php /batch/sendemail.bat";
			exec($cmd . " > /dev/null &");  
		} 	
	}*/
	public function log_tickets($id,$sla,$reporteddate,$reportedby,$telp,$email,$problemsummary,$problemdetail,$ticketstatus,$assignee,$assigneddate,$pendingby, $pendingdate, $resolution,$resolvedby,$resolveddate,$closedby,$closeddate,$changes,$changeby)
	{	$changedate  = time();
		$querystring = "INSERT INTO `log_tickets` (`id`,`sla`,`reporteddate`, `reportedby`, `telp`, `email`, `problemsummary`,`problemdetail`,`ticketstatus`,`assignee`,`assigneddate`,`pendingby`,`pendingdate`,`resolution`,`resolvedby`,`resolveddate`,`closedby`,`closeddate`,`changes`,`changeby`,`changedate`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$query 	= $this->db->prepare($querystring);
	 	$query->bindValue(1, $id);
		$query->bindValue(2, $sla);
		$query->bindValue(3, $reporteddate);
		$query->bindValue(4, $reportedby);
		$query->bindValue(5, $telp);
		$query->bindValue(6, $email);
		$query->bindValue(7, $problemsummary);
		$query->bindValue(8, $problemdetail);
		$query->bindValue(9, $ticketstatus);
		$query->bindValue(10, $assignee);
		$query->bindValue(11, $assigneddate);
		$query->bindValue(12, $pendingby);
		$query->bindValue(13, $pendingdate);
		$query->bindValue(14, $resolution);
		$query->bindValue(15, $resolvedby);
		$query->bindValue(16, $resolveddate);
		$query->bindValue(17, $closedby);	
		$query->bindValue(18, $closeddate);
		$query->bindValue(19, $changes);
		$query->bindValue(20, $changeby);
		$query->bindValue(21, $changedate);
	 	try{
			$query->execute();
	 	}catch(PDOException $e){
			die($e->getMessage());
		}
	}
	public function get_audit_trail($id)
	{	$query = $this->db->prepare("SELECT * FROM `log_tickets` WHERE `id`= ? ORDER BY `changedate` DESC");
		$query->bindValue(1, $id);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll();
	}

	public function get_technician_resolved_total() {
		$query = $this->db->prepare("SELECT resolvedby, COUNT(*) as total FROM tickets WHERE ticketstatus = 'Closed' OR ticketstatus = 'Resolved' GROUp BY resolvedby");
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll();
	}

	public function get_customer_complaint() {
		$query = $this->db->prepare("SELECT idcustomer, COUNT(*) as total FROM tickets WHERE ticketstatus = 'Closed' OR ticketstatus = 'Resolved' GROUp BY idcustomer");
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll();
	}
}