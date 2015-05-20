<?php

//Incluimos la clase de PHPMailer
require 'phpmailer/PHPMailerAutoload.php';
$mail = new PHPMailer;
//Creamos una instancia en lugar usar mail()
$correo = new PHPMailer(); 

//Le decimos al script que utilizaremos SMTP
$correo->IsSMTP();
 
//Activaremos la autentificaci�n SMTP el cual se utiliza en la mayor�a de casos
$correo->SMTPAuth = true;
 
//Especificamos la seguridad de la conexion, puede ser SSL, TLS o lo dejamos en blanco si no sabemos
$correo->SMTPSecure = 'tls';
 
//Especificamos el host del servidor SMTP
$correo->Host = "smtp.gmail.com";
 
// Timeout para el servidor de correos. Por defecto es valor es '10'
$correo->Timeout=30;
 
// Codificaci�n UTF8. Obligado utilizarlo en aplicaciones en Espa�ol
$correo->CharSet = 'UTF-8';
 
//Especficiamos el puerto del servidor SMTP
$correo->Port = 587;
 
//El usuario del servidor SMTP
$correo->Username   = "amdd.bot@gmail.com";
 
//Contrase�a del usuario
$correo->Password   = "a005m001d001d007";

//Usamos el SetFrom para decirle al script quien envia el correo
$correo->SetFrom("me@micodigophp.com", "Mi Codigo PHP");
 
//Usamos el AddReplyTo para decirle al script a quien tiene que responder el correo
$correo->AddReplyTo("me@micodigophp.com","Mi Codigo PHP");
 
//Usamos el AddAddress para agregar un destinatario
$correo->AddAddress("destino@correo.com", "Robot");
 
//Ponemos el asunto del mensaje
$correo->Subject = "Mi primero correo con PHPMailer";
 
/* 
 //* Si deseamos enviar un correo con formato HTML utilizaremos MsgHTML:
 $correo->MsgHTML("<strong>Mi Mensaje en HTML</strong>");

 * Si deseamos enviarlo en texto plano, haremos lo siguiente:
 * $correo->IsHTML(false);
 * $correo->Body = "Mi mensaje en Texto Plano";
 */
$correo->MsgHTML("Mi Mensaje en <strong>HTML</strong>");
 
//Si deseamos agregar un archivo adjunto utilizamos AddAttachment
//$correo->AddAttachment("images/phpmailer.gif");
 
//Enviamos el correo
if(!$correo->Send()) {
  echo "Hubo un error: " . $correo->ErrorInfo;
} else {
  echo "Mensaje enviado con exito.";
}
 
?>