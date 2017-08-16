<?php
require 'phpmailer/PHPMailerAutoload.php';

if($_POST){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['comments'];
}

$mail = new PHPMailer;

$mail->SMTPDebug = 3;                                 // Enable verbose debug output

//$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com;';                        // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                                 // Enable SMTP authentication
$mail->Username = 'dcdronesbr@gmail.com';           // SMTP username
$mail->Password = 'myemail';                         // SMTP password
$mail->SMTPSecure = 'ssl';                              // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                      // TCP port to connect to

$mail->setFrom('dcdronesbr@gmail.com', 'DC Drones');
$mail->addAddress($email, $name);     // Add a recipient
// $mail->addAddress('ellen@example.com');               // Name is optional
// $mail->addReplyTo('info@example.com', 'Information');
// $mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');

// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'DC Drones - Contato';
$mail->Body    = $message;
$mail->AltBody = $message;

if(!$mail->send()) {
    echo 'Sua mensagem não pôde ser enviada.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Mensagem enviada com sucesso.';
}