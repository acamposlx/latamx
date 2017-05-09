<?php  
include_once('admin/conexion.php');
$sqlI = "INSERT INTO direcciones (direccion, idCiudad, cedula, nombreDireccion) VALUES ('".$_POST['direccion']."', '".$_POST['ciudades']."', '".$_POST['usuario']."', '".$_POST['nombreDireccion']."')";

if ($conn->query($sqlI) === TRUE) {
	header("Location: cuenta.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>