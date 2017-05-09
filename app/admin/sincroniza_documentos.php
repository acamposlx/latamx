<?php
include('funciones/funciones.php');
include('funciones/funciones_servicios.php');
$embarques = receiptsindoc();


foreach ($embarques as $e) {
  $docs = documentos($e);
  foreach ($docs as $d) {
    if (count($d)==1){
      if(isset($d["DocName"])){
        guardadocreceipt($e, $d["DocName"]);
        actualizadocreceipt($e);
      }
    }
    if (count($d)>1){
      for($i=0; $i<count($d); $i++){
        guardadocreceipt($e, $d[$i]["DocName"]);
        actualizadocreceipt($e);
      }
    }
  }
}
?>
