<?php
include_once('conexion.php');
require_once('../lib/nusoap.php');


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



$sql = "SELECT * FROM receipts where entregado = 0 or entregado is null";
$result = $conn->query($sql);


while($row = mysqli_fetch_assoc($result))
{

	/*
	$servicio="http://latam-cargo.com.ve/WSGetReceiptTracking.svc?wsdl"; //url del servicio
	$parametros=array(); //parametros de la llamada
	$parametros['receiptb']=$row["receipt"];
	$client = new SoapClient($servicio, $parametros);
	$resultado = $client->listaTracking($parametros);//llamamos al métdo que nos interesa con los parámetros
	$resultado = obj2array($resultado);
	if (isset($resultado['listaTrackingResult']['Entidades.ClsTracking'])){
		$Consigna=$resultado['listaTrackingResult']['Entidades.ClsTracking'];
       	$n=count($Consigna);
       	for($i=0; $i<$n; $i++){
       		$consigna=$Consigna[$i];
			$sqlTrack = "select * from tracking where ID = ".$consigna['ID'];
			$resultTrack = $conn->query($sqlTrack);
			if ($resultTrack->num_rows == 0) {
				$sqlIn = "INSERT INTO tracking (ID, Box, Date, Time, Note, Status, Operator, Tracking, receipt) VALUES ('".$consigna['ID']."', '".$consigna['Box']."', '".$consigna['Date']."', '".$consigna['Time']."', '".$consigna['Note']."', '".$consigna['Status']."', '".$consigna['Operator']."', '".$consigna['Tracking']."', ".$row["receipt"].")";
					if ($conn->query($sqlIn) === TRUE) {
    						} else {
    						}        			
				}
			}
		} */
	$sql2 = "SELECT * FROM tracking where receipt=".$row["receipt"];
	$result2 = $conn->query($sql2);
	while($row2 = mysqli_fetch_assoc($result2))
	{
		if ($row2['Note']=='SERVICE: In - Out'){
			$sqlU = "UPDATE receipts set entregado=1 where receipt = ".$row2['receipt'];
			if ($conn->query($sqlU) === TRUE) {
			} else {
				echo "Error updating record: " . $conn->error;
				echo "<br>";
			}
		}

		if ($row2['Status']=='ENTREGADO'){
			$sqlU = "UPDATE receipts set entregado=1 where receipt = ".$row2['receipt'];
			if ($conn->query($sqlU) === TRUE) {
			} else {
		    	echo "Error updating record: " . $conn->error;
				echo "<br>";
			}
		}

		if ($row2['Status']=='ENTREGADO!'){
			$sqlU = "UPDATE receipts set entregado=1 where receipt = ".$row2['receipt'];
			if ($conn->query($sqlU) === TRUE) {
			} else {
    			echo "Error updating record: " . $conn->error;
		    	echo "<br>";
			}
		}
		if ($row2['Status'] == "DELIVERED CUSTOMER MIAMI")
		{
			$sqlU = "UPDATE receipts set entregado=1 where receipt = ".$row2['receipt'];
			if ($conn->query($sqlU) === TRUE) {
			} else {
				echo "Error updating record: " . $conn->error;
		   		echo "<br>";
			}
	    }
	    if ($row2['Status'] == "LEFT WAREHOUSE")
	    {
			$sqlU = "UPDATE receipts set embarcado=1 where receipt = ".$row2['receipt'];
			if ($conn->query($sqlU) === TRUE) {
			} else {
				echo "Error updating record: " . $conn->error;
				echo "<br>";
			}
		}
	}
}
?>