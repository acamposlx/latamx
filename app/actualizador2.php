<?php
include('admin/conexion.php');
include('admin/funciones/funciones.php');
include('admin/funciones/funciones_servicios.php');
include('admin/funciones/funciones_comunes.php');
$resultadosinins = embarquessinins();
if ($resultadosinins->num_rows > 0) {
  while($row = $resultadosinins->fetch_assoc()) {


$sqltr = "select * from tracking where receipt = ".$row["receipt"]." order by date desc LIMIT 1";
$resultadotrackingreceipt = $conn->query($sqltr);

if ($resultadotrackingreceipt->num_rows > 0) {
    // output data of each row
    while($rowrt = $resultadotrackingreceipt->fetch_assoc()) {
      $trackingreceipt =  tracking($row["receipt"], $rowrt["Date"], "02/28/2017");
      foreach($trackingreceipt as $tr){
        if (isset($tr["ID"])){
          $resultadoTracking = buscaTracking_ID($tr["ID"]);
          if ($resultadoTracking->num_rows == 0) {
            insertaTracking($tr["ID"], $tr["Box"], $tr["Date"], $tr["Time"], $tr["Note"], $tr["Status"], $tr["Operator"], $tr["Tracking"], $row["receipt"]);
          }
        } else {
          for($j = 0; $j<count($tr); $j++){
            if(isset($tr[$j]["ID"])){
              $resultadoTracking = buscaTracking_ID($tr[$j]["ID"]);
              if ($resultadoTracking->num_rows == 0) {
                insertaTracking($tr[$j]["ID"], $tr[$j]["Box"], $tr[$j]["Date"], $tr[$j]["Time"], $tr[$j]["Note"], $tr[$j]["Status"], $tr[$j]["Operator"], $tr[$j]["Tracking"], $row["receipt"]);
              }
            }
          }
      }
    }
}
}
    /*
    $trackingreceipt =  tracking($row["receipt"], "01/01/2000", "02/28/2017");
    foreach($trackingreceipt as $tr){

      if (isset($tr["ID"])){
        $resultadoTracking = buscaTracking_ID($tr["ID"]);
        if ($resultadoTracking->num_rows == 0) {
          insertaTracking($tr["ID"], $tr["Box"], $tr["Date"], $tr["Time"], $tr["Note"], $tr["Status"], $tr["Operator"], $tr["Tracking"], $row["receipt"]);
        }
      } else {


          for($j = 0; $j<count($tr); $j++){
                    if(isset($tr[$j]["ID"])){
            $resultadoTracking = buscaTracking_ID($tr[$j]["ID"]);
            if ($resultadoTracking->num_rows == 0) {
              insertaTracking($tr[$j]["ID"], $tr[$j]["Box"], $tr[$j]["Date"], $tr[$j]["Time"], $tr[$j]["Note"], $tr[$j]["Status"], $tr[$j]["Operator"], $tr[$j]["Tracking"], $row["receipt"]);
            }
          }

        }

      }
    }
    $instruccionesServicio = instrucciones($row["receipt"]);
    foreach ($instruccionesServicio as $is) {

      if(isset($is['Code'])){
        //validar si las instrucciones existen
        $resultadoins=buscaInstrucciones($is['Code']);
        if ($resultadoins->num_rows == 0) {
          insertaInstrucciones($is['Code'], $is['Author'], $is['Type'], $is['Insurance'], $is['InsuranceAmount'], $is['Payment'], $is['Code']);
          actualizainsreceipt($is['Code']);
        }
      }
    }*/
  }
}
$conn->close();
 ?>
