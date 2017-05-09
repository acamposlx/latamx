<?php
include_once('admin/conexion.php');
$sqlEstados = "SELECT * FROM ciudades where id_estado = ".$_GET['receipt'];
$resultEstados = $conn->query($sqlEstados);
if ($resultEstados->num_rows > 0) {
		// output data of each row
		echo "<select name='ciudades' id='ciudades' class='form-control' style='width:100%;'>";
		echo "<option value='0'>Elige</option>";
		while($rowEstados = $resultEstados->fetch_assoc()) {
			echo "<option value='".$rowEstados["id_ciudad"]."'>".utf8_encode($rowEstados["ciudad"])."</option>";
		}
		echo "</select>";
} else {
		echo "0 results";
}
?>
