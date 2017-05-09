<?php
session_start();
$pagina="cuenta";
include('head.php');
include_once('admin/conexion.php');
$sql = "SELECT * FROM consignatario where ConsigneeCode = ".$_SESSION['ConsigneeCode'];
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
        $Nombre = $row["Name"];
        $Apellido = $row["apellido"];
        $Email= $row["Email"];
        $Pass = $row["AccessPassword"];
        $Fecha = $row["fechaNac"];
        $consignee = $row["ConsigneeCode"];
        $Cedula  = $row["cedula"];
    }
?><br><br><br>
<div class="container">
	<div class="bloqueCuenta">
		<form method="post" action="editarDatosAction.php">
		<input type="hidden" name="consignee" value="<?php echo $consignee; ?>">
  		<table class="table table-condensed">
		<tr>
			<th colspan="2" class="titulos" style="background-color: #000;">Modificar Datos</th>
		</tr>
		<tr>
			<td class="tituloCuenta">Nombre:</td>
			<td><div class="input-group">
  			<span class="input-group-addon" id="basic-addon1">Pedro</span>
  			<input type="text" class="form-control" placeholder="Nombre" aria-describedby="basic-addon1" name="nombre" value="<?php echo $Nombre; ?>">
			</div></td>
		</tr>
		<tr>
			<td class="tituloCuenta">Apellido:</td>
			<td><div class="input-group">
  			<span class="input-group-addon" id="basic-addon2">Pérez</span>
			<input type="text" name="apellido" placeholder="Apellido" aria-describedby="basic-addon2" class="form form-control" value="<?php echo $Apellido; ?>"></div></td>
		</tr>
		<tr>
			<td class="tituloCuenta">Cédula:</td>
			<td><div class="input-group">
  			<span class="input-group-addon" id="basic-addon6">123456789</span>
			<input type="text" name="cedula" placeholder="Cédula" aria-describedby="basic-addon6" class="form form-control" value="<?php echo $Cedula; ?>"></div></td>
		</tr>
		<tr>
			<td class="tituloCuenta">Email:</td>
			<td><div class="input-group">
  			<span class="input-group-addon" id="basic-addon3">@</span>
			<input type="text" name="email" class="form form-control" value="<?php echo $Email; ?>" placeholder="Email"  aria-describedby="basic-addon2" ></div></td>
		</tr>
		<tr>
			<td class="tituloCuenta">Password:</td>
			<td><div class="input-group">
  			<span class="input-group-addon" id="basic-addon3">@</span>
			<input type="password" name="password" class="form form-control" placeholder="Password"  aria-describedby="basic-addon2" ></div></td>
		</tr>
		<tr>
			<td class="tituloCuenta">Fecha de Nacimiento:</td>
			<td><div class="input-group">
  			<span class="input-group-addon" id="basic-addon5">xx/xx/xxxx</span>
			<input type="text" name="fecha" class="form form-control" value="<?php echo $Fecha; ?>"  placeholder="Fecha de Nacimiento" aria-describedby="basic-addon5" ></td>
		</tr>
		<tr>
			<td colspan="2" align="right"><input type="submit" class="btn btn-success" value="Modificar mis datos"></td>
		</tr>
		</table>
		</form>
		</div>
	</div>
<?php
    // output data of each row

} else {
    echo "0 results";
}
$conn->close();
?>
