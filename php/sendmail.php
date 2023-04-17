<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

echo "Script is running";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  echo "POST request received";
  // rest of your code
  $toEmail = 'rk.seferi@gmail.com'; // Enter your email address here
    $toName = 'Erik'; // Enter your name here
    $subject = 'New message from your website';

    $fromEmail = $_POST['email'];
    $fromName = $_POST['name'];
    $message = $_POST['message'];

    $mail = new PHPMailer;

    try {
        //Server settings
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.mailtrap.io';                     // Set the SMTP server to mailtrap's server
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'ff88a0baf380d0';                        // SMTP username from mailtrap account
        $mail->Password   = '471fc5803f4763';                        // SMTP password from mailtrap account
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;          // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom($fromEmail, $fromName);
        $mail->addAddress($toEmail, $toName);                       // Add a recipient
        $mail->addReplyTo($fromEmail, $fromName);

        //Content
        $mail->isHTML(true);                                        // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $message;

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
