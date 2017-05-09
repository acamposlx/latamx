<?php
function receipts_no_entregados(){
  include('conexion.php');
  $sql = "select * from receipts where entregado = 0";
  $result = mysqli_query($conn, $sql);
  $conn->close();
  while($row = $result->fetch_assoc()) {
    $rows[] = $row;
  }
  return $rows;

}



function insertaReceiptStephy2($receipt, $date, $shipperid, $shipper, $consigneeid, $consignee, $agentid, $agent, $pieces, $weight, $volume, $weightvol, $itemdescription, $notes, $countryid, $instrucciones, $entregado, $embarcado, $servicio, $documento, $reempacado){
  include('conexion.php');
  $sqlI = "insert into receipts_stephy (receipt, date, shipperid, shipper, consigneeid, consignee, agentid, agent, pieces, weight, volume, weightvol, itemdescription, notes, countryid, instrucciones, entregado, embarcado, servicio, documento, reempacado) VALUES ('".$receipt."', '".$date."', '".$shipperid."', '".$shipper."', '".$consigneeid."', '".$consignee."', '".$agentid."', '".$agent."', '".$pieces."', '".$weight."', '".$volume."', '".$weightvol."', '".$itemdescription."', '".$notes."', '".$countryid."', 0, 0, 0, 0, 0, 0)";
  if ($conn->query($sqlI) === TRUE) {
    } else {
      echo "Error: " . $sqlI . "<br>" . $conn->error;
  }
  $conn->close();
}


function actualizadocreceipt2($receipt){
  include('conexion.php');
  $sql = "update receipts set documento = 1 where receipt = ".$receipt;
  if ($conn->query($sql) === TRUE) {
    
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $conn->close();
}


function receipts_no_ins2(){
  include('conexion.php');
  $sql = "SELECT * FROM receipts where instrucciones = 0 ";
  $result = mysqli_query($conn, $sql);
  $conn->close();
  return $result;
}











function buscaTracking($receipt){
  include('admin/conexion.php');
  $sql = "select * from tracking where receipt = ".$receipt." ORDER BY Box, ID+0 ASC";

  $result = $conn->query($sql);
  return $result;
  $conn->close();
}






function entrega_receipt($receipt){
  include('conexion.php');
  $sqlU = "UPDATE receipts SET entregado=1 WHERE receipt=".$receipt;
  if ($conn->query($sqlU) === TRUE) {
  } else {
      echo "Error updating record: " . $conn->error;
  }
    $conn->close();
}


function entrega_receipt2($receipt){
  include('admin/conexion.php');
  $sqlU = "UPDATE receipts SET entregado=1 WHERE receipt=".$receipt;
  if ($conn->query($sqlU) === TRUE) {
  } else {
      echo "Error updating record: " . $conn->error;
  }
    $conn->close();
}



function tracking_receipt_date ($receipt){
  include('conexion.php');

  $sql = "  select date from tracking where receipt = ".(int)$receipt." order by date desc limit 1";
  $result = $conn->query($sql);
  if ($result->num_rows > 0){
    // output data of each row
      while($row = $result->fetch_assoc()){
        $resultados[] = $row["date"];
      }
  }
  $conn->close();
  return $resultados;
}




function receipts_no_entregado(){
  include_once('conexion.php');
  $sql = "SELECT tracking.ID, tracking.Box, tracking.Date, tracking.Time, tracking.Note, tracking.`Status`, tracking.Operator, tracking.Tracking, tracking.receipt FROM tracking INNER JOIN receipts ON tracking.receipt = receipts.receipt WHERE receipts.entregado = 0";
  $result = $conn->query($sql);
  if ($result->num_rows > 0){
    // output data of each row
      while($row = $result->fetch_assoc()){
        $resultados[] = $row;
      }
  }
  else
  {
      echo "0 results";
  }
  $conn->close();

return $resultados;
}

function receipts_no_ins_limit($posicion){
  include('../admin/conexion.php');
  $sql = "select receipt from receipts where instrucciones=0 limit " .$posicion. ", 20";
  $result = mysqli_query($conn, $sql);
  $conn->close();
  return $result;
}


function receipts_no_ins(){
  include('../admin/conexion.php');
  $sql = "SELECT * FROM receipts where instrucciones = 0 ";
  $result = mysqli_query($conn, $sql);
  $conn->close();
  return $result;
}




function embarquespendientes($consigna){
  include('admin/conexion.php');
  $sqlPendientes = "SELECT * FROM receipts where instrucciones = 0 and reempacado = 0 and consigneeid=".$consigna." order by receipt desc";
  $resultPendientes = mysqli_query($conn, $sqlPendientes);
  $conn->close();
  return $resultPendientes;
}





function embarqueshold($consigna){
include('admin/conexion.php');
  $sqlPendientes = "SELECT * FROM receipts INNER JOIN instructions ON receipts.receipt = instructions.receipt WHERE instructions.type = 'Hold' AND entregado = 0 AND receipts.consigneeid = ".$consigna." ORDER BY receipts.receipt DESC";
  $resultPendientes = mysqli_query($conn, $sqlPendientes);
  $conn->close();
  return $resultPendientes;
}






function embarquessinins(){
  include('admin/conexion.php');
  $sqlPendientes = "SELECT * FROM receipts where instrucciones = 0";
  $resultPendientes = mysqli_query($conn, $sqlPendientes);
  $conn->close();
  return $resultPendientes;
}



function receiptsindoc(){
  include_once('conexion.php');
  $sql = "select receipt from receipts where documento = 0 and receipt > 17158";
  $result = $conn->query($sql);
  if ($result->num_rows > 0){
  	// output data of each row
      while($row = $result->fetch_assoc()){
        $resultados[] = $row["receipt"];
      }
  }
  else
  {
      echo "0 results";
  }
  $conn->close();

return $resultados;
}

function guardadocreceipt($receipt, $doc){
  include('conexion.php');
  $sql = "insert into documentosreceipt (receipt, documento) values ('".$receipt."', '".$doc."')";
  if ($conn->query($sql) === TRUE) {
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $conn->close();
}


function actualizadocreceipt($receipt){
  include('admin/conexion.php');
  $sql = "update receipts set documento = 1 where receipt = ".$receipt;
  if ($conn->query($sql) === TRUE) {
    
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $conn->close();
}

function insertaReceiptStephy($receipt, $date, $shipperid, $shipper, $consigneeid, $consignee, $agentid, $agent, $pieces, $weight, $volume, $weightvol, $itemdescription, $notes, $countryid, $instrucciones, $entregado, $embarcado, $servicio, $documento, $reempacado){
	include('admin/conexion.php');
	$sqlI = "insert into receipts_stephy (receipt, date, shipperid, shipper, consigneeid, consignee, agentid, agent, pieces, weight, volume, weightvol, itemdescription, notes, countryid, instrucciones, entregado, embarcado, servicio, documento, reempacado) VALUES ('".$receipt."', '".$date."', '".$shipperid."', '".$shipper."', '".$consigneeid."', '".$consignee."', '".$agentid."', '".$agent."', '".$pieces."', '".$weight."', '".$volume."', '".$weightvol."', '".$itemdescription."', '".$notes."', '".$countryid."', 0, 0, 0, 0, 0, 0)";
	if ($conn->query($sqlI) === TRUE) {
		} else {
    	echo "Error: " . $sqlI . "<br>" . $conn->error;
	}
	$conn->close();
}

function insertaReceipt($receipt, $date, $shipperid, $shipper, $consigneeid, $consignee, $agentid, $agent, $pieces, $weight, $volume, $weightvol, $itemdescription, $notes, $countryid, $instrucciones, $entregado, $embarcado, $servicio, $documento, $reempacado){
	include('../admin/conexion.php');
	$sqlI = "insert into receipts (receipt, date, shipperid, shipper, consigneeid, consignee, agentid, agent, pieces, weight, volume, weightvol, itemdescription, notes, countryid, instrucciones, entregado, embarcado, servicio, documento, reempacado) VALUES ('".$receipt."', '".$date."', '".$shipperid."', '".$shipper."', '".$consigneeid."', '".$consignee."', '".$agentid."', '".$agent."', '".$pieces."', '".$weight."', '".$volume."', '".$weightvol."', '".$itemdescription."', '".$notes."', '".$countryid."', 0, 0, 0, 0, 0, 0)";
	if ($conn->query($sqlI) === TRUE) {
		} else {
    	echo "Error: " . $sqlI . "<br>" . $conn->error;
	}
	$conn->close();
}


function borrarReceipts($receipt){
  include('conexion.php');
  $sqlD = "DELETE FROM receipts WHERE receipt=".$receipt;
  if ($conn->query($sqlD) === TRUE) {
    echo "Record deleted successfully".$row["receipt"];
    echo "<br>";
  } else {
    echo "Error deleting record: " . $conn->error;
  }
  $conn->close();
}




function buscaTracking_ID2($id){
  ini_set('max_execution_time', 300);
  include('admin/conexion.php');
  $sql = "select * from tracking where ID=".$id;
  $resultado = $conn->query($sql);
  $cantidad = $resultado->num_rows;
  $conn->close();
  return $cantidad;
}











function buscaTracking_ID($id){
  include('admin/conexion.php');
  $sql = "select * from tracking where ID=".$id;
  $resultado = $conn->query($sql);
  $conn->close();
  return $resultado;
}



function buscaReceipt_receipts($receipt){
  include('conexion.php');
  $sql = "select * from receipts where receipt=".$receipt;
  $resultado = $conn->query($sql);
  $conn->close();
  return $resultado;
}

function buscaReceiptsStephy2($receipt){
  include('conexion.php');
  $sql = "select * from receipts_stephy where receipt=".$receipt;
  $resultado = $conn->query($sql);
  $conn->close();
  return $resultado;
}



function buscaReceiptsStephy($receipt){
  include('admin/conexion.php');
  $sql = "select * from receipts_stephy where receipt=".$receipt;
  $resultado = $conn->query($sql);
  $conn->close();
  return $resultado;
}


function buscaInstrucciones2($receipt){
  include('conexion.php');
  $sqlparains = "select * from instructions where receipt = ".$receipt;
  
  $resultadoins = $conn->query($sqlparains);
  $conn->close();
  return $resultadoins;
}



function buscaInstrucciones($receipt){
  include('conexion.php');
  $sqlparains = "select * from instructions where receipt = ".$receipt;
  
  $resultadoins = $conn->query($sqlparains);
  $conn->close();
  return $resultadoins;
}



function insertaInstrucciones2($code, $author, $type, $insurance, $insuranceammount, $payment, $receipt){
  include('conexion.php');
  $sql = "insert into instructions (code, author, type, insurance, insuranceammount, payment, receipt) VALUES ('".$code."', '".$author."', '".$type."', '".$insurance."', '".$insuranceammount."', '".$payment."', '".$receipt."')";
  if ($conn->query($sql) === TRUE) {
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $conn->close();

}






function insertaInstrucciones($code, $author, $type, $insurance, $insuranceammount, $payment, $receipt){
  include('conexion.php');
  $sql = "insert into instructions (code, author, type, insurance, insuranceammount, payment, receipt) VALUES ('".$code."', '".$author."', '".$type."', '".$insurance."', '".$insuranceammount."', '".$payment."', '".$receipt."')";
  if ($conn->query($sql) === TRUE) {
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $conn->close();

}



function insertaTracking2($ID, $Box, $Date, $Time, $Note, $Status, $Operator, $Tracking, $receipt){
  include('admin/conexion.php');
  $sql = "insert into tracking (ID, Box, Date, Time, Note, Status, Operator, Tracking, receipt) VALUE ('".$ID."', '".$Box."', '".$Date."', '".$Time."', '".$Note."', '".$Status."', '".$Operator."', '".$Tracking."', '".$receipt."')";
  if ($conn->query($sql) === TRUE) {
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $conn->close();

}






function insertaTracking($ID, $Box, $Date, $Time, $Note, $Status, $Operator, $Tracking, $receipt){
    ini_set('max_execution_time', 300);
  include('admin/conexion.php');
  $sql = "insert into tracking (ID, Box, Date, Time, Note, Status, Operator, Tracking, receipt) VALUE ('".$ID."', '".$Box."', '".$Date."', '".$Time."', '".$Note."', '".$Status."', '".$Operator."', '".$Tracking."', '".$receipt."')";
  if ($conn->query($sql) === TRUE) {
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $conn->close();

}


function actualizainsreceipt2($receipt){
  include('conexion.php');
  $sql = "update receipts set instrucciones = 1 where receipt = ".$receipt;
  echo $sql;
  if ($conn->query($sql) === TRUE) {
    
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $conn->close();
}




function actualizainsreceipt($receipt){
  include('conexion.php');
  $sql = "update receipts set instrucciones = 1 where receipt = ".$receipt;
  echo $sql;
  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $conn->close();
}

function receipts_consignatario($consigna){
  include('admin/conexion.php');
  $sql1 = "select * from receipts where consigneeid=".$consigna;
  $result = $conn->query($sql1);
  $conn->close();
  return $result;
}


function receipts_total(){
  include('conexion.php');
  $sql1 = "select * from receipts";
  $result = $conn->query($sql1);
  $conn->close();
  return $result;
}




function actualiza_consigna_receipt($id, $consigna, $receipt){
  include('conexion.php');
  $sqlU = "UPDATE receipts SET consigneeid=".$id.", consignee = '".$consigna."' WHERE receipt=".$receipt;
  if ($conn->query($sqlU) === TRUE) {
  } else {
      echo "Error updating record: " . $conn->error;
  }
    $conn->close();
}



function actualiza_shipper_receipt($id, $consigna, $receipt){
  include('conexion.php');
  $sqlU = "UPDATE receipts SET shipperid=".$id.", shipper = '".$consigna."' WHERE receipt=".$receipt;
  if ($conn->query($sqlU) === TRUE) {
  } else {
      echo "Error updating record: " . $conn->error;
  }
    $conn->close();
}



function actualiza_piezas_receipt($piezas, $receipt){
  include('conexion.php');

  $sqlU = "UPDATE receipts SET pieces='".$piezas."' WHERE receipt=".$receipt;
  if ($conn->query($sqlU) === TRUE) {
  } else {
      echo "Error updating record: " . $conn->error;
  }
    $conn->close();
}

function actualiza_peso_receipt($peso, $receipt){
  include('conexion.php');

  $sqlU = "UPDATE receipts SET weight=".$peso." WHERE receipt=".$receipt;
  if ($conn->query($sqlU) === TRUE) {

  } else {
      echo "Error updating record: " . $conn->error;
  }
    $conn->close();
}




function actualiza_agente_receipt($id, $agente, $receipt){
  include('conexion.php');


  $sqlU = "UPDATE receipts SET agentid=".$id.", agent = '".$agente."' WHERE receipt=".$receipt;
  if ($conn->query($sqlU) === TRUE) {
  } else {
      echo "Error updating record: " . $conn->error;
  }
    $conn->close();
}




function actualiza_volumen_receipt($volumen, $receipt){
  include('conexion.php');
  $sqlU = "UPDATE receipts SET volume=".$volumen." WHERE receipt=".$receipt;
  if ($conn->query($sqlU) === TRUE) {
  } else {
      echo "Error updating record: " . $conn->error;
  }
    $conn->close();
}

function actualiza_pesovolumen_receipt($pesovolumen, $receipt){
  include('conexion.php');
  $sqlU = "UPDATE receipts SET weightvol=".$pesovolumen." WHERE receipt=".$receipt;
  if ($conn->query($sqlU) === TRUE) {
  } else {
      echo "Error updating record: " . $conn->error;
  }
    $conn->close();
}





function actualiza_descripcion_receipt($descripcion, $receipt){
  include('conexion.php');
  $sqlU = "UPDATE receipts SET itemdescription='".$descripcion."' WHERE receipt=".$receipt;
   if ($conn->query($sqlU) === TRUE) {
   } else {
       echo "Error updating record: " . $conn->error;
   }
    $conn->close();
}


function actualiza_notas_receipt($nota, $receipt){
  include('conexion.php');
  $sqlU = "UPDATE receipts SET notes='".$nota."' WHERE receipt=".$receipt;
  if ($conn->query($sqlU) === TRUE) {
  } else {
      echo "Error updating record: " . $conn->error;
  }
    $conn->close();
}





?>
