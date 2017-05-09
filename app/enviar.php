<?php 

$emailcliente=$_POST['txtEmail'];
$saludo = $_POST['ddlSaludo'];
$nombrecliente=$_POST['nombre'];
$apellidocliente=$_POST['apellido'];


$nombrefinal = $nombrecliente . " " .  $apellidocliente;
$identcliente = $_POST['identificacion'];
$codigop=$_POST['codigop'];
$codigoa=$_POST['codigoa'];
$telef=$_POST['telef'];

$telefonodef = $codigop ."/" .$codigoa ."/" .$telef;  
$sexo=$_POST['sexo'];
$dianac=$_POST['diaNac'];
$mesnac=$_POST['mesNac'];
$anonac=$_POST['anoNac'];

$fechanac = $dianac."/".$mesnac."/".$anonac;
$nombredir=$_POST['txtNombreDirecion'];
$dir=$_POST['txtDirecion'];
$estado=$_POST['estados'];
$ciudad=$_POST['ciudades'];
include('httpful.phar');
$uri2 = "http://localhost:34321/api/SetConsignee?nombre=".$nombrefinal."&direccion1=".$dir."&ciudad=".$ciudad."&estado=".$estado."&email=".$emailcliente."&telefono=".$telefonodef."&cedula=".$identcliente."&fechanac=".$fechanac;
$response2 = \Httpful\Request::post($uri2)->send();
$array2 = json_decode($response2);


if ($array2 == "Email found!")
	{
		echo("0");
	}
