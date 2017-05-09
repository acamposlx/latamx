<?php 
session_start();
$pagina="Embarques";
include('head.php'); 
?>
<br>
<form id="formEmbarques" action="procesarEmbarques3.php" method="post">
<input name="cantidad" type="hidden" value="<?php echo $_POST['cantidad']; ?>">
<?php     
$mercancia = 0;
for ($i=1; $i < $_POST['cantidad'] + 1; $i++){
	$mercancia = $mercancia +$_POST['costoMercancia'.$i];
	$calculoSeguro = 0;
	$calculoSeguro = $_POST['costoMercancia'.$i] * 0.03;
	if ($calculoSeguro < 20){
		$calculoSeguro=20;
	}
?>
		<input name="costoMercancia<?php echo $i ?>" type="hidden" value="<?php echo $_POST['costoMercancia'.$i]; ?>">
		<input name="costoSeguro<?php echo $i ?>" type="hidden" value="<?php echo $calculoSeguro; ?>">
   		<input name="receipt<?php echo $i ?>" type="hidden" value="<?php echo $_POST['receipt'.$i]; ?>">
<?php     
	}
?>		
<table align="center">
<tr>
	<td colspan="2" class="titulos" style="background-color:#004c96;">Destino del Embarque</td>
</tr>
<tr>
	<td><input name="pais" type="radio" value="0"></td>
	<td>Venezuela</td>
</tr>
<tr>
  <td>&nbsp;</td>
</tr>
<tr>
  <td colspan="2" align="right"><input name="" type="submit" value="Seleccionar Embarques"  class="btn btn-success" /></td>
</tr>
</table>

</form>
<br>
<br>
<br>
<br>
<br>
<?php include('pie.php'); ?>