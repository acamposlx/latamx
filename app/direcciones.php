<?php 
include('httpful.phar');
$uri = "http://latam-cargo.com.ve/api/GetAddress?cedula=".$_GET['cedula'];
$response = \Httpful\Request::get($uri)->send();
$array = json_decode($response);

$cantidad = count($array);
include('headInterna.php');
?>	
<form action="ActualizaDireccion.php" method="post">
<input type="hidden" name="cantidad" id="cantidad" value="<?php echo $cantidad; ?>">
<table>
<tr>
	<td>&nbsp;</td>
	<td>Nombre Direcci&oacute;n</td>
	<td>Direcci&oacute;n</td>
	<td>Ciudad</td>

</tr>
<?php 
for ($i = 0; $i < $cantidad; $i++) 
	{
		$uri2 = "http://latam-cargo.com.ve/api/GetCities?idCiudad=".$array[$i]->idCiudad;
		$response2 = \Httpful\Request::get($uri2)->send();
		$array2 = json_decode($response2);
		$direccion = $array[$i]->direccion;
		foreach($array2 as $obj2)
		{
			$ciudad = $obj2->ciudad;
		}
		$nombreDireccion = $array[$i]->nombreDireccion;
		$iddireccion = $array[$i]->idDireccion;
?>	
		<tr>
			<td><input type="hidden" name="iddireccion<?php echo $i; ?>" value="<?php echo $iddireccion; ?>"></td>
			<td><input type="text" name="nombredireccion<?php echo $i; ?>" value="<?php echo $nombreDireccion; ?>"></td>
			<td><input type="text" name="direccion<?php echo $i; ?>" value="<?php echo $direccion; ?>"></td>
			<td><?php echo $ciudad; ?></td>
			
		</tr>
<?php 
	}
?>
<tr>
	<td colspan="4"><input name="" type="submit" class="w3-btn w3-round-large  w3-small" value="Actualizar Mis Direcciones"></td>

</tr>
</table>
</form>	
<?php include('pie.php'); ?>