<?php
$correo = "<table width='660' border='0' align='center' cellpadding='1' cellspacing='0' bgcolor='#CCCCCC'><tr><td><table width='100%'' border='0' cellspacing='0' cellpadding='0'><tr><td height='130' align='center' bgcolor='#f5f6f7'><img src='http://latamxpress.com/app/img/logo_mail.png' width='231' height='72' /></td></tr></table></td></tr><tr><td><table border='0' align='center' cellpadding='30' cellspacing='0'><tr><td valign='top' bgcolor='#FFFFFF'><h1 style='font-family: Verdana, Geneva, sans-serif;font-size: 22px; color: #333333; font-weight: bold; letter-spacing: -1px;'>Bienvenido</h1><p><span style='font-family: Verdana, Geneva, sans-serif; font-size: 13px; color: #000000;'>Gracias por escogernos como tu courier de confianza. Para continuar con el proceso de registro haz clic aquí:</span><br /><br /></p><table width='250' border='1' align='center' cellpadding='15' cellspacing='0'><tr>";
$correo .= "<td align='center'><a href='http://latamxpress.com/app/exitoRegistro.php?Email=".$_GET['correo']."'><img src='http://latamxpress.com/app/img/conf-reg.png' /></a></td>";
$correo .= "</tr></table><p>&nbsp;</p><p style='font-family: Verdana, Geneva, sans-serif; font-size: 13px; color: #777777;'><strong>¿No funciona el botón? </strong><br />Prueba copiando y pegando la siguiente dirección en tu navegador:<br />http://latamxpress.com/app/exitoRegistro.php?Email=".$_GET['correo']."</p><p><span>-------------------------------------------------------------------------------------</span><br /></td></tr><tr><td valign='top' bgcolor='#FFFFFF'><table width='100%' border='0' cellspacing='0' cellpadding='0'><tr><td><span><img src='http://latamxpress.com/app/img/firma.png' width='176' height='39' /></span></td><td align='right'><img src='http://latamxpress.com/app/img/tetraemos.jpg' width='201' height='16' /></td></tr></table></td></tr></table></td></tr><tr><td><table width='100%' border='0' cellspacing='0' cellpadding='30'><tr>
<td bgcolor='#FFFFFF'><p style='font-family: Verdana, Geneva, sans-serif; font-size: 10px; color: #333333;'><strong>Por favor no responder a este mensaje ya que el mismo fue enviado desde una cuenta de correo electrónico no monitoreada. </strong></p><p style='font-family: Verdana, Geneva, sans-serif; font-size: 10px; color: #333333;' dir='ltr'>Tu contraseña es confidencial, LatamXpress® nunca solicitará datos de tu cuenta y contraseña por correo electrónico ni por ningún otro medio.</p><p dir='ltr'><strong style='font-family: Verdana, Geneva, sans-serif; font-size: 10px; color: #333333;' id='docs-internal-guid-76b42a8c-6675-d983-e14a-bd00f1c486aa'>¿Dudas? escribenos a info@latamxpress.com y te ayudaremos</strong></p></td></tr></table></td></tr><tr><td align='center'><table width='100%' border='0' cellspacing='0' cellpadding='20' style='font-family: Verdana, Geneva, sans-serif; font-size: 13px; color: #FFFFFF; text-decoration: none;'><tr><td align='center' valign='top' bgcolor='#21619D' style='font-family: Verdana, Geneva, sans-serif; font-size: 13px; color: #FFFFFF; text-decoration: none;'><strong>Miami - Estados Unidos</strong><br />8000 NW 29th St,<br />Miami,FL 33122<br /><br />+1(305)640-5391<br />+1(305)640-5639</td><td align='center' valign='top' bgcolor='#21619D'><strong>Caracas - Venezuela</strong><br />+58(212)655-0603<br />RIF:J-40620006-9 <br /><br /><br /><a href='http://www.latamxpress.com' style='font-family: Verdana, Geneva, sans-serif; font-size: 13px; color: #FFFFFF; text-decoration: none;'><strong>www.latamxpress.com</strong></a></td><td width='30%' align='center' valign='top' bgcolor='#21619D'><strong>Síguenos en:</strong><br /><br /><table width='100%' border='0' cellspacing='0' cellpadding='2'><tr><td><a href='https://www.facebook.com/Latam-Xpress-1049926855020369/?fref=ts' target='_blank'><img src='http://latamxpress.com/app/img/facebook.png' width='38' height='38' /></a></td><td><a href='https://www.instagram.com/latamxpress/' target='_blank'><img src='http://latamxpress.com/app/img/instagram.png' width='39' height='38' /></a></td><td><a href='https://twitter.com/latamxpress' target='_blank'><img src='http://latamxpress.com/app/img/twitter.png' width='38' height='38' /></a></td><td><a href='https://www.youtube.com/channel/UCfHfXf1oNSKP9wlPNn9_TwA' target='_blank'><img src='http://latamxpress.com/app/img/youtube.png' width='38' height='38' /></a></td></tr></table></td></tr></table></td></tr></table>";
$titulo3 = "Confirmaciòn de Registro en LatamXpress";
//cabecera
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
//direcci&oacute;n del remitente
$headers .= "From: no-responder@latamxpress.com <no-responder@latamxpress.com>\r\n";
$headers .= "Bcc: latamxpress@gmail.com, alexcampos@latamxpress.com\r\n";
//Enviamos el mensaje a tu_direcci&oacute;n_email
$bool = mail($_REQUEST['correo'],$titulo3,$correo,$headers);



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Confirmaci&oacute;n de Registro a Latam Xpress - BIENVENIDO !</title><link rel="stylesheet" type="text/css" href="Styles/style-1.css"/>

<style type="text/css">
body {
	margin-top: 20px;
	margin-bottom: 20px;
}
</style>
</head>

<body>
<table width="660" border="0" align="center" cellpadding="20" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
    <th height="100" bgcolor="#D6D6D6" scope="col"><img src="img/logo_mail.png" alt="Logo LatamXpress" width="231" height="72" /></th>
  </tr>
  <tr>
    <td height="250" bgcolor="#FFFFFF"><p class="txt3">¡Bienvenido!</p>
      <p class="menu01">En breves momentos recibira un correo con las instrucciones para activar su cuenta</td>
  </tr>
  <tr>
    <td height="80" align="center" bgcolor="#D6D6D6" class="txt5"><strong>Miami - Estados Unidos</strong><br />
8000 NW 29th Ave, Miami, FL 33122<br />
+1(305)640-5391<br />
+1(305)640-5639<br />
<br />
<strong>Caracas - Venezuela</strong><br />
+58(212)655-0603<br />
<br />
<strong>Correo</strong><br />
<a href="mailto:info@latamxpress.com">info@latamxpress.com</a></td>
  </tr>
</table>
</body>
</html>
