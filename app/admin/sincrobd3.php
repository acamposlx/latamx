<?php  
include('funciones/funciones.php');
include('funciones/funciones_comunes.php');
include('funciones/funciones_servicios.php');
$rni = receipts_no_ins2();
if ($rni->num_rows > 0) {
    while($row = $rni->fetch_assoc()) {
        $ins = instrucciones($row['receipt']);
        foreach ($ins as $in) {
            if (isset($in['Code'])){
                $bi = buscaInstrucciones2($in['Code']);
                if ($bi->num_rows == 0) {
                    insertaInstrucciones2($in['Code'], $in['Author'], $in['Type'], $in['Insurance'], $in['InsuranceAmount'], $in['Payment'], $in['Code']);
                    actualizainsreceipt2($in['Code']);
                }
            }
        }
    }
}
echo "fin proceso";
?>
