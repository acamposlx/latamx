<?php 
		$correo = "<table width=660 border=0 align=center cellpadding=20 cellspacing=1 bgcolor=#CCCCCC>";
		$correo .= 		"<tr><th height=100 bgcolor=#D6D6D6 scope=col><img src='http://www.latamxpress.com/app/img/logo_mail.png' alt='Logo LatamXpress' width='231' height='72' /></th>";
		$correo .= 		"</tr><tr>";
		$correo .= 		"<td height=250 bgcolor=#FFFFFF><p class=txt3>Solicitud de Cotización</p>";
		$correo .= 		"<p class=menu01>Se ha recibido una solicitud de cotización de parte de :</p>";
		$correo .= 		"<p class=menu01>Nombre: ".$_POST['nombre']."</p>";
		$correo .= 		"<p class=menu01>Email:".$_POST['email']."</p>";
		$correo .= 		"<p class=menu01>Teléfono de Contacto:".$_POST['telefono']."</p>";
		$correo .= 		"<p class=menu01>Cotización Solicitada</p>";
		if (isset($_POST['pesosel']))
		{
			$correo .= 		"<p class=menu01>Tipo de Envio: Aereo</p>";			
		}
		else
		{
			$correo .= 		"<p class=menu01>Tipo de Envio: Maritimo</p>";				
		}
		$correo .="<p class=menu01>Medidas:</p><table width=100% border=0><tr>";
		$correo .="<td>Largo:</td><td>".$_POST['largo'].$_POST['medidasel']."</td>";
		$correo .="<td>Ancho</td><td>".$_POST['ancho'].$_POST['medidasel']."</td>";
		$correo .="<td>Alto</td><td>".$_POST['alto'].$_POST['medidasel']."</td></tr>";
		if (isset($_POST['pesosel']))
		{
			$correo .="<tr><td>Peso:</td><td>".$_POST['pesoindicado'].$_POST['pesosel']."</td></tr>";
		}
		$correo .="</table></td></tr>";
		$correo .="</table>";
		$titulo3 = "Registro en LatamXpress";
		//cabecera
		$headers = "MIME-Version: 1.0\r\n"; 
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
		//direcci&oacute;n del remitente 
		$headers .= "From: no-responder@latamxpress.com <no-responder@latamxpress.com>\r\n";
		$headers .= "Bcc: latamxpress@gmail.com, alexcampos@latamxpress.com\r\n";
		//Enviamos el mensaje a tu_direcci&oacute;n_email 
		$bool = mail("alexcamposve@gmail.com",$titulo3,$correo,$headers);
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