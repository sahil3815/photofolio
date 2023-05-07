<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';
$firstname = $_POST['firstname'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$mobile = $_POST['mobile'];
$message = $_POST['message'];
$sender_mail = "sahilpayal90@gmail.com";
$sender_name = "Photofolio";
$mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';

    $mail->SMTPAuth   = true;

    $mail->Username   = 'sahilpayal90@gmail.com';

    $mail->Password   = 'wttqjbefkmrgwqng';

    $mail->SMTPSecure = 'tsl';

    $mail->Port       = 587;

    $mail->setFrom($sender_mail , $sender_name);
try
{
    $mail->Subject = "mail from ".$firstname;
    $mail->isHTML(true);
    $message_1 = '<html><body>'.'<h4>Name: '.$firstname.'</h4>'.'<h4>Email: '.$email.'</h4>'.'<h4>Message: '.$message.'</h4>'.'<br><a href="tel:'.$mobile.'"><button>Call Sender</button></a>'.'</body></html>';
    $mail->Body = $message_1;
    $mail->send($mail->addAddress("sahilpayal81@gmail.com","sahil"));
}
catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
try
{
    $mail->Subject = $subject;
    $mail->isHTML(true);
    $mail->addAddress($email,$firstname);
    $message_2 =  '<html><body>'.'<p>dear '.$firstname.',</p>'.'<p>thank you for contacting us</p>'.'<p>we have got you mail with the message: '.'</P>'.'<p>'.$message.'.</p>'.'<p>our team will contact you as soon as possible.</p>'.'<p>Thank you</p>'.'<p>Regards,</p>'.'<p>team <a href="https://github.com/sahil3815/photofolio">Photofolio<a></p>'.'</body></html>';
    $mail->Body = $message_2;
    $mail->send();
    header("../contact.html");
}
catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>