<?php  
include('funciones/funciones.php');
include('funciones/funciones_comunes.php');
include('funciones/funciones_servicios.php');


$track = tracking(17850, "01/01/2000", "02/10/2017");
foreach($track as $tr){
	$ultimos3 = substr($tr[0]["Box"],-3); 
	foreach ($tr as $t) {
		if (substr($t["Box"],-3) == $ultimos3){
			$existe = buscaTracking_ID($t['ID']);
			if ($existe->num_rows == 0) {
				insertaTracking($t['ID'], $t['Box'], $t['Date'], $t['Time'], $t['Note'], $t['Status'], $t['Operator'], $t['Tracking'], 17850);
				if($t['Status'] == 'ENTREGADO!'){
					entrega_receipt(17850);
				}
			}
		}
	}
}

echo "proceso finalizado";
?>
