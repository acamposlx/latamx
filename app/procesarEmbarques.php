<?php
session_start();
$pagina="Embarques";
include('head.php');
$checked_count = count($_POST['checkEmbarque']);
include_once('admin/conexion.php');
include('funciones.php');




?>
<br>
<form id="formEmbarques" action="procesarEmbarques4.php" method="post">
<input name="cantidad" type="hidden" value="<?php echo $checked_count; ?>">

<table width="75%" border="0" align="center"><tr>
	<td colspan="6">
		<table width="100%">
		<tr style="background-color:#004c96; color:#FFF;">
			<td style="background-color:#004c96;">Destino del Embarque</td>
			<td style="background-color:#004c96;">M&eacute;todo de Envio</h1></td>
			<td style="background-color:#004c96;">Reempacar</h1></td>
			<td style="background-color:#004c96;">Asegurar Mercancia</h1></td>
		</tr>
		<tr>
			<td>
			<select name="pais" required class="form-control">
			<option value="0">Venezuela</option>
			</select></td>
			<td><select name="metodo" required class="form-control">
				<option value="13">Express Aereo</option>
				<option value="12">Express Maritimo</option>
				<option value="1">Hold</option></select></td>
			<td><select name="repack" required class="form-control">
				<option value="0">No</option>
				<option value="1">Si</option></select></td>
			<td><select name="insurance" required class="form-control">
				<option value="0">No</option>
				<option value="1">Si</option></select></td>

		</tr>
		</table></td>
</tr>
<tr>
	<td colspan="6">&nbsp;</td>
</tr>
<tr style="background-color:#004c96; color:#FFF;">
    <td>Recibo</td>
    <td align="right">Piezas</td>
    <td align="right">Peso</td>
    <td align="right">Peso Volumétrico</td>
    <td align="right">Volúmen</td>
    <td align="right">Valor Declarado</td>

</tr>
<?php
$i = 0;
$j=0;
if(!empty($_POST['checkEmbarque'])){
	foreach($_POST['checkEmbarque'] as $selected){


$resultPendientes = buscarEmbarque($selected);



//		$sqlPendientes = "SELECT * FROM receipts where receipt=".$selected;




		
		$cantidadEmbarquesPendientes = mysqli_num_rows($resultPendientes);
    	while($row = mysqli_fetch_assoc($resultPendientes)) {
			$i++;
			$j++;
?>
			<tr class="d<?php echo $i; ?>">
				<td><?php echo $row["receipt"]; ?></td>
				<td align="right"><?php echo $row["pieces"]; ?></td>
				<td align="right"><?php echo $row["weight"]; ?> lb</td>
				<td align="right"><?php echo $row["weightvol"]; ?> lb</td>
				<td align="right"><?php echo $row["volume"]; ?> cuft</td>
				<td align="right"><input size="1" name="costoMercancia<?php echo $j; ?>" type="number" required class="form-control" placeholder="10000" /></td>

				<input name="receipt<?php echo $j; ?>" type="hidden" value="<?php echo $row["receipt"]; ?>">
			</tr>
<?php
			if ($i ==2){
				$i=0;
			}
		}
	}
?>

<?php
} else {
	echo "<b>Please Select At least One Option.</b>";
}
?>
<tr>
  <td>&nbsp;</td>
</tr>
<tr>
  <td colspan="9" align="right"><input name="" type="submit" value="Confirmar Instrucciones de envío"  class="btn btn-success" /></td>
</tr>
</table>
</form>
<br>
<br>
<br>
<br>
<br>
<?php include('pie.php'); ?>
</body>
</html>
