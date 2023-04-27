


<?php 
//BANDEJA DE ENTRADA FALSA PARA RECIBIR CORREOS- SERVIDOR: https://mailtrap.io/


//funcion para correos
require ("vendor/autoload.php");



//información de la documentacion de https://packagist.org/packages/phpmailer/phpmailer


use PHPMailer\PHPMailer\PHPMailer;



function sendMail($subject, $body, $email, $name, $html = False) {

//---DOCUMENTACION DE  https://mailtrap.io/ para PHPMailer :  Use the following setting to configure PHPMailer:

//---------------------CONFIGURACION INICIAL del servidor de correos


//con un servidor falso- para testing....https://mailtrap.io/...........
/*$phpmailer = new PHPMailer();
$phpmailer->isSMTP();
$phpmailer->Host = 'sandbox.smtp.mailtrap.io';
$phpmailer->SMTPAuth = true;
$phpmailer->Port = 2525;
$phpmailer->Username = '5fb5ed9489cb76';
$phpmailer->Password = '00383fd5d55646';*/


//con un gmail............................
$phpmailer = new PHPMailer();
$phpmailer->isSMTP();
$phpmailer->Host       = 'smtp.gmail.com';  
$phpmailer->SMTPAuth = true;
$phpmailer->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;  //funcion para encriptar los emails
$phpmailer->Port = 465; // puerto de seguridad para enviar correo
$phpmailer->Username = 'sergiourbina765@gmail.com'; //correo
$phpmailer->Password = 'yybljgtmlzuaezgy';  //correo sergio :  yybljgtmlzuaezgy   // correo art. rxyvxcgfhkwzhqto


//------------------------------AÑANIENDO DESTINATARIOS
//-quien envia el correo
$phpmailer->setFrom('rosaura@example.com', 'Rosaura Herrera');


//a quien se le envia el correo
$phpmailer->addAddress( $email, $name);


//-----------------------------DEFINIENDO CONTENIDO DE CORREOS

$phpmailer->isHTML($html);   //Set email format to HTML
$phpmailer->Subject = $subject;
$phpmailer->Body    = $body;


//--------------------------------ENVIAR EL CORREO
$phpmailer->send();



}







//--------------------------------------------------NOTA FINAL

// COLOCAR LAS PAGUINAS WEB QUE SE UTILIZO PARA EL PROYECTO CON LA LIBRERIA  =  PHPMailer
?>