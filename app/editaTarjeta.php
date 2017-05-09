<?php 
session_start();
$pagina="cuenta";
include('head.php');
include_once('admin/conexion.php');
$sql = "SELECT * FROM tarjetas where idTarjeta = ".$_POST['idTarjeta'];
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
        $Numero = $row["numeroTarjeta"];
        $Cedula = $row["cedula"];
        $Nombre = $row["tipo"];
        $Codigo = $row["codseg"];
        $Fecha = $row["fechaVencimiento"];
        $idTarjeta = $row["idTarjeta"];
    }
}
?>


<br><br><br>
<div class="container">
	<div class="bloqueCuenta">
		<form method="post" action="editarTarjetaAction.php">
		<input type="hidden" name="idTarjeta" value="<?php echo $idTarjeta; ?>">
  		<table class="table table-condensed">
		<tr>
			<th colspan="2" class="titulos" style="background-color: #000;">Modificar Tarjeta</th>
		</tr>
		<tr>
			<td class="tituloCuenta">Nombre Tarjeta:</td>
			<td><div class="input-group">
  			<span class="input-group-addon" id="basic-addon1">Tarjeta</span>
  			<input type="text" class="form-control" placeholder="Nombre" aria-describedby="basic-addon1" name="nombre" value="<?php echo $Nombre; ?>">
			</div></td>
		</tr>
		<tr>
			<td class="tituloCuenta">Numeración:</td>
			<td><div class="input-group">
  			<span class="input-group-addon" id="basic-addon2">***</span>
			<input type="text" name="numero" aria-describedby="basic-addon2" class="form form-control" value="<?php echo $Numero; ?>"></div></td>
		</tr>
		<tr>
			<td class="tituloCuenta">Código de Seguridad:</td>
			<td><div class="input-group">
  			<span class="input-group-addon" id="basic-addon6">***</span>
			<input type="text" name="codigo" aria-describedby="basic-addon6" class="form form-control" value="<?php echo $Codigo; ?>"></div></td>
		</tr>
		<tr>
			<td class="tituloCuenta">Fecha de Vencimiento:</td>
			<td><div class="input-group">
  			<span class="input-group-addon" id="basic-addon3">**/****</span>
			<input type="text" name="fecha" class="form form-control" value="<?php echo $Fecha; ?>"  aria-describedby="basic-addon2" ></div></td>
		</tr>
		<tr>
			<td colspan="2" align="right"><input type="submit" class="btn btn-success" value="Modificar Tarjeta"></td>
		</tr>
		</table>  
		</form>
		</div>
	</div>
<?php 	
$conn->close();
include_once('pie.php');
?>