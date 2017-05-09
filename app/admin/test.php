<?php
include('funciones/funciones.php');
include('funciones/funciones_comunes.php');
include('../servicios/WSGetReceiptTracking.php');
$embarques = receipts_no_entregados();
foreach ($embarques as $e) {
	$ultimafecha = tracking_receipt_date($e['receipt']);
	echo $ultimafecha[0];
	$tracking = tracking($e['receipt'], "", $ultimafecha, "02/28/2017");
	print_r($tracking);
	echo "<br>";
}
?>