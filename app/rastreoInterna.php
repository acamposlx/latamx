<?php
//session_start();
include('headInterna.php');
include('admin/funciones/funciones_comunes.php');
include('admin/funciones/funciones.php');
include('admin/funciones/funciones_servicios.php');



$receipt = $_GET['receipt'];
$fecha = date('m/j/Y');
$nuevafecha = strtotime ( '-5 day' , strtotime ( $fecha ) ) ;
$nuevafecha = date ( 'm/j/Y' , $nuevafecha );
$track = tracking($receipt, "01/01/2000", $fecha);
if (isset($track[0]['ID'])){
	$existe = buscaTracking_ID($track[0]['ID']);
		if ($existe->num_rows == 0) {
			insertaTracking($track[0]['ID'], $track[0]['Box'], $track[0]['Date'], $track[0]['Time'], $track[0]['Note'], $track[0]['Status'], $track[0]['Operator'], $track[0]['Tracking'], $_POST['receipt']);
				if($track[0]['Status'] == 'ENTREGADO!'){
					entrega_receipt($_POST['receipt']);
				}
			}
 
} else {




foreach($track as $tr){
	$ultimos3 = substr($tr[0]["Box"],-3); 
	foreach ($tr as $t) {
		if (substr($t["Box"],-3) == $ultimos3){
			$existe = buscaTracking_ID($t['ID']);
			if ($existe->num_rows == 0) {
				insertaTracking($t['ID'], $t['Box'], $t['Date'], $t['Time'], $t['Note'], $t['Status'], $t['Operator'], $t['Tracking'], $receipt);
				if($t['Status'] == 'ENTREGADO!'){
					entrega_receipt($receipt);
				}
			}
		}
	}
}}
$result = buscaTracking($receipt);
$cantidad = $result->num_rows;

if (isset($cantidad)){
	if ($cantidad ==0){
		$display_string = "<div align=center>No conseguimos informaci&oacute;n con su solicitud. Por favor verifique los datos</div>";
	} else {
		$k=0;
		$rows = array();
    	while($row = $result->fetch_assoc()) {
    		 $rows[] = $row;
    	}




		$cantidadReceipts = 0;
		for($contenido = 0; $contenido< count($rows); $contenido++)
		{

			if ($contenido != 0){
				$nuevovalork = $contenido-1;

				if ($rows[$nuevovalork]['Box'] <> $rows[$contenido]['Box'])
				{
					$cantidadReceipts++;
				}
			}
    	}
		$cantidadReceipts = $cantidadReceipts + 1;
		$display_string = "<div align=center  class='table-responsive'>";
		$display_string .= "<table width=75% border=0>";
		$display_string .= "<tr style=background-color:#004c96; color:#FFF;>";
		$display_string .= "<td colspan=4 class=titulos3>Receipt: ".$rows[$contenido -1]['receipt']."</td>";
		$display_string .= "</tr><tr>";
		$display_string .= "<tr><td colspan=4>Cantidad de Piezas:".$cantidadReceipts."</td></tr>";
		$display_string .= "<td colspan=4>Estatus: ". $rows[$cantidad - 1]['Status']."</td></tr>";
		if (strlen($rows[$contenido -1]['receipt']) < 5 )
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
		$display_string .= "<table width=90% border=0   class='table table-striped'>";
		$i = 0;
		$piezas = 0;
		for($contenido2 = 0; $contenido2< count($rows); $contenido2++){
			if ($contenido2 == 0){
				$piezas = 1;
				$display_string .= "<tr style=background-color:#004c96; color:#FFF;>";
				$display_string .= "<td colspan=4 align=center class=titulos3>Pieza 1 de ".$cantidadReceipts."</h2></td></tr>";
				$display_string .= "<tr style=background-color:#004c96; color:#FFF;>";
				$display_string .= "<td class=subtitulos>Fecha</td>";
				$display_string .= "<td class=subtitulos>Hora</td>";
				$display_string .= "<td class=subtitulos>Notas</td>";
				$display_string .= "<td class=subtitulos>Status</td></tr>";
			}
			else
			{
				$nuevovalor = $contenido2-1;
				if ($rows[$nuevovalor]['Box'] <> $rows[$contenido2]['Box'])
				{
					$piezas++;
					$display_string .= "<tr><td colspan=4>&nbsp;</td></tr><tr style=background-color:#004c96; color:#FFF;><td colspan=4  align=center class=titulos3>Pieza ".$piezas. " de " . $cantidadReceipts ."</h2></td></tr>";
					$display_string .= "<tr style=background-color:#004c96; color:#FFF;>";
					$display_string .= "<td class=subtitulos>Fecha</td>";
					$display_string .= "<td class=subtitulos>Hora</td>";
					$display_string .= "<td class=subtitulos>Notas</td>";
					$display_string .= "<td class=subtitulos>Status</td></tr>";
				}
			}
			$time = strtotime($rows[$contenido2]['Date']);
			$newformat = date('d/m/Y',$time);
			$display_string .= "<tr>";
			$display_string .= "<td>" .$newformat."</td>";
			$display_string .= "<td>" .$rows[$contenido2]['Time']."</td>";
			$display_string .= "<td>" .$rows[$contenido2]['Note']."</td>";
			$display_string .= "<td>" .$rows[$contenido2]['Status']." </td></tr>";
    	}
	$display_string .= "</table></div>";
	$display_string .= "<hr color=#ffffff>";
	}
echo $display_string;
}
?>
<br>
<br>
<br>
<br>
<br>

