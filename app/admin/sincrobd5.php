<?php  
include('funciones/funciones_comunes.php');
include('funciones/funciones.php');
include('funciones/funciones_servicios.php');
$receipts = receipts_no_entregado();

foreach ($receipts as $r){
	if ($r['Status']=='ENTREGADO!'){
		entrega_receipt($r['receipt']);
		echo "entregado ".$r['receipt'];
		echo "<br>";
		echo "<br>";
	}
}
/*
$documento = documentos(17158);


*/

?>


