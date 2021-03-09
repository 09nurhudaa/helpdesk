<?php
require '../core/init.php';
//$general->logged_out_protect();
$emailstatus="New";
$new_emails = $emails->get_email_by_status($emailstatus);
foreach ($new_emails as $new_email)
{	$idemail = $new_email['idemail'];	
	$to 	 = $new_email['emailto'];
	$cc 	 = substr($new_email['emailcc'], 0, -2);
	$subject = $new_email['emailsubject'];
	$message = $new_email['message'];
	
	$headers   = array();
	$headers[] = "MIME-Version: 1.0";
	$headers[] = "Content-type: text/plain; charset=iso-8859-1";
	$headers[] = "From: Helpdesk System <helpdesk@kampushendra.com>";
	$headers[] = "Cc: $cc";
	$headers[] = "Bcc:";
	$headers[] = "Reply-To: Helpdesk System <helpdesk@kampushendra.com>";
	$headers[] = "X-Mailer: PHP/".phpversion();
	$ok = mail($to, $subject, $message, implode("\r\n", $headers));
	if ($ok)
	{	$emails->update_status_email($idemail,"Sent");
	} else {
		$emails->update_status_email($idemail,"Cannot Send");
	}
}
?>
