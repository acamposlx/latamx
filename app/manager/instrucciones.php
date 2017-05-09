<?php
include('funciones/funciones.php');
include('funciones/funciones_comunes.php');
include('servicios/WSGetShippingInstruction.php');
$resultado = receipts_no_ins();
if ($resultado->num_rows > 0) {
	while($row = $resultado->fetch_assoc()) {
		$registros[] = $row;
	}
	for($i = 0; $i < $resultado->num_rows; $i += 20){
		$resultado2 = receipts_no_ins_limit($i);
		if ($resultado2->num_rows > 0) {
			while($row2 = $resultado2->fetch_assoc()) {
				$resultado3 = buscaInstrucciones($row2["receipt"]);
				if ($resultado3->num_rows == 0) {
					$instru = instruccion($row2["receipt"], '');
					insertaInstrucciones($instru['Code'], $instru['Author'], $instru['Type'], $instru['Insurance'], $instru['InsuranceAmount'], $instru['Payment'], $row2["receipt"]);
					actualizainsreceipt($row2["receipt"]);
				}
			}
		}
		sleep(5);
	}
}
?>