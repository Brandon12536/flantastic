<?php
use PHPMailer\PHPMailer\{PHPMailer, SMTP, Exception};


require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';
require '../phpmailer/src/Exception.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 2;//SMTP::DEBUG_SERVER;                     //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.hostinger.com';          //correo con dominio                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'brandon@brandonperez.online';                     //SMTP username
    $mail->Password   = 'Brandonperez12?!';                               //SMTP password
    $mail->SMTPSecure =  'ssl';  //PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('brandon@brandonperez.online', 'Papelería 2B');
    $mail->addAddress('bp754509@gmail.com', 'Joe User');     //Add a recipient



    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Detalle de su compra';


    $cuerpo = '<h4>Gracias por su compra</h4>';
    $cuerpo .= '<p>El ID de su compra es <b>'. $id_transaccion .'</b></p>';

    $mail->Body    = utf8_decode($cuerpo);
    $mail->AltBody = 'Le enviamos los detalles de su compra.';

    $mail->setLanguage('es', '../phpmailer/languaje/phpmailer.lang-es.php');

    $mail->send();
    echo 'enviado correctamente';
} catch (Exception $e) {
    echo "Error al enviar el correo electrónico de la compra: {$mail->ErrorInfo}";
}
