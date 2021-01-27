@<?php
require ('phpmailer/PHPMailerAutoload.php');
require ('phpmailer/class.phpmailer.php');
if(isset($_POST['submit'])){
$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPKeepAlive = true; 
$mail->SMTPDebug = 4;
$mail->SMTPAuth = TRUE;
$mail->SMTPSecure = 'tls';
$mail->Port = 587;
$mail->Username='rzoro1697@gmail.com';
$mail->Password='monkeydluffy';
$mail->Host="ssl://smtp.gmail.com";
$mail->Mailer='smtp';
$mail->Port=587;
$mail->SMTPSecure='tls';

$mail->setFrom($_POST["email"],$_POST["name"]);
$mail->addAddress('amitksingh1697@gmail.com');
$mail->addReplyTo($_POST["email"],$_POST["name"]);
$mail->Subject  = $_POST["subject"];
$mail->Body     = $_POST["message"];
if(!$mail->send()) {
	?>
  <script>alert("Message was not sent");</script><?php
  echo 'Mailer error: ' . $mail->ErrorInfo;
  echo !extension_loaded('openssl')?"Not Available":"Available";
} else {
	?>
  <script>alert("Message was not sent");</script>
  <?php
}
}
?>
