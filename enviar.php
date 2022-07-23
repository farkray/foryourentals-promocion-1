<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

$name = $_POST['name'];
$mail = $_POST['mail'];
$phone = $_POST['phone'];
$country = $_POST['country'];
$state = $_POST['state'];
$city = $_POST['city'];
$zone = $_POST['zone'];

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'mail.foryourentals.lat';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'lead@foryourentals.lat';                     //SMTP username
    $mail->Password   = 'LGmacbookair2022@';                               //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('lead@foryourentals.lat', 'Landing FYR');
    $mail->addAddress('krayem.farid@gmail.com', 'For You Rentals');     //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Haz recibido un nuevo lead de FYR';
    $mail->Body    = '
    <p>Hola, haz recibido un mensaje de <b>' . $name . '</b>. Su correo es<br><b>' . $mail . '</b><br> Teléfono:<br><b>' . $phone . '</b><br> País: <br><b>' . $country . '</b><br> Estado: <br><b>' . $state . '</b><br> Ciudad: <br><b>' . $city . '</b><br> Zona: <br><b>' . $zone . '</b><br> Espero que sea una venta segura. Dr Do.';
    $mail->AltBody = 'Este es un mensaje alterno al lead';

    $mail->send();
    //echo 'Mensaje enviado, pronto estaremos en contacto';
    include 'body.php';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


?>