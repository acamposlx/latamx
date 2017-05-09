<?php 
session_start();
$receipt = $_GET['receipt'];
include('httpful.phar');
$uri2 = "http://latam-cargo.com.ve/api/Tracking?receipt=".$receipt;

$response2 = \Httpful\Request::get($uri2)->send();
$array2 = json_decode($response2);
$cantidad = count($array2);



if (strlen($receipt) < 5 )
{
$uri3 = "http://latam-cargo.com.ve/api/GetReceipts/".$receipt;
$response3 = \Httpful\Request::get($uri3)->send();
$array3 = json_decode($response3);
}




if ($cantidad ==0)
	{ 
		$display_string = "<div align=center>No conseguimos informaci&oacute;n con su solicitud. Por favor verifique los datos</div>";
	}
	else 
	{
		$k=0;
		$cantidadReceipts = 0;
		for ($k = 0; $k < $cantidad; $k++) 
			{
				if ($k==0)
				{}
				else
					{
						$nuevovalork = $k-1;
						if ($array2[$nuevovalork]->Box <> $array2[$k]->Box)
							{
								$cantidadReceipts++;
							}	
					}
			}
		$cantidadReceipts = $cantidadReceipts + 1;
		$display_string = "<div align=center>";
		$display_string .= "<table width=75% border=0>";
		$display_string .= "<tr style=background-color:#004c96; color:#FFF;>";
		$display_string .= "<td colspan=4 class=titulos3>Receipt: ".$array2[0]->Receipt."</td>";
		$display_string .= "</tr><tr>";
		$display_string .= "<tr><td colspan=4>Cantidad de Piezas:".$cantidadReceipts."</td></tr>";
		$display_string .= "<td colspan=4>Estatus: ". $array2[$cantidad - 1]->Status ."</td></tr>";
		if (strlen($receipt) < 5 )
		{
			if(isset($_SESSION['ConsigneeCode']))
			{
				if ($_SESSION['ConsigneeCode'] == $array3[0]->consigneeid )
				{
					$display_string .= "<tr><td colspan=4>Consignatario: " .$array3[0]->consignee ."</td></tr><tr>";
					$display_string .= "<td colspan=4>Agente: " .$array3[0]->agent ."</td></tr><tr>";
					$display_string .= "<td colspan=4>Shipper: " .$array3[0]->shipper ."</td></tr><tr>";
					$display_string .= "<td colspan=4>Descripci&oacute;n: " .$array3[0]->itemdescription ."</td></tr>";
				}
			}
		}
		$display_string .= "</table><br><br>";
		$display_string .= "<table width=90% border=0>";
		$i = 0;
		$piezas = 0;
		for ($j = 0; $j < $cantidad; $j++) 
		{		
			if ($j==0)
			{
				$piezas = 1;
				$display_string .= "<tr style=background-color:#004c96; color:#FFF;>";
				$display_string .= "<td colspan=3 align=center class=titulos3>Pieza 1 de ".$cantidadReceipts."</h2></td></tr>";
				$display_string .= "<tr style=background-color:#004c96; color:#FFF;>";	
				$display_string .= "<td class=subtitulos>Fecha</td>";
				$display_string .= "<td class=subtitulos>Hora</td>";
				$display_string .= "<td class=subtitulos>Status</td></tr>";			
			}
			else
			{
				$nuevovalor = $j-1;
				if ($array2[$nuevovalor]->Box <> $array2[$j]->Box)
				{
					$piezas++;
					$display_string .= "<tr><td colspan=3>&nbsp;</td></tr><tr style=background-color:#004c96; color:#FFF;><td colspan=3  align=center class=titulos3>Pieza ".$piezas. " de " . $cantidadReceipts ."</h2></td></tr>";
					$display_string .= "<tr style=background-color:#004c96; color:#FFF;>";	
					$display_string .= "<td class=subtitulos>Fecha</td>";
					$display_string .= "<td class=subtitulos>Hora</td>";
					$display_string .= "<td class=subtitulos>Status</td></tr>";
				}
			}
			$i++;
			$display_string .= "<tr>";
			$display_string .= "<td>" .$array2[$j]->Date ."</td>";
			$display_string .= "<td>" .$array2[$j]->Time ."</td>";
			$display_string .= "<td>" .$array2[$j]->Status ."</td></tr>";
			if ($i ==2)
			{
				$i=0;
			}
		}
		$display_string .= "</table></div>";
		$display_string .= "<hr color=#ffffff>";
	}
echo $display_string;
?>