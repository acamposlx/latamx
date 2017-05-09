<?php
session_start();
include_once('admin/conexion.php');
include('admin/funciones/funciones.php');
include('admin/funciones/funciones_servicios.php');
include('admin/funciones/funciones_comunes.php');
//echo "cargar nuevos receipts";
$datosreceipts = receipts($_SESSION['ConsigneeCode'], "01/01/2017", "02/28/2017");


foreach($datosreceipts as $objeto){
if(isset($objeto['Receipt'])){
if ($objeto['AgentID'] == ''){
    $agenteid2 =0;
  } else{
    $agenteid2 = $objeto['AgentID'];
  }
  $weight = substr($objeto['Weight'], 0, 4);
  $volume = substr($objeto['Volume'], 0, 4);
  $weightvol = substr($objeto['WeightVol'], 0, 4);
  $resultadox = buscaReceiptsStephy($objeto['Receipt']);
  if ($resultadox->num_rows == 0) {
    insertaReceiptStephy($objeto['Receipt'], $objeto['Date'], $objeto['ShipperID'], $objeto['Shipper'], $objeto['ConsigneeID'], $objeto['Consignee'], $agenteid2, $objeto['Agent'], $objeto['Pieces'], $weight, $volume, $weightvol, $objeto['ItemDescription'], $objeto['Notes'], $objeto['CountryID'], 0, 0, 0, 0, 0, 0);
  }
  $receipts = buscaReceipt_receipts($objeto['Receipt']);
  if ($receipts->num_rows == 0) {
    insertaReceipt($objeto['Receipt'], $objeto['Date'], $objeto['ShipperID'], $objeto['Shipper'], $objeto['ConsigneeID'], $objeto['Consignee'], $agenteid2, $objeto['Agent'], $objeto['Pieces'], $weight, $volume, $weightvol, $objeto['ItemDescription'], $objeto['Notes'], $objeto['CountryID'], 0, 0, 0, 0, 0, 0);
  }
}



}

  

$sql = "SELECT * FROM receipts where instrucciones = 0 and reempacado = 0 and consigneeid=".$_SESSION['ConsigneeCode']." order by receipt desc";
$result = $conn->query($sql);




$resultHold = embarqueshold($_SESSION['ConsigneeCode']);
$cantidadEmbarquesHold = mysqli_num_rows($resultHold);


$cantidad = $result->num_rows + $cantidadEmbarquesHold;


if ($cantidad > 0) {



    // output data of each row
    echo '<form id="formEmbarques" action="procesarEmbarques.php" method="post"><table class="table table-striped">';
    echo '<tr style="background-color:#004c96; color:#FFF;">';
    echo '<th>&nbsp;</th>';
    echo '<th class="titulos2">Recibo</th>';
    echo '<th class="titulos2">Fecha</th>';
    echo '<th class="titulos2">Shipper</th>';
    echo '<td class="titulos2" align="right">Piezas</td>';
    echo '<td class="titulos2" align="right">Peso</td>';
    echo '<td class="titulos2" align="right">Peso-Volumétrico</td>';
    echo '<td class="titulos2" align="right">Volúmen</td>';
    echo '<td>&nbsp;</th>';
    echo '</tr>';
    $checkEmbarque = "checkEmbarque[]";
    while($row = $result->fetch_assoc()) {
      $bi = instrucciones($row["receipt"]);
    
    foreach ($bi as $b) {
    if(isset($b['Code'])){
      $busca = buscaInstrucciones($b['Code']);
      if ($busca->num_rows == 0) {
        insertaInstrucciones($b['Code'], $b['Author'], $b['Type'], $b['Insurance'], $b['InsuranceAmount'], $b['Payment'], $b['Code']);
        actualizainsreceipt($b['Code']);
      }



      /**/

    }
      
      # code...
    }
      $cadena = $row["notes"];
      $resultadoxs = intval(preg_replace('/[^0-9]+/', '', $cadena), 10);

      if ($resultadoxs>0){
        $sqlparains = "select * from instructions where receipt = ".$resultadoxs;
        $resultadoins = $conn->query($sqlparains);
        if ($resultadoins->num_rows > 0) {
          while($rowIns = $resultadoins->fetch_assoc()) {
            $sqlprevio = "select * from instructions where receipt = ".$row["receipt"];
            $resultadoprevio = $conn->query($sqlprevio);
            if ($resultadoprevio->num_rows == 0) {
                $insertainstruc = "insert into instructions (code, author, type, insurance, insuranceammount, payment, receipt) values (".$rowIns["code"].", ".$rowIns["author"].", '".$rowIns["type"]."', '".$rowIns["insurance"]."', '".$rowIns["insuranceammount"]."', '".$rowIns["payment"]."', ".$row["receipt"].")";
                  if ($conn->query($insertainstruc) === TRUE) {
                  } else {
                  }
                $updatereceipt = "update receipts set instrucciones = 1 where receipt =".$row["receipt"];
                if ($conn->query($updatereceipt) === TRUE) {
                } else {
                }
            }
          }
        }
      }
      $time = strtotime($row["date"]);
      if (strpos($row["notes"], 'From') !== false) {
      } else {
      echo '<tr>';
      echo '<td style="width:15px;"><input name='.$checkEmbarque.' id='.$checkEmbarque.' type="checkbox" value='.$row["receipt"].'</td>';
      echo '<td><small>'.$row["receipt"].'</small></td>';
      echo '<td><small>'.date('d/m/Y', $time).'</small></td>';
      echo '<td><small>'.$row["shipper"].' ['. $row["shipperid"]. ']</small></td>';
      echo '<td align="right"><small>'.$row["pieces"].'</small></td>';
      echo '<td align="right"><small>'.$row["weight"].' lb</small></td>';
      echo '<td align="right"><small>'.$row["weightvol"].' lb</small></td>';
      echo '<td align="right"><small>'.$row["volume"].' cuft</small></td>';
      if ($row["documento"]==1){
?>
        <td><a onclick="window.open('foto.php?receipt=<?php echo $row["receipt"]; ?>', '_blank', 'toolbar=yes, scrollbars=yes,resizable=yes,top=500,left=500,width=800,height=400');" ><i class="material-icons">camera_enhance</i></a></td>
<?php
      }
      echo '</tr>';
    }
}


while($rowH = $resultHold->fetch_assoc()) {
          $time = strtotime($rowH["date"]);
      if (strpos($rowH["notes"], 'From') !== false) {
      } else {
        echo '<tr>';
        echo '<td style="width:15px;"><input name='.$checkEmbarque.' id='.$checkEmbarque.' type="checkbox" value='.$rowH["receipt"].'</td>';
        echo '<td><small>'.$rowH["receipt"].'</small></td>';
        echo '<td><small>'.date('d/m/Y', $time).'</small></td>';
        echo '<td><small>'.$rowH["shipper"].' ['. $rowH["shipperid"]. ']</small></td>';
        echo '<td align="right"><small>'.$rowH["pieces"].'</small></td>';
        echo '<td align="right"><small>'.$rowH["weight"].' lb</small></td>';
        echo '<td align="right"><small>'.$rowH["weightvol"].' lb</small></td>';
        echo '<td align="right"><small>'.$rowH["volume"].' cuft</small></td>';
        if ($rowH["documento"]==1){
  ?>
          <td><a onclick="window.open('foto.php?receipt=<?php echo $rowH["receipt"]; ?>', '_blank', 'toolbar=yes, scrollbars=yes,resizable=yes,top=500,left=500,width=800,height=400');" ><i class="material-icons">camera_enhance</i></a></td>
  <?php
        }

        echo '</tr>';
      }

        }

    echo '<tr><td>&nbsp;</td></tr><tr>';
    echo '<td colspan="9" align="right"><input name="" type="submit" value="Dar Instrucciones de envío"  class="btn btn-success" /></td></tr></table></form>';
}
$conn->close();


/*




$resultadosinins = embarquessinins($_SESSION['ConsigneeCode']);
if ($resultadosinins->num_rows > 0) {
  while($row = $resultadosinins->fetch_assoc()) {
    $trackingreceipt =  tracking($row["receipt"], "01/01/2000", "02/28/2017");
    foreach($trackingreceipt as $tr){
      if (isset($tr["ID"])){
        $resultadoTracking = buscaTracking_ID($tr["ID"]);
        if ($resultadoTracking->num_rows == 0) {
          insertaTracking($tr["ID"], $tr["Box"], $tr["Date"], $tr["Time"], $tr["Note"], $tr["Status"], $tr["Operator"], $tr["Tracking"], $row["receipt"]);
        }
      } else {
        for($j = 0; $j<count($tr); $j++){
          $resultadoTracking = buscaTracking_ID($tr[$j]["ID"]);
          if ($resultadoTracking->num_rows == 0) {
            insertaTracking($tr[$j]["ID"], $tr[$j]["Box"], $tr[$j]["Date"], $tr[$j]["Time"], $tr[$j]["Note"], $tr[$j]["Status"], $tr[$j]["Operator"], $tr[$j]["Tracking"], $row["receipt"]);
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
    }
  }
}



$resultadoporconsignatario = receipts_consignatario($_SESSION['ConsigneeCode']);
$resultadocons = $resultadoporconsignatario;
if ($resultadocons->num_rows > 0) {
    while($row = $resultadocons->fetch_assoc()) {
      $result2 = buscaReceiptsStephy($row["receipt"]);
      if ($result2->num_rows > 0) {
            while($row2 = $result2->fetch_assoc()) {
              echo $row2["consigneeid"];
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
borrarReceipts($_SESSION['ConsigneeCode']);







$sql = "SELECT * FROM receipts where instrucciones = 0 and reempacado = 0 and consigneeid=".$_SESSION['ConsigneeCode']." order by receipt desc";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo '<form id="formEmbarques" action="procesarEmbarques.php" method="post"><table class="table table-striped">';
    echo '<tr style="background-color:#004c96; color:#FFF;">';
    echo '<th>&nbsp;</th>';
    echo '<th class="titulos2">Recibo</th>';
    echo '<th class="titulos2">Fecha</th>';
    echo '<th class="titulos2">Shipper</th>';
    echo '<td class="titulos2" align="right">Piezas</td>';
    echo '<td class="titulos2" align="right">Peso</td>';
    echo '<td class="titulos2" align="right">Peso-Volumétrico</td>';
    echo '<td class="titulos2" align="right">Volúmen</td>';
    echo '<td>&nbsp;</th>';
    echo '</tr>';
    $checkEmbarque = "checkEmbarque[]";
    while($row = $result->fetch_assoc()) {
      $cadena = $row["notes"];
      $resultadoxs = intval(preg_replace('/[^0-9]+/', '', $cadena), 10);

      if ($resultadoxs>0){
        $sqlparains = "select * from instructions where receipt = ".$resultadoxs;
        echo "hola para ins";
        echo "<br>";
        echo $sqlparains;
        echo "<br>";
        $resultadoins = $conn->query($sqlparains);
        echo $resultadoins->num_rows;
        echo "<br>";
        if ($resultadoins->num_rows > 0) {
          echo "inserto";
          echo "<br>";
          while($rowIns = $resultadoins->fetch_assoc()) {
            $sqlprevio = "select * from instructions where receipt = ".$row["receipt"];
            $resultadoprevio = $conn->query($sqlprevio);
            echo $sqlprevio;
            echo "<br>";

            echo "resultadoprevio".$resultadoprevio->num_rows;
            echo "<br>";



            if ($resultadoprevio->num_rows == 0) {

              echo "aja";

                $insertainstruc = "insert into instructions (code, author, type, insurance, insuranceammount, payment, receipt) values (".$rowIns["code"].", ".$rowIns["author"].", '".$rowIns["type"]."', '".$rowIns["insurance"]."', '".$rowIns["insuranceammount"]."', '".$rowIns["payment"]."', ".$row["receipt"].")";
                  if ($conn->query($insertainstruc) === TRUE) {
                    echo "New record created successfully";
                  } else {
                    echo "Error: " . $insertainstruc . "<br>" . $conn->error;
                  }
                $updatereceipt = "update receipts set instrucciones = 1 where receipt =".$row["receipt"];
                echo $updatereceipt;
                echo "<br>";
                if ($conn->query($updatereceipt) === TRUE) {
                  echo "Record updated successfully";
                } else {
                  echo "Error updating record: " . $conn->error;
                }

            }
          }
        }
      }


      $time = strtotime($row["date"]);
      if (strpos($row["notes"], 'From') !== false) {
      } else {




      echo '<tr>';
      echo '<td style="width:15px;"><input name='.$checkEmbarque.' id='.$checkEmbarque.' type="checkbox" value='.$row["receipt"].'</td>';
      echo '<td><small>'.$row["receipt"].'</small></td>';
      echo '<td><small>'.date('d/m/Y', $time).'</small></td>';
      echo '<td><small>'.$row["shipper"].' ['. $row["shipperid"]. ']</small></td>';
      echo '<td align="right"><small>'.$row["pieces"].'</small></td>';
      echo '<td align="right"><small>'.$row["weight"].' lb</small></td>';
      echo '<td align="right"><small>'.$row["weightvol"].' lb</small></td>';
      echo '<td align="right"><small>'.$row["volume"].' cuft</small></td>';
      if ($row["documento"]==1){
?>
        <td><a onclick="window.open('foto.php?receipt=<?php echo $row["receipt"]; ?>', '_blank', 'toolbar=yes, scrollbars=yes,resizable=yes,top=500,left=500,width=800,height=400');" ><i class="material-icons">camera_enhance</i></a></td>
<?php
      }
      echo '</tr>';
    }
}

    echo '<tr><td>&nbsp;</td></tr><tr>';
    echo '<td colspan="9" align="right"><input name="" type="submit" value="Dar Instrucciones de envío"  class="btn btn-success" /></td></tr></table></form>';
} else {
    echo "0 results";
}
$conn->close();
*/
?>
