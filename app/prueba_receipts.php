<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
include_once('admin/conexion.php');
include('servicios/WSGetReceipts.php');
include('admin/funciones/funciones_comunes.php');
$fecha = date('m/j/Y');
$nuevafecha = strtotime ( '-3 day' , strtotime ( $fecha ) ) ;
$nuevafecha = date ( 'm/j/Y' , $nuevafecha );
$receiptss = receipts('', '', '', '', $nuevafecha, $fecha);
//print_r($receiptss);

foreach($receiptss as $r){
  $sql = "SELECT receipt FROM receipts where receipt=".$r['Receipt'];
  $result = $conn->query($sql);
  if ($result->num_rows == 0) {
    $weight = substr($r['Weight'], 0, 4);
    $volume = substr($r['Volume'], 0, 4);
    $weightvol = substr($r['WeightVol'], 0, 4);
    $sqlI= "insert into receipts (receipt, date, shipperid, shipper, consigneeid, consignee, agentid, agent, pieces, weight, volume, weightvol, itemdescription, notes, countryid, instrucciones, entregado, embarcado, servicio, documento, reempacado) VALUES ('".$r['Receipt']."', '".$r['Date']."', '".$r['ShipperID']."', '".$r['Shipper']."', '".$r['ConsigneeID']."', '".$r['Consignee']."', '".$r['AgentID']."', '".$r['Agent']."', '".$r['Pieces']."', '".$weight."', '".$volume."', '".$weightvol."', '".$r['ItemDescription']."', '".$r['Notes']."', '".$r['CountryID']."',0,0,0,0,0,0)";
    if ($conn->query($sqlI) === TRUE) {
      echo "New record created successfully ".$r['Receipt'];
      echo "<br>";
    } else {
      echo "Error: " . $sqlI . "<br>" . $conn->error;
    }
  }
}
$conn->close();
?>



