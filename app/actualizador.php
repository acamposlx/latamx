<?php
include('admin/funciones/funciones.php');
include('admin/funciones/funciones_servicios.php');
include('admin/funciones/funciones_comunes.php');

$datosreceipts = receipts2("01/01/2000", "02/28/2017");
foreach($datosreceipts as $objeto){
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





/*

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
