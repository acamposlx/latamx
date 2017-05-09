<?php  
include('funciones/funciones_comunes.php');
include('funciones/funciones.php');
include('funciones/funciones_servicios.php');
$receipts = receiptsindoc();

foreach ($receipts as $r){
	$documento = documentos($r);

	if (isset($documento[0]['DocName'])){
		guardadocreceipt($r, $documento[0]['DocName']);
		actualizadocreceipt2($r);
		echo "listo" .$documento[0]['DocName'];
		echo "<br>";
	} else {
		foreach ($documento[0] as $d) {
			guardadocreceipt($r, $d['DocName']);
			actualizadocreceipt2($r);
			echo "listo" .$d['DocName'];
			echo "<br>";
		}
	}
}
/*
$documento = documentos(17158);


*/

?>

