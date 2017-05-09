<?php 
include_once('admin/conexion.php');
$sql = "update tarjetas set numeroTarjeta = ".$_POST['numero'].", fechaVencimiento = '".$_POST['fecha']."', tipo = '".$_POST['nombre']."', codseg = ".$_POST['codigo']." where idTarjeta = ".$_POST['idTarjeta'];

if ($conn->query($sql) === TRUE) {
	header("Location: cuenta.php?mensaje=6");
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>