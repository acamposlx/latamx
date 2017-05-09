<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
date_default_timezone_set('Europe/Bucharest');
require_once('admin/conexion.php');
require_once('lib/nusoap.php');


function obj2array($obj) {
  $out = array();
  foreach ($obj as $key => $val) {
    switch(true) {
        case is_object($val):
         $out[$key] = obj2array($val);
         break;
      case is_array($val):
         $out[$key] = obj2array($val);
         break;
      default:
        $out[$key] = $val;
    }
  }
  return $out;
}
$sql = "SELECT * FROM receipts where entregado =0 or entregado is null";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $servicio="http://latam-cargo.com.ve/WSGetReceiptTracking.svc?wsdl"; //url del servicio
      $parametros=array(); //parametros de la llamada
      $parametros['receiptb']=$row["receipt"];
      $client = new SoapClient($servicio, $parametros);
      $resultado = $client->listaTracking($parametros);
      $resultado = obj2array($resultado);
      if (isset($resultado['listaTrackingResult']['Entidades.ClsTracking'])){
        $Consigna=$resultado['listaTrackingResult']['Entidades.ClsTracking'];
        $n=count($Consigna);
        for($i=0; $i<$n; $i++){
          $consigna=$Consigna[$i];
          $Note=$consigna['Note'];
          $Receipt=$row["receipt"];
          $Status=$consigna['Status'];
            if ($Note=="SERVICE: In - Out"){
              $sqlU = "UPDATE receipts SET embarcado=1 WHERE receipt=".$Receipt;
              if ($conn->query($sqlU) === TRUE) {
                echo "Record updated successfully";
              } else {
                echo "Error updating record: " . $conn->error;
              }
              $sqlU2 = "UPDATE receipts SET entregado=1 WHERE receipt=".$Receipt;
              if ($conn->query($sqlU2) === TRUE) {
                echo "Record updated successfully";
              } else {
                echo "Error updating record: " . $conn->error;
              }
            }


            if ($Status=="LEFT WAREHOUSE"){
              $sqlU = "UPDATE receipts SET embarcado=1 WHERE receipt=".$Receipt;
              if ($conn->query($sqlU) === TRUE) {
                echo "Record updated successfully";
              } else {
                echo "Error updating record: " . $conn->error;
              }
            }


            if ($Status=="ENTREGADO!"){
              $sqlU = "UPDATE receipts SET entregado=1 WHERE receipt=".$Receipt;
              if ($conn->query($sqlU) === TRUE) {
                echo "Record updated successfully";
              } else {
                echo "Error updating record: " . $conn->error;
              }
            }

            if ($Status=="ENTREGADO"){
              $sqlU = "UPDATE receipts SET entregado=1 WHERE receipt=".$Receipt;
              if ($conn->query($sqlU) === TRUE) {
                echo "Record updated successfully";
              } else {
                echo "Error updating record: " . $conn->error;
              }
            }
        }
      }
    }
} 
$conn->close();
?>