<?php
require '../core/init.php';
//$general->logged_out_protect();
$sla_emails = $emails->get_email_sla_remainder();
foreach ($sla_emails as $sla_email)
{	$idemail = $sla_email['idemail'];
	$to 	 = $sla_email['emailto'];
	$cc 	 = substr($sla_email['emailcc'], 0, -2);
	$subject = $sla_email['emailsubject'];
	$message = $sla_email['message'];
	
	$headers   = array();
	$headers[] = "MIME-Version: 1.0";
	$headers[] = "Content-type: text/plain; charset=iso-8859-1";
	$headers[] = "From: Helpdesk System <helpdesk@Visio.net>";
	$headers[] = "Cc:$cc";
	$headers[] = "Bcc:";
	$headers[] = "Reply-To: Helpdesk System <helpdesk@visio.net>";
	$headers[] = "X-Mailer: PHP/".phpversion();
	echo $idemail."<br>";
	/*
	$ok = mail($to, $subject, $message, implode("\r\n", $headers));
	if ($ok)
	{	$emails->update_status_email($idemail,"Sent");
	} else {
		$emails->update_status_email($idemail,"Cannot Send");
	}*/
}
?>
