<?php
$to  = 'Hendra <hudahuday75@gmail.com>' . ', '; 
$to .= '';
$subject = 'Ticket No. 30/SR/Aug/2013 needs your resolution!';
$message = 
"Dear Assignee, \r\n
You are currently as assignee for this ticket.\r\n
Please follow this link to resolved the ticket --> http://localhost/helpdesk/ticketedituser.php?id=21"." \r\n
Thank you. \r\n
Regards, \r\n
Helpdesk";
$headers   = array();
$headers[] = "MIME-Version: 1.0";
$headers[] = "Content-type: text/plain; charset=iso-8859-1";
$headers[] = "From: Helpdesk System <helpdesk@mail.com>";
$headers[] = "Cc:";
$headers[] = "Bcc:";
$headers[] = "Reply-To: Helpdesk System <helpdesk@mail.com>";
$headers[] = "Subject: $subject";
$headers[] = "X-Mailer: PHP/".phpversion();
$ok = mail($to, $subject, $message, implode("\r\n", $headers));
if ($ok) {
echo "Email sent successfully!!";
} else {
echo "Failed: Email cannot be sent!!";
}
?>
