<?php
include('admin/funciones/funciones.php');
include('admin/funciones/funciones_servicios.php');
include('admin/funciones/funciones_comunes.php');
$resultadoporconsignatario = receipts_total();
$resultadocons = $resultadoporconsignatario;
if ($resultadocons->num_rows > 0) {
    while($row = $resultadocons->fetch_assoc()) {
      $result2 = buscaReceiptsStephy($row["receipt"]);
      if ($result2->num_rows > 0) {
            while($row2 = $result2->fetch_assoc()) {
                if($row["consigneeid"] <> $row2["consigneeid"]){
                  actualiza_consigna_receipt($row2["consigneeid"], $row2["consignee"], $row["receipt"]);
                }
                if($row["shipperid"] <> $row2["shipperid"]){
                  actualiza_shipper_receipt($row2["shipperid"], $row2["shipper"], $row["receipt"]);
                }
                if($row["agentid"] <> $row2["agentid"]){
                  actualiza_agente_receipt($row2["agentid"], $row2["agent"], $row["receipt"]);
                }
                if($row["weight"] <> $row2["weight"]){
                  actualiza_peso_receipt($row2["weight"], $row["receipt"]);
                }
                if($row["volume"] <> $row2["volume"]){
                  actualiza_volumen_receipt($row2["volume"], $row["receipt"]);
                }
                if($row["weightvol"] <> $row2["weightvol"]){
                  actualiza_pesovolumen_receipt($row2["weightvol"], $row["receipt"]);
                }
                if($row["itemdescription"] <> $row2["itemdescription"]){
                  actualiza_descripcion_receipt($row2["itemdescription"], $row["receipt"]);
                }
                if($row["notes"] <> $row2["notes"]){
                  actualiza_notas_receipt($row2["notes"], $row["receipt"]);
                }
                if($row["pieces"] <> $row2["pieces"]){
                  actualiza_piezas_receipt($row2["pieces"], $row["receipt"]);
                }
            }
        }
    }
}

borrarReceipts();
 ?>
