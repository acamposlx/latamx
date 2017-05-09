<?php
include_once('admin/conexion.php');
require_once('lib/nusoap.php');
$sql = "SELECT receipt FROM receipts where documento =0 and receipt > 15525";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $servicio="http://latam-cargo.com.ve/WSGetDocuments.svc?wsdl"; //url del servicio
      $parametros=array(); //parametros de la llamada
      $parametros['receipt']=$row["receipt"];

      $client = new SoapClient($servicio, $parametros);
      $resultado = $client->DocumentosReceipt($parametros);//llamamos al métdo que nos interesa con los parámetros

      $resultado = obj2array($resultado);
      if (isset($resultado['DocumentosReceiptResult']['Entidades.Documentos'])){
        $Consigna=$resultado['DocumentosReceiptResult']['Entidades.Documentos'];
        $n=count($Consigna);
        if ($n > 0){
          for($i=0; $i<$n; $i++){
            if (isset($Consigna['docu'])){
              $sqlI = "INSERT INTO documentosreceipt (receipt, documento) VALUES (".$row["receipt"].", '".$Consigna['docu']."')";

              if ($conn->query($sqlI) === TRUE) {
                  echo "New record created successfully";
                  echo  "<br>";
              } else {
                  echo "Error: " . $sqlI . "<br>" . $conn->error;
              }
              $sqlU = "UPDATE receipts SET documento = 1 WHERE receipt = ".$row["receipt"];

              if ($conn->query($sqlU) === TRUE) {
                  echo "Record updated successfully";
              } else {
                  echo "Error updating record: " . $conn->error;
              }



            }
            else{
              $consigna=$Consigna[$i];
              $sqlI = "INSERT INTO documentosreceipt (receipt, documento) VALUES (".$row["receipt"].", '".$consigna['docu']."')";
              if ($conn->query($sqlI) === TRUE) {
                  echo "New record created successfully";
                  echo  "<br>";
              } else {
                  echo "Error: " . $sqlI . "<br>" . $conn->error;
              }

              $sqlU = "UPDATE receipts SET documento = 1 WHERE receipt = ".$row["receipt"];

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
} else {
    echo "0 results";
}
$conn->close();




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
?>
