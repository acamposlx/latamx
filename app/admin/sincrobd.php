<?php
ini_set('max_execution_time', 300);
include('funciones/funciones_comunes.php');
include('funciones/funciones_servicios.php');
include('funciones/funciones.php');
//buscar todos los receipts e insertarlos en receipts_stephy
$receipts = receipts2("01/01/2000", "02/28/2017");

foreach ($receipts as $r) {
	$brs = buscaReceiptsStephy2($r['Receipt']);
	if ($brs->num_rows == 0) {
		$weight = substr($r['Weight'], 0, 4);
		$volume = substr($r['Volume'], 0, 4);
		$weightvol = substr($r['WeightVol'], 0, 4);

		insertaReceiptStephy2($r['Receipt'], $r['Date'], $r['ShipperID'], $r['Shipper'], $r['ConsigneeID'], $r['Consignee'], $r['AgentID'], $r['Agent'], $r['Pieces'], $weight, $volume, $weightvol, $r['ItemDescription'], $r['Notes'], $r['CountryID'], 0, 0, 0, 0, 0, 0);
	}	
}
?>