<?php
include('httpful.phar');
$uri = "http://latam-cargo.com.ve/api/Instructions";
$response = \Httpful\Request::get($uri)->send();
$array = json_decode($response);
$mail = "<table><tr><td>Autor</td>";
$mail .= "<td>Codigo</td><td>Seguro</td><td>Monto Seguro</td>";
$mail .= "    <td>Pago</td>";
$mail .= "    <td>Receipt</td>";
$mail .= "    <td>Tipo</td></tr>";
foreach($array as $obj)
	{
		$Receipt = $obj->code;
		$Author = $obj->author;
		$Code = $obj->code;
		$Insurance = $obj->insurance;
		$InsuranceAmmount = $obj->insuranceammount;
		$Payment = $obj->payment;
		$Type = $obj->type;
		$mail .= "<tr><td>".$Author."</td>";
		$mail .= "<td>".$Code."</td>";
		$mail .= "<td>".$Insurance."</td>";
		$mail .= "<td>".$InsuranceAmmount."</td>";
		$mail .= "<td>".$Payment."</td>";
		$mail .= "<td>".$Receipt."</td>";
		$mail .= "<td>".$Type."</td>";
		$mail .= "<td>".$CountryID."</td></tr>";
	}		
$mail .= "</table>";
		$titulo = "Instrucciones creados";
		//cabecera
		$headers = "MIME-Version: 1.0\r\n"; 
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
		//direcci&oacute;n del remitente 
		$headers .= "From: Admin LatamXpress <alexcamposve@gmail.com>\r\n";
		//Enviamos el mensaje a tu_direcci&oacute;n_email 
		$bool = mail("alexcamposve@gmail.com",$titulo,$mail,$headers);
?>