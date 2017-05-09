<?php
session_start();
$pagina="Embarques";
include('head.php');
include_once('admin/funciones/funciones.php');
include_once('admin/funciones/funciones_comunes.php');
include('servicios/WSGetDocuments.php'); 
$resultPendientes = embarquespendientes($_SESSION['ConsigneeCode']);
$cantidadEmbarquesPendientes = mysqli_num_rows($resultPendientes);

$resultHold = embarqueshold($_SESSION['ConsigneeCode']);
$cantidadEmbarquesHold = mysqli_num_rows($resultHold);




$cantidadEmbarquesPendientes = $cantidadEmbarquesPendientes + $cantidadEmbarquesHold;
?>
<br>
<script>
var myVar = setInterval(myTimer, 10000);

function myTimer() {
  getRequest(
      'myAjax.php', // URL for the PHP file
       drawOutput,  // handle successful request
       drawError    // handle error
  );
  return false;
}




function drawError() {
    var container = document.getElementById('demo');
    container.innerHTML = 'Bummer: there was an error!';
}
// handles the response, adds the html
function drawOutput(responseText) {
    var container = document.getElementById('demo');
    container.innerHTML = responseText;
    
}

function getRequest(url, success, error) {
    var req = false;
    try{
        // most browsers
        req = new XMLHttpRequest();
    } catch (e){
        // IE
        try{
            req = new ActiveXObject("Msxml2.XMLHTTP");
        } catch(e) {
            // try an older version
            try{
                req = new ActiveXObject("Microsoft.XMLHTTP");
            } catch(e) {
                return false;
            }
        }
    }
    if (!req) return false;
    if (typeof success != 'function') success = function () {};
    if (typeof error!= 'function') error = function () {};
    req.onreadystatechange = function(){
        if(req.readyState == 4) {
            return req.status === 200 ?
                success(req.responseText) : error(req.status);
        }
    }
    req.open("GET", url, true);
    req.send(null);
    return req;
}
</script>
<?php
if ($cantidadEmbarquesPendientes==0){
?>
  <br>
  <div class="divcentrado" id="divce">
    <div style="margin-left: 15px; margin-right: 10px; margin-top: 10px; text-align: center;"><strong> Usted no tiene embarques pendientes </strong></div>
  </div>
  <div class="container container-fluid">
    <div class="row">
      <div class="table-responsive" id="demo">
        <form id="formEmbarques" action="procesarEmbarques.php" method="post">
        </form>
      </div>
    </div>
  </div>
<?php
} else {
    

?>
<div class="container container-fluid">
  <div class="row">
    <div class="table-responsive" id="demo">
      <form id="formEmbarques" action="procesarEmbarques.php" method="post">
      <table class="table table-striped">
      <tr style="background-color:#004c96; color:#FFF;">
        <th>&nbsp;</th>
        <th class="titulos2">Recibo</th>
        <th class="titulos2">Fecha</th>
        <th class="titulos2">Shipper</th>
        <td class="titulos2" align="right">Piezas</td>
        <td class="titulos2" align="right">Peso</td>
        <td class="titulos2" align="right">Peso-Volumétrico</td>
        <td class="titulos2" align="right">Volúmen</td>
        <td>&nbsp;</th>
        </tr>




<?php
    $checkEmbarque = "checkEmbarque[]";
    while($row = $resultPendientes->fetch_assoc()) {
        $documento = documentos($row["receipt"], "Receipt");
        
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
        if ($documento['DocName']!=""){
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
 ?>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="9" align="right"><input name="" type="submit" value="Dar Instrucciones de envío"  class="btn btn-success" /></td>
      </tr>
      </table>
      </form>
    </div>
  </div>
</div>
<?php
	}
?>
<br>
<br>
<br>
<br>
<br>
<?php include('pie.php'); ?>
