<?php
ini_set('max_execution_time', 300);
session_start();
$pagina="transito";
include('head.php');
include_once('admin/conexion.php');
include('admin/funciones/funciones_comunes.php');
include('admin/funciones/funciones_servicios.php');
include('admin/funciones/funciones.php');
?>
<?php
date_default_timezone_set('America/Los_Angeles');
$sql = "SELECT receipts.idReceipt, receipts.receipt, receipts.date, receipts.shipperid, receipts.shipper, receipts.consigneeid, receipts.consignee, receipts.agentid, receipts.agent, receipts.pieces, receipts.weight, receipts.volume, receipts.weightvol, receipts.itemdescription, receipts.notes, receipts.countryid, receipts.instrucciones, receipts.entregado, receipts.embarcado, receipts.servicio, receipts.documento, receipts.reempacado, instructions.type FROM receipts INNER JOIN instructions ON receipts.receipt = instructions.receipt WHERE receipts.entregado = 0 AND receipts.countryid = 0 AND receipts.reempacado = 0 AND receipts.consigneeid = ".$_SESSION['ConsigneeCode']." order by date desc";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

?>
	<br>
	<br>
	<div class="table-responsive" id="demo">
  		<table width="90%" border="0" align="center">
		<tr style="background-color:#39b54a; color:#FFF;">
			<td>&nbsp;</td>
			<td>Cod. Embarque</td>
      		<td>Shipper</td>
        	<td>Fecha</td>
      		<td>Piezas</td>
      		<td>Peso</td>
      		<td>Peso Volum&eacute;trico</td>
      		<td>Volumen</td>
			<td>Acciones</td>
		</tr>
<?php
		$i = 0;
    	while($row = $result->fetch_assoc()) {
			if ($row["type"] != 'Hold'){
				//busqueda tracking

				$sqlDoc = "select * from documentosreceipt where receipt =".$row["receipt"];
				$resultadoDoc = $conn->query($sqlDoc);
				$i++;
				$time = strtotime($row["date"]);
				$newformat = date('d/m/Y',$time);
				if ($i ==1){
					echo "<tr style='background-color:#cecece; color: black;'>";
				} else{
					echo "<tr style='color: black;'>" ;
				}
?>
				<td>
<?php
				if ($row["type"]=='IN - OUT'){
?>
					<img src="img/inout.png" style="width: 25px; height: 25px;">
<?php
		}
				if ($row["type"]=='In - Out'){
?>
					<img src="img/inout.png" style="width: 25px; height: 25px;">
<?php
		}
				if ($row["type"]=='EXPRESS AEREO'){
?>
					<img src="img/airexpress.png" style="width: 25px; height: 25px;">
<?php
				}
				if ($row["type"]=='Express Aereo'){
?>
					<img src="img/airexpress.png" style="width: 25px; height: 25px;">
<?php
				}
				if ($row["type"]=='Consolidado Aereo'){
?>
					<img src="img/consolidadoaereo.png" style="width: 25px; height: 25px;">
<?php
				}
				if ($row["type"]=='AIR CONSOLIDATED'){
?>
					<img src="img/consolidadoaereo.png" style="width: 25px; height: 25px;">
<?php
				}
				if ($row["type"]=='Express Maritimo'){
?>
					<img src="img/maritimo.png" style="width: 25px; height: 25px;">
<?php
				}
?>
				</td>
				<td><?php echo $row["receipt"]; ?></td>
				<td><?php echo $row["shipper"]; ?> [<?php echo $row["shipperid"]; ?>]</td>
				<td><?php echo $newformat; ?></td>
				<td><?php echo $row["pieces"]; ?></td>
				<td><?php echo $row["weight"]; ?> lb</td>
				<td><?php echo $row["weightvol"]; ?> lb</td>
				<td><?php echo $row["volume"]; ?> cuft</td>
				<td>
					<table>
					<tr>
						<td><a onclick="window.open('rastreoInterna.php?receipt=<?php echo $row["receipt"]; ?>', '_blank', 'toolbar=yes, scrollbars=yes,resizable=yes,top=500,left=500,width=800,height=400');" ><i class="material-icons">description</i></a></td>
<?php
						if ($resultadoDoc->num_rows > 0) {
?>
							<td><a onclick="window.open('foto.php?receipt=<?php echo $row["receipt"]; ?>', '_blank', 'toolbar=yes, scrollbars=yes,resizable=yes,top=500,left=500,width=800,height=400');" ><i class="material-icons">camera_enhance</i></a></td>
<?php
						}
?>
					</tr>
					</table></td>
    		</tr>
<?php
			if ($i ==2){
				$i=0;
			}
		}
	}
} else {
?>
	<br>
    <div class="divcentrado"><div style="margin-left: 15px; margin-right: 10px; margin-top: 10px; text-align: center; "><strong> Usted no tiene embarques en transito </strong></div></div>
    <div class="container container-fluid">
    <div class="row">
      <div class="table-responsive" id="demo">
      </div>
    </div>
  </div>
<?php
}
$conn->close();
?>
</table>
<br>
<br>
<br>
<br>
<br>
<?php include('pie.php'); ?>
