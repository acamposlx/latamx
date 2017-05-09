<?php
ini_set('max_execution_time', 900);
include('servicios/WSGetReceipts.php');
include('funciones/funciones_comunes.php');
include('funciones/funciones.php');

$fecha = date('m/j/Y');
$nuevafecha = strtotime ( '-5 day' , strtotime ( $fecha ) ) ;
$nuevafecha = date ( 'm/j/Y' , $nuevafecha );
$datos = receipts('', '', '', '', $nuevafecha, $fecha);

foreach($datos as $obj){
	$result = buscaReceipt_receipts($obj['Receipt']);
	if ($result->num_rows == 0) {
		$weight = substr($obj['Weight'], 0, 4);
		$volume = substr($obj['Volume'], 0, 4);
		$weightvol = substr($obj['WeightVol'], 0, 4);

		if ($obj['AgentID'] == ''){
			$agenteid =0;
		} else {
			$agenteid = $obj['AgentID'];
		}
		insertaReceipt($obj['Receipt'], $obj['Date'], $obj['ShipperID'], $obj['Shipper'], $obj['ConsigneeID'], $obj['Consignee'], $agenteid, $obj['Agent'], $obj['Pieces'], $weight, $volume, $weightvol, $obj['ItemDescription'], $obj['Notes'], $obj['CountryID'], 0, 0, 0, 0, 0, 0);
	}
}
?>