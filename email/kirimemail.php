<?php
require_once('../PHPMailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'hudahuday75@gmail.com';
$mail->Password = 'nurhuda09';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;
$mail->setFrom('helpdesk@visio.net', 'Helpdesk VISIONET');
$mail->addAddress($_GET["email"]);
$mail->isHTML(true);
ob_start();
$msg = "Dear Assignee, \r\n
You are currently as assignee for this ticket.\r\n
Please follow this link to resolved the ticket --> http://localhost/helpdesk/ticketedituser.php?id=21"." \r\n
Thank you. \r\n
Regards, \r\n
Helpdesk";
  ?>
  <div>
      Tiket penugasan penyelesaian permasalahan dari customer.
      <a href="http://localhost/helpdesk/ticketedituser.php?id=<?php echo $_GET["ticket_id"] ?>">Klik tautan untuk melihat tiket. </a>
  </div>
  <?php
  $html = ob_get_contents();
  ob_end_clean();
  $mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
  );
  $mail->SMTPDebug = 1;
  $mailContent = $html;
  $mail->Body = $mailContent;
  if($mail->send()) {
    echo 'OKe mail sent';
	  header("Location: ../ticketread.php?id=".$_GET["ticket_id"]);
  } else {
    echo 'err';
  }

// ?>