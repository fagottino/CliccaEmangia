<?php

require_once ("class.phpmailer.php");
require_once ("class.smtp.php");

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Host = "clicca.mangia@gmail.com";

$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";
$mail->Host = "smtp.gmail.com";
$mail->Port = 465;
$mail->Username = "clicca.mangia";
$mail->Password = "cliccaemangia";



$mail->Subject = $_POST['subject'];
$mail->Body = $_POST['message'];
$mail->setFrom = $_POST["email"]; /// prende l'email di chi effettivamente manda 
$mail->FromName = $_POST["name"];


$address = "clicca.mangia@gmail.com";
$mail->AddAddress($address);



if (!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}
?>