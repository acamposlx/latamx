<?php 
date_default_timezone_set('Africa/Lagos');
session_start();
$pagina="Embarques";
include('head.php'); 
include('httpful.phar');
$uri2 = "http://latam-cargo.com.ve/api/GetServices";
$response2 = \Httpful\Request::get($uri2)->send();
$array2 = json_decode($response2);
?>
<br>
<form id="formEmbarques" action="procesarEmbarques4.php" method="post">
<input name="cantidad" type="hidden" value="<?php echo $_POST['cantidad']; ?>">
<?php     
for ($i=1; $i < $_POST['cantidad'] + 1; $i++)
	{
?>
		<input name="costoMercancia<?php echo $i ?>" type="hidden" value="<?php echo $_POST['costoMercancia'.$i]; ?>">
		<input name="costoSeguro<?php echo $i ?>" type="hidden" value="<?php echo $_POST['costoSeguro'.$i]; ?>">
   		<input name="receipt<?php echo $i ?>" type="hidden" value="<?php echo $_POST['receipt'.$i]; ?>">
<?php     
	}
?>	
<input name="pais" type="hidden" value="<?php echo $_POST['pais']; ?>">
<table align="center">
<tr>
	<td colspan="2" class="titulos" style="background-color:#004c96;">M&eacute;todo de Envio</h1></td>
	
</tr>
<tr>
	<td><input name="metodo" type="radio" value="13"></td>
	<td>Express Aereo</td>
</tr>
<tr>
	<td><input name="metodo" type="radio" value="12"></td>
	<td>Express Maritimo</td>
</tr>
<tr>
	<td><input name="metodo" type="radio" value="1"></td>
	<td>Hold</td>
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