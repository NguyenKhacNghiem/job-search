<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../phpmailer/vendor/autoload.php';

header('Content-Type: application/json') ;
$mail = new PHPMailer(true);

try {
    $email = $_POST["email"];   
    $code = rand(1000, 9999);

    $mail->CharSet = 'UTF-8';
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                     
    $mail->SMTPAuth   = true;                                  
    $mail->Username   = 'nghiem7755@gmail.com';                     
    $mail->Password   = 'cbcdcyqozswijmge';                               
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            
    $mail->Port       = 587;                                    

    $mail->setFrom('nghiem7755@gmail.com', 'VNJOBFIND');
    $mail->addAddress($email);               

    $mail->isHTML(true);                                  
    $mail->Subject = 'VNJOBFIND - XÁC NHẬN EMAIL TÀI KHOẢN';
    $mail->Body    = "Mã xác nhận email tài khoản của bạn là <b>$code</b>";

    $mail->send();

    die(json_encode(array('code' => $code))) ;
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}