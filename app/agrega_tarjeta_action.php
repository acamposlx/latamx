<?php 
include_once('admin/conexion.php');


$sql = "INSERT INTO tarjetas (cedula, numeroTarjeta, fechaVencimiento, tipo, codseg) VALUES (".$_POST['usuario'].", '".$_POST['numerotarjeta']."', '".$_POST['vencimiento']."', '".$_POST['nombreTarjeta']."', ".$_POST['codseg'].")";

if ($conn->query($sql) === TRUE) {
	header("Location: cuenta.php?mensaje=2");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
 ?>