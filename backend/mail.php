<?php
if (isset($_POST['firstname']))
    $firstname = $_POST['firstname'];
if (isset($_POST['lastname']))
    $lastname = $_POST['lastname'];
if (isset($_POST['email']))
    $email = $_POST['email'];
if (isset($_POST['PhoneNumer']))
    $phoneNumber = $_POST['PhoneNumer'];
if (isset($_POST['message']))
    $message = $_POST['message'];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'aspmx.l.google.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = false;                                   //Enable SMTP authentication
    // $mail->Username   = 'user@example.com';                     //SMTP username
    // $mail->Password   = 'secret';                               //SMTP password
    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 25;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom("yifat.tshuva@gmail.com", 'Mailer');
    $mail->addAddress('yifat.tshuva+portfolio@gmail.com', 'From Portfolio');     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'New Contact Form Submission';
    $mail->Body    = 'From: ' . $firstname . '<br> Email: ' . $email . '<br> Message: ' . $message;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
    header('Location: https://yifat-tshuva.com/thank-you.html');
    exit();
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}\n";
}

// $content = "From: $firstname \n Email: $email \n Message: $message";
// $recipient = "yifat.tshuva@gmail.com";
// $mailheader = "From: $email \r\n";
// mail($recipient, $subject, $content, $mailheader) or die("Error!");