<?php
include('httpful.phar');
$uri = "http://latam-cargo.com.ve/api/Receipts";
$response = \Httpful\Request::get($uri)->send();
$array = json_decode($response);

foreach($array as $obj)
	{
		if ($obj->Notificar == 1 )
			{
				$mail = "<table width=660 border=0 align=center cellpadding=20 cellspacing=1 bgcolor=#CCCCCC>";
				$mail .= "<tr>";
				$mail .= "<th height=100 bgcolor=#D6D6D6 scope=col><img src='http://latamxpress.com/app/img/logo_mail.png' alt='Logo LatamXpress' width='231' height='72' /></th>";
				$mail .= "</tr><tr>";
				$mail .= "<td height=250 bgcolor=#FFFFFF><p class=txt3>¡Notificación de Paquete Recibido!</p>";
				$mail .= "<p class=menu01>Hemos recibido un embarque a su nombre, ingrese a su cuenta a tráves de latamxpress.com/app con su email y password para que nos indique sus instrucciones de envio.</p>";
				$mail .= "<p class=menu01>Saludos cordiales, <br /></p>";
				$mail .= "<p class=menu01>LATAM Xpress</p></td></tr>";
				$mail .= "<tr><td bgcolor=#FFFFFF><p class=txt5><strong>Nota:</strong><br />";
				$mail .= "Por favor no respondas a este mensaje ya que fue enviado desde una cuenta de correo electrónico no monitoreada. ";
				$mail .= " Este mensaje es un correo electrónico relacionado con el uso de <a href=http://www.latamxpress.com target=_blank class=txt5>";
				$mail .= "www.latamxpress.com</a></p>";
				$mail .= "<p class=txt5>Tu contraseña es confidencial <a href=http://www.latamxpress.com>www.latamxpress.com</a> <strong>NUNCA</strong> solicita datos de cuenta y contraseña vía e-mail ni por ningún otro medio.</p></td>";
				$mail .= "</tr><tr>";
				$mail .= "<td height=80 align=center bgcolor=#D6D6D6 class=txt5><strong>Miami - Estados Unidos</strong><br />";
				$mail .= "8000 NW 29th Ave, Miami, FL 33122<br />";
				$mail .= "+1(305)640-5391<br />";
				$mail .= "+1(305)640-5639<br />";
				$mail .= "<br /><strong>Caracas - Venezuela</strong><br />";
				$mail .= "+58(212)655-0603<br /><br /><strong>Correo</strong><br />";
				$mail .= "<a href=mailto:info@latamxpress.com>info@latamxpress.com</a></td></tr></table> ";

				$titulo = "Cron Job Ejecutado";
				//cabecera
				$headers = "MIME-Version: 1.0\r\n"; 
				$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
				//direcci&oacute;n del remitente 
				$headers .= "From: Admin LatamXpress <no-responder@latamxpress.com>\r\n";
				$headers .= "Bcc: latamxpress@gmail.com\r\n";
				//Enviamos el mensaje a tu_direcci&oacute;n_email 
				$bool = mail("alexcampos@latamxpress.com",$titulo,$mail,$headers);
			}
	}
?>
