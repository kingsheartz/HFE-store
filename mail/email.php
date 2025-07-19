<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require $_SERVER['DOCUMENT_ROOT'] . '/HFE-Store/mail/Exception.php';
require $_SERVER['DOCUMENT_ROOT'] . '/HFE-Store/mail/PHPMailer.php';
require $_SERVER['DOCUMENT_ROOT'] . '/HFE-Store/mail/SMTP.php';
$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 0; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
$mail->Host = "smtp.gmail.com"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
$mail->Port = 587; // TLS only
$mail->SMTPSecure = 'tls'; // ssl is deprecated
$mail->SMTPAuth = true;
$mail->Username = 'healthandfitnessequipmentstore@gmail.com'; // email
$mail->Password = 'zoqvnbgcszvohhqe'; // password
$mail->setFrom('healthandfitnessequipmentstore@gmail.com', 'HFE-Store'); // From email and name
$mail->addAddress('govind.das279@gmail.com', 'Govind'); // to email and name
$mail->Subject = 'PHPMailer GMail SMTP test';
$mail->msgHTML("test body"); //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
$mail->AltBody = 'HTML messaging not supported'; // If html emails is not supported by the receiver, show this body
// $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}