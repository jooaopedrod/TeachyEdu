<?php
require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'teachyedu.pfc@gmail.com';
    $mail->Password = 'senhadaconta';
    $mail->Port = 587;

    $mail->setFrom('teachyedu.pfc@gmail.com');
    $mail->addAddress('teachyedu.pfc@gmail.com');

    $mail->isHTML(true);
    $mail->Subject = 'testando a bliblioteca';
    $mail->Body = 'ola';


    if ($mail->send()) {
        echo 'email enviado';
    } else {
        echo 'email nao enviado';
    }
} catch (Exception $e) {
    echo "ERRO AO ENVIAR O EMAIL: {$mail->ErrorInfo}";
}
