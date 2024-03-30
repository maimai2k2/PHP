<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require './model/PHPMailer/src/SMTP.php';
require './model/PHPMailer/src/Exception.php';
require './model/PHPMailer/src/PHPMailer.php';

function khoitaoMail()
{
    $mail = new PHPMailer(true);
    try
    {
        $mail->SMTPDebug = 1;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->CharSet = 'utf-8';
        $mail->SMTPAuth = true;
        $mail->Username = 'otheraccofme@gmail.com';
        $mail->Password = 'acgvwyufxocquddb';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465; //587
        $mail->setFrom('otheraccofme@gmail.com', 'Ho Phuong Thao');
        $mail->isHTML(true);
        return $mail;
    }
    catch(Exception $e)
    {
        return $e->errorMessage();
    }
}
?>