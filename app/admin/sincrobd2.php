<?php
include('funciones/funciones_comunes.php');
include('funciones/funciones_servicios.php');
include('funciones/funciones.php');
//buscar todos los receipts e insertarlos en receipts_stephy
$receipts = receipts_total();
if ($receipts->num_rows > 0) {
    while($row = $receipts->fetch_assoc()) {
        $receiptss = buscaReceiptsStephy2($row["receipt"]);
        if ($receiptss->num_rows > 0) {
            while($row2 = $receiptss->fetch_assoc()) {
                if ($row["consigneeid"] != $row2["consigneeid"]){
                    actualiza_consigna_receipt($row2["consigneeid"], $row2["consignee"], $row["receipt"]);
                }
                if ($row["agentid"] != $row2["agentid"]){
                    actualiza_agente_receipt($row2["agentid"], $row2["agent"], $row["receipt"]);
                }
                if ($row["shipperid"] != $row2["shipperid"]){
                    actualiza_shipper_receipt($row2["shipperid"], $row2["shipper"], $row["receipt"]);
                }
                if ($row["pieces"] != $row2["pieces"]){
                    actualiza_piezas_receipt($row2["pieces"], $row["receipt"]);
                }
                if ($row["weight"] != $row2["weight"]){
                    actualiza_peso_receipt($row2["weight"], $row["receipt"]);
                }
                if ($row["weightvol"] != $row2["weightvol"]){
                    actualiza_pesovolumen_receipt($row2["weightvol"], $row["receipt"]);
                }
                if ($row["volume"] != $row2["volume"]){
                    actualiza_volumen_receipt($row2["volume"], $row["receipt"]);
                }
                if($row["itemdescription"] <> $row2["itemdescription"]){
                   actualiza_descripcion_receipt($row2["itemdescription"], $row["receipt"]);
                }
                if($row["notes"] <> $row2["notes"]){
                   actualiza_notas_receipt($row2["notes"], $row["receipt"]);
                }


            }
        } else {
            borrarReceipts($row["receipt"]);
            echo "receipt borrado " .$row["receipt"];
            echo "<br>";
        }
    }
}

?>