else
	{
		$correo = "<table width=100% border=0><tr><td>Email Cliente</td><td>&nbsp;</td>";
		$correo .= "<td>".$emailcliente."/" .$response2 ."</td></tr><tr>";
		$correo .= "<td>saludo</td><td>&nbsp;</td><td>".$saludo."</td></td></tr>";
		$correo .= "<tr><td>nombre</td><td>&nbsp;</td><td>".$nombrecliente."</td>";
		$correo .= "</tr><tr><td>apellido</td><td>&nbsp;</td><td>".$apellidocliente."</td></tr><tr>";
		$correo .= "<td>identificacion</td><td>&nbsp;</td><td>".$identcliente."</td>";
		$correo .= "</tr><tr><td>telefono</td><td>&nbsp;</td><td>".$codigop."-".$codigoa."-".$telef."</td>";
		$correo .= "</tr><tr><td>Sexo</td><td>&nbsp;</td><td>".$sexo."</td>";
		$correo .= "</tr><tr><td>Fecha Nac</td><td>&nbsp;</td><td>".$dianac."/".$mesnac."/".$anonac."</td></tr>";
		$correo .= "<tr><td>Nombre dir</td><td>&nbsp;</td><td>".$nombredir."</td>";
		$correo .= "</tr><tr><td>Direccion</td><td>&nbsp;</td><td>".$dir."</td></tr><tr>";
		$correo .= "<td>Estado</td><td>&nbsp;</td><td>".$estado."</td></tr>";
		$correo .= "<tr><td>Ciudades;</td><td>&nbsp;</td><td>".$ciudad."</td></tr></table>";
		$titulo3 = "Registro en LatamXpress";
		//cabecera
		$headers = "MIME-Version: 1.0\r\n"; 
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
		//direcci&oacute;n del remitente 
		$headers .= "From: no-responder@latamxpress.com <no-responder@latamxpress.com>\r\n";
		$headers .= 'Bcc: latamxpress@gmail.com' . "\r\n";
		//Enviamos el mensaje a tu_direcci&oacute;n_email 
		$bool = mail("alexcamposve@gmail.com",$titulo3,$correo,$headers);


		$mail = "<html><head><title>Bienvenido · Gracias por registrarte en LATAM XPRESS</title><link href=style-1.css rel=stylesheet type=text/css /></head>";
        $mail .= "<body><p>&nbsp;</p><table width=660 border=0 align=center cellpadding=1 cellspacing=0 bgcolor=CCCCCC>";
        $mail .= "<tr><td><table width=100% border=0 cellspacing=0 cellpadding=0><tr>";
        $mail .= "<td height=130 align=center bgcolor=#f5f6f7><img src=http://latam-cargo.net/img/logo_mail.png width=231 height=72 /></td></tr></table></td></tr>";
        $mail .= "<tr><td>";
        $mail .= "<table border=0 align=center cellpadding=30 cellspacing=0><tr>";
        $mail .= "<td valign=top bgcolor=FFFFFF><h1 class=txt3>Bienvenido</h1>";
        $mail .= "<div><div><div><h2>T&eacute;rminos y condiciones - LatamXpress</h2>";
        $mail .= "<div>En &eacute;sta p&aacute;gina usted encontrar&aacute; una versi&oacute;n   est&aacute;ndar de los t&eacute;rminos y condiciones";
        $mail .= "del sitio web de LatamXpress. N&oacute;tese que   ciertos pa&iacute;ses pueden requerir t&eacute;rminos y condiciones";
        $mail .= "diferentes.<br /><br />Los T&eacute;rminos y Condiciones de uso del sitio web de LatamXpress son los siguientes:<br /></div>";
        $mail .= "</div><div></div></div></div><div><div><div>";
        $mail .= "<h3>Autorizaci&oacute;n para Reproducci&oacute;n</h3>";
        $mail .= "Cualquier persona puede reproducir cualquier parte del material de estas p&aacute;gina web sujeto a las";
		$mail .= "siguientes condiciones:<br /><ul>";
        $mail .= "<li>El material solamente puede ser utilizado con prop&oacute;sitos informativos o no comerciales</li>";
        $mail .="<li>No puede modificarse en ning&uacute;n modo</li>";
        $mail .="<li>No puede realizarse ninguna copia no autorizada de cualquier marca registrada de LatamXpress</li>";
        $mail .="<li>Cualquier copia de cualquier parte del material debe incluir el siguiente aviso de derechos de autor:<br />";
        $mail .="<span xml:lang=en>Copyright</span> ©  LatamXpress. Todos los Derechos Reservados.</li>";
        $mail .="</ul></div></div></div><div><div><div>";
        $mail .="<h3>Otras Marcas Registradas y Nombres Comerciales</h3>";
        $mail .="Todas las marcas registradas o nombres comerciales a los que se refiere este material son propiedad de sus respectivos due&ntilde;os.<br />";
        $mail .="</div></div></div><div><div><div>";
        $mail .="<h3>Comentarios</h3>";
		$mail .="LatamXpress le agradece su   informaci&oacute;n, ideas y sugerencias, pero no podr&aacute; responder todos los   comentarios individuales. LatamXpress podr&aacute; utilizar cualquier informaci&oacute;n por   usted enviada y actuar en consecuencia.<br />";
        $mail .="</div></div></div><div><div><div>";
		$mail .="<h3><strong>Utilizaci&oacute;n de caracter&iacute;sticas interactivas en este sitio</strong></h3>";
        $mail .="<p>Para   su conveniencia, LatamXpress podr&aacute; ofrecer caracter&iacute;sticas interactivas en este   sitio, tal como acceso a comentarios de rastreo y de usuario. Usted   est&aacute; autorizado a utilizar estas caracter&iacute;sticas solamente con fines   espec&iacute;ficos y con ning&uacute;n otro fin.</p>";
		$mail .="</div></div></div><div><div><div>";
        $mail .="<h3>Correcci&oacute;n de este sitio</h3>";
        $mail .="Esta p&aacute;gina   web puede contener errores que hayan pasado inadvertidos o errores   tipogr&aacute;ficos. Estos ser&aacute;n corregidos a discreci&oacute;n de LatamXpress, a medida que   se identifiquen.  La informaci&oacute;n en esta p&aacute;gina web se actualiza   regularmente, pero los errores pueden permanecer u ocurrir a medida que   se realizan cambios durante las actualizaciones. La informaci&oacute;n de   Internet se mantiene en forma independiente en varios sitios en todo el   mundo y parte de la informaci&oacute;n a la que se accede a trav&eacute;s de &eacute;sta   p&aacute;gina web puede originarse fuera de LatamXpress. LatamXpress declina toda obligaci&oacute;n o   responsabilidad por este contenido.</div>";
        $mail .="</div></div><div><div><div>";
        $mail .="<h3>Virus</h3>";
        $mail .="LatamXpress realizar&aacute; todos los   esfuerzos razonables para excluir virus incluidos en la p&aacute;gina web, pero   no puede asegurar la exclusi&oacute;n total y no aceptar&aacute; responsabilidad   legal por tales virus. Usted deber&aacute; adoptar las medidas apropiadas antes   de descargar formaci&oacute;n de esta p&aacute;gina web.</div>";
        $mail .="</div></div><div><div><div>";
        $mail .="<h3><strong>Declinaci&oacute;n de Responsabilidad</strong></h3>";
        $mail .="Los   servicios, el contenido e informaci&oacute;n en este sitio web se proporcionan   sobre la hipot&eacute;tica base de &lsquo;como si&rsquo;. LatamXpress, hasta donde lo permita la   ley, declinar&aacute; todas las responsabilidades, ya sean &eacute;stas expresas,   t&aacute;citas, estatutarias o de otro tipo, incluyendo, aunque no   exclusivamente, las garant&iacute;as impl&iacute;citas de comercializaci&oacute;n, no   infracci&oacute;n por terceras partes y aptitud para un prop&oacute;sito especial. LatamXpress   y sus afiliadas y licenciatarias no representan o se responsabilizan   por la correcci&oacute;n, completitud, seguridad o adecuaci&oacute;n de los servicios,   contenido o informaci&oacute;n proporcionada en o a trav&eacute;s del sitio web de   LatamXpress o sus sistemas. Ninguna informaci&oacute;n obtenida a trav&eacute;s de los   sistemas o el sitio web de LatamXpress crear&aacute; ninguna responsabilidad que no sea   expl&iacute;citamente expresada por LatamXpress en estos t&eacute;rminos y condiciones.<br />";
        $mail .="<br />Algunas   jurisdicciones no permiten limitaciones impl&iacute;citas de responsabilidad,   es por eso que las limitaciones y exclusiones en esta secci&oacute;n pueden no   aplicarse a su caso si usted es un cliente.  Estas previsiones no   afectar&aacute;n sus derechos estatutarios a los que no puede renunciar, en   caso de haberlos.  Usted manifiesta que est&aacute; de acuerdo y conoce que las   limitaciones y exclusiones de responsabilidad y garant&iacute;as expresadas en   estos t&eacute;rminos y condiciones son justas y razonables.<br />";
        $mail .="</div></div></div><div><div><div>";
        $mail .="<h3><strong>Limitaci&oacute;n de responsabilidad</strong></h3>";
        $mail .="<p>En   la medida de lo permitido por ley, en ning&uacute;n caso podr&aacute; LatamXpress ni sus   afiliadas, licenciatarias o terceros mencionados en el sitio web de LatamXpress   ser responsables por cualquier da&ntilde;o incidental, indirecto, ejemplar,   punitivo o consecuencial, p&eacute;rdida de ganancias o da&ntilde;os resultantes de   p&eacute;rdida de informaci&oacute;n o interrupci&oacute;n del servicio a consecuencia del   uso o la incapacidad de utilizar el sitio web de LatamXpress y cualquier   sistema, servicio, contenido o informaci&oacute;n ya sea en garant&iacute;a, contrato,   agravio, ofensa, o cualquier otra teor&iacute;a legal, a&uacute;n en el caso de que   LatamXpress haya sido asesorado sobre la posibilidad de tal da&ntilde;o. Sin perjuicio   de lo anterior, y hasta donde lo permita la ley, usted manifiesta estar   de acuerdo que en ning&uacute;n caso la responsabilidad de LatamXpress por cualquier   da&ntilde;o (directo o no) o p&eacute;rdida, sin importar la forma de la acci&oacute;n o   reclamo, tanto si es parte de un contrato, agravio u otro medio,   exceder&aacute; los EUR 100.00. Mientras lo permita la ley, las soluciones   establecidas por usted en estos t&eacute;rminos y condiciones son exclusivas y   est&aacute;n limitadas a las expresamente proporcionadas por estos t&eacute;rminos y   condiciones.</p>";
        $mail .="</div></div></div><div><div><div>";
        $mail .="<h3>Productos y Servicios</h3>";
        $mail .="A menos que haya   sido expresado en forma escrita, el transporte de productos y servicios   mencionados en &eacute;sta p&aacute;gina  web est&aacute; sujeto a los t&eacute;rminos y   condiciones de env&iacute;o de LatamXpress. Dado que &eacute;stos pueden variar dependiendo de   la ubicaci&oacute;n del pa&iacute;s de origen del env&iacute;o, contacte al centro de   servicio LatamXpress m&aacute;s cercano para obtener una copia de los t&eacute;rminos y   condiciones locales. Puede que no todos los productos y servicios de LatamXpress   est&eacute;n disponibles en todos los pa&iacute;ses. <br />";
        $mail .="</div></div></div><div><div><div>";
        $mail .="<h3><strong>Divulgaci&oacute;n de informaci&oacute;n</strong></h3>";
        $mail .="Toda   la informaci&oacute;n brindada a LatamXpress por los visitantes de &eacute;sta p&aacute;gina web se   considerar&aacute; confidencial y no ser&aacute; divulgada por LatamXpress a ning&uacute;n tercero,   excepto en el caso que se requiera para la provisi&oacute;n de los servicios.</div>";
        $mail .="</div></div></td>";
        $mail .="</tr></table>";
		$mail .="</td></tr><tr><td align=center>";
        $mail .="<table width=100% border=0 cellspacing=0 cellpadding=20 class=txt1>";
        $mail .="<tr><td height=100 align=center bgcolor=f5f6f7>";
		$mail .="4624 NW 74th Ave, Miami, FL 33166, Estados Unidos<br />";
        $mail .="Tel&eacute;fono +58-212-628-8042<br />";
        $mail .="<a href=mailto:info@latamxpress.com class=txt1>info@latamxpress.com</a></td>";
        $mail .="</tr></table></td></tr></table>";
		//Titulo
		$titulo = "Registro en LatamXpress";
		//cabecera
		$headers = "MIME-Version: 1.0\r\n"; 
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
		//direcci&oacute;n del remitente 
		$headers .= "From: no-responder@latamxpress.com <no-responder@latamxpress.com>\r\n";
		//Enviamos el mensaje a tu_direcci&oacute;n_email 
		$bool = mail($emailcliente,$titulo,$mail,$headers);

		$mensaje = "<table width=660 border=0 align=center cellpadding=1 cellspacing=0 bgcolor=CCCCCC><tr><td>";
        $mensaje .= "<table width=100% border=0 cellspacing=0 cellpadding=0><tr>";
        $mensaje .= "<td height=130 align=center bgcolor=f5f6f7><img src=http://latam-cargo.net/img/logo_mail.png width=231 height=72 /></td></tr>";
        $mensaje .= "</table></td></tr><tr><td>";
        $mensaje .= "<table border=0 align=center cellpadding=30 cellspacing=0>";
        $mensaje .= "<tr>";
        $mensaje .= "<td valign=top bgcolor=FFFFFF><h1 class=txt3>Muchas gracias por registrarte en LATAM XPRESS</h1>";
        $mensaje .= "<p class=txt4><span class=txt4>Tu cuenta ha sido creada y puedes iniciar sesi&oacute;n colocando ";
        $mensaje .= "tu direcci&oacute;n de correo electr&oacute;nico (" . $emailcliente.  ") y contrase&ntilde;a (123456) en nuestro sitio web o a trav&eacute;s del siguiente";
        $mensaje .= " enlace URL:</span></p>";
        $mensaje .= "<p class=txt4>---------------------------------------------------------------------------------------<br />";
        $mensaje .= "<span class=menu01><a href= class=menu01>http://latamxpress.com/app</a></span><br />";
        $mensaje .= "---------------------------------------------------------------------------------------</p>";
        $mensaje .= "<p class=txt4>Una vez ingresado, ser&aacute;s capaz de editar la informaci&oacute;n de tu cuenta.</p>";
        $mensaje .= "<p class=txt4>Gracias,<br />Latam Xpress</p></td></tr></table></td></tr><tr>";
        $mensaje .= "<td align=center><table width=100% border=0 cellspacing=0 cellpadding=20 class=txt1><tr>";
        $mensaje .= "<td height=100 align=center bgcolor=f5f6f7>4624 NW 74th Ave, Miami, FL 33166, Estados Unidos<br />Tel&eacute;fono +58-212-628-8042<br />";
        $mensaje .= "<a href=mailto:info@latamxpress.com class=txt1>info@latamxpress.com</a></td></tr>";
        $mensaje .= "</table></td></tr></table>";
			
			
			
		$titulo2 = "Confirmaci&oacute;n de Registro en LatamXpress";
		//cabecera
		$headers = "MIME-Version: 1.0\r\n"; 
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
		//direcci&oacute;n del remitente 
		$headers .= "From: no-responder@latamxpress.com <no-responder@latamxpress.com>\r\n";
		//Enviamos el mensaje a tu_direcci&oacute;n_email 
		$bool2 = mail($emailcliente,$titulo,$mensaje,$headers);
		if($bool)
			{
				echo("1");
			}
		else
			{
				echo("0");
			}
	}
?> 