<?php

//Incluimos la clase de PHPMailer
require 'phpmailer/PHPMailerAutoload.php';
$mail = new PHPMailer;
//Creamos una instancia en lugar usar mail()
$correo = new PHPMailer(); 

//obtenemos los datos del POST
$nombre = $_POST['first_name'];
$apellidos = $_POST['last_name'];
$correoMenda = $_POST['email'];
$telef= $_POST['telephone'];
$coment = $_POST['comments'];


//Le decimos al script que utilizaremos SMTP
$correo->IsSMTP();
 
//Activaremos la autentificación SMTP el cual se utiliza en la mayoría de casos
$correo->SMTPAuth = true;
 
//Especificamos la seguridad de la conexion, puede ser SSL, TLS o lo dejamos en blanco si no sabemos
$correo->SMTPSecure = 'tls';
 
//Especificamos el host del servidor SMTP
$correo->Host = "smtp.gmail.com";
 
// Timeout para el servidor de correos. Por defecto es valor es '10'
$correo->Timeout=30;
 
// Codificación UTF8. Obligado utilizarlo en aplicaciones en Español
$correo->CharSet = 'UTF-8';
 
//Especficiamos el puerto del servidor SMTP
$correo->Port = 587;
 
//El usuario del servidor SMTP
$correo->Username   = "amdd.bot@gmail.com";
 
//Contraseña del usuario
$correo->Password   = "a005m001d001d007";

//Usamos el SetFrom para decirle al script quien envia el correo
$correo->SetFrom($correoMenda, "Prueba");
 
//Usamos el AddReplyTo para decirle al script a quien tiene que responder el correo
$correo->AddReplyTo($correoMenda,"Enviar un reply a este correo");
 
//Usamos el AddAddress para agregar un destinatario
$correo->AddAddress("amdd.bot@gmail.com", "para mi");
 
//Ponemos el asunto del mensaje
$correo->Subject = "Quiero ponerme en contacto";
 
/* 
 //* Si deseamos enviar un correo con formato HTML utilizaremos MsgHTML:
 $correo->MsgHTML("<strong>Mi Mensaje en HTML</strong>");

 * Si deseamos enviarlo en texto plano, haremos lo siguiente:
 * $correo->IsHTML(false);
 * $correo->Body = "Mi mensaje en Texto Plano";
 */
$correo->MsgHTML(false);
$correo->Body = $coment; 
//Si deseamos agregar un archivo adjunto utilizamos AddAttachment
//$correo->AddAttachment("images/phpmailer.gif");
 
//Enviamos el correo
if(!$correo->Send()) {
  echo "Hubo un error: " . $correo->ErrorInfo;
} else {
  echo "Mensaje enviado con exito.";
}
 
?>