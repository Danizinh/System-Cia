<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once("../connection/conn.php");
require_once("../models/reset.php");
require_once("../DAO/reset.php");
require_once("../Controllers/PHPMailer/src/SMTP.php");
require_once("../Controllers/PHPMailer/src/PHPMailer.php");
require_once("../Controllers/PHPMailer/src/Exception.php");

if (isset($_POST["email"])) {
    $email = $_POST["email"];
    $pdo = new Database();
    $ResetDAO = new ResetDAO($pdo->getConnection());
    if ($result = $ResetDAO->obterEmail($email)) {
        if ($result) {
            $code = uniqid(true);
            if ($ResetDAO->inserirCode($code, $email)) {
                $mail = new PHPMailer(true);
                $mail->SMTPDebug = 2;
                try {
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'danimaltoc@gmail.com';
                    $mail->Password = 'imldpqnfktcgsrxe';
                    $mail->SMTPSecure = 'tls';
                    $mail->Port = 587;

                    $mail->setFrom('danimaltoc@gmail.com', 'Daniela');
                    $mail->addAddress($email);
                    $mail->addReplyTo('no-reply@yourdomain.com', 'No reply');
                    $mail->setFrom('your-valid-email@yourdomain.com', 'Daniela');

                    $url = "http://" . $_SERVER["HTTP_HOST"] . "/daily-voiding/TCC/global/src/view/public/request_password.php?code=" . $code;
                    $mail->isHTML(true);
                    $mail->Subject = 'Redefinicao de Senha';
                    $mail->Body = "<h1 style='color:  rgba(0, 0, 0, 0.5);'> Clique no link abaixo para cadastrar sua senha </h1> Clique <a href='$url'> aqui </a> para trocar a senha";
                    $mail->send();
                    header('Location: ../views/public/login.php?erro=3');
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error:" . $mail->ErrorInfo;
                }
            } else {
                header("Location: ../views/public/request-reset.php?erro=1");
            }
            exit();
        }
    } else {
        header("Location: ../views/public/request-reset.php");
    }
}
