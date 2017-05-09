<?php 
include_once('admin/conexion.php');

$sql = "delete from tarjetas where idTarjeta = ".$_POST['idtarjeta'];

if ($conn->query($sql) === TRUE) {
	header("Location: cuenta.php?mensaje=9");
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();

?>