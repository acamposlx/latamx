<?php 
session_start();
$pagina="cuenta";
include('head.php'); 
function generaEstados()
{
	include_once('admin/conexion.php');
	$sql = "select * from estados";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		echo "<select name='estados' id='estados' class='form-control' style='width:100%;' onChange='cargaContenido(this.id)'>";
		echo "<option value='0'>Elige</option>";
	    // output data of each row
    	while($row = $result->fetch_assoc()) {
			echo "<option value='".$row["id_estado"]."'>".$row["estado"]."</option>";
    	}
	}
	echo "</select>";
}




?><script src="scripts/select_dependientes.js"></script>
<br>



<div class="container">
	<div class="bloqueCuenta">
		<form method="post" action="agrega_direccion_action.php">

		<input type="hidden" name="usuario" value="<?php echo $_SESSION['cedula']; ?>">
  		<table class="table table-condensed">
		<tr>
			<th colspan="2" class="titulos" style="background-color: #000;">Agregar Dirección</th>
		</tr>
		<tr>
			<td class="tituloCuenta">Nombre Dirección:</td>
			<td><div class="input-group">
  			<span class="input-group-addon" id="basic-addon1">Nombre</span>
  			<input type="text" class="form-control" placeholder="Nombre" aria-describedby="basic-addon1" name="nombreDireccion">
			</div></td>
		</tr>
		<tr>
			<td class="tituloCuenta">Apellido:</td>
			<td><div class="input-group">
  			<span class="input-group-addon" id="basic-addon2">Dirección</span>
			<textarea cols="25" rows="5" name="direccion" class="form form-control" aria-describedby="basic-addon2"></textarea></div></td>
		</tr>
		<tr>
			<td class="tituloCuenta">Estado/Provincia:</td>
			<td><div class="input-group">
  			<span class="input-group-addon" id="basic-addon6">Estado</span>
			<?php generaEstados(); ?></div></td>
		</tr>
		<tr>
			<td class="tituloCuenta">Ciudad:</td>
			<td><div class="input-group">
  			<span class="input-group-addon" id="basic-addon3">Ciudad</span>
			<div id='ajaxDiv'></div></div></td>
		</tr>
		
		<tr>
			<td colspan="2" align="right"><input type="submit" class="btn btn-success" value="Agregar Dirección"></td>
		</tr>
		</table>  
		</form>
		</div>
	</div>
<br>
<br>
<br>
<br>
<br>
<?php 
$conn->close();
include('pie.php'); 
?>