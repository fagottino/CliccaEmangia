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
//$mail->Body = $_POST['message'];
$mail->setFrom = $_POST["email"];
$mail->FromName = $_POST["name"];

$testo = "Hai ricevuto una mail dal sito Clicca e Mangia da:<br /><br />"
.$_POST["name"]."<br />"
.$_POST["email"]."<br />"
.$_POST["subject"]."<br /><br />"
."Messaggio <br />"
.$_POST["message"]
;
$mail->Body = $testo;
$mail->isHTML(true);

//$address = "clicca.mangia@gmail.com";
$address = "anto.orla@gmail.com";
$mail->AddAddress($address);

if (!$mail->Send()) {
    //return "Mailer Error: " . $mail->ErrorInfo;
    return false;
} else {
    return true;
//    return "Message sent!";
}