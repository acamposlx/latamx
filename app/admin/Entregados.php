<?php
include('../httpful.phar');
$uri = "http://latam-cargo.com.ve/api/Entregados";
$response = \Httpful\Request::get($uri)->send();
$array = json_decode($response);
$mail = "<table><tr><td>Se ejecuto Entregados</td>";
$mail .= "<td>".print_r($array)."</td></tr>";
$mail .= "</table>";
		$titulo = "Entregados creados";
		//cabecera
		$headers = "MIME-Version: 1.0\r\n"; 
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
		//direcci&oacute;n del remitente 
		$headers .= "From: Admin LatamXpress <alexcamposve@gmail.com>\r\n";
		//Enviamos el mensaje a tu_direcci&oacute;n_email 
		$bool = mail("alexcampos@latamxpress.com",$titulo,$mail,$headers);
?>