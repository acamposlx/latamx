<?php 
session_start();
$pagina="cuenta";
include('head.php'); 
?>
<br>
<div class="container">
	<div class="bloqueCuenta">
		<form method="post" action="agrega_tarjeta_action.php">
		<input type="hidden" name="usuario" value="<?php echo $_SESSION['cedula']; ?>">
  		<table class="table table-condensed">
		<tr>
			<th colspan="2" class="titulos" style="background-color: #000;">Agregar tarjeta</th>
		</tr>
		<tr>
			<td class="tituloCuenta">Nombre Tarjeta:</td>
			<td><div class="input-group">
  			<span class="input-group-addon" id="basic-addon1">Tarjeta</span>
  			<input type="text" class="form-control" placeholder="Nombre" aria-describedby="basic-addon1" name="nombreTarjeta">
			</div></td>
		</tr>
		<tr>
			<td class="tituloCuenta">Número Tarjeta:</td>
			<td><div class="input-group">
  			<span class="input-group-addon" id="basic-addon2">****</span>
			<input type="password" name="numerotarjeta" class="form form-control" aria-describedby="basic-addon2"></div></td>
		</tr>
		<tr>
			<td class="tituloCuenta">Código Seguridad:</td>
			<td><div class="input-group">
  			<span class="input-group-addon" id="basic-addon3">***</span>
			<input type="text" name="codseg" class="form form-control" aria-describedby="basic-addon3"></div></td>
		</tr>
		<tr>
			<td class="tituloCuenta">Fecha Vencimiento:</td>
			<td><div class="input-group">
  			<span class="input-group-addon" id="basic-addon4">**/****</span>
			<input type="text" name="vencimiento" class="form form-control" aria-describedby="basic-addon4"></div></td>
		</tr>
		
		<tr>
			<td colspan="2" align="right"><input type="submit" class="btn btn-success" value="Agregar Tarjeta"></td>
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
include('pie.php'); 
?>