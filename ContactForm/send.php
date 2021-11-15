<?php
header("Content-type:text/html; charset:utf-8");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

function Security($Value){
	$First  = trim($Value);
	$Second = strip_tags($First);
	$Third  = htmlspecialchars($Second, ENT_QUOTES);
	$Result = $Third;
	return $Result;
}

$name    = Security($_POST["name"]);
$email   = Security($_POST["email"]);
$phone   = Security($_POST["phone"]);
$subject = Security($_POST["subject"]);
$message = Security($_POST["message"]);

$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Debug mod off
    $mail->isSMTP();                                         //Send with SMTP
    $mail->Host       = 'smtp.office365.com';                //SMTP Host
    $mail->SMTPAuth   = true;                                //SMTP Validation
    $mail->Username   = 'xxx@xxx.com';                       //SMTP User Name
    $mail->Password   = 'xxxx';                              //SMTP Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;      //SSL/TLS Settings
    $mail->Port       = 587;                                 //PORT Settings
	$mail->SMTPOptions= array(
						'ssl' => [
							'verify_peer' => false,
							'verify_peer_name' => false,
							'allow_self_signed' => true
								],
						);
    $mail->CharSet = 'UTF-8';                                //Character 
    $mail->setLanguage('en', '/optional/path/to/language/directory/'); // Language
    
    //Recipients
    $mail->setFrom('xxx@xxx.com');
    $mail->addAddress('xxx.admin@xxx.com');                   //Reciver E-mail
    //$mail->addAddress('ellen@example.com', 'Ellen Example'); //Can add name
    $mail->addReplyTo($email, $name); //The mail address when the recipient reply.
    //$mail->addCC('cc@example.com'); // Information Person
    //$mail->addBCC('bcc@example.com'); // Hidden Information Person
    $mail->CharSet = 'UTF-8';
    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //File attachment
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //File attachment with extension

    //Content
    $mail->isHTML(true);                                  //E-mail HTML
    $mail->Subject = $subject;
	$mail->msgHTML("Sent from : " . $email ."<br>". $message); //Can also add a HTML page
    //$mail->Body    = 'Hello, <i>Test</i>';
    //$mail->AltBody = 'Hello, Test'; //Field that appears on servers that do not accept HTML Mail

    $mail->send();
    echo 'Message has been sent' ;
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>