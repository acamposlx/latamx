<?php

include_once('admin/conexion.php');
$sql = "UPDATE consignatario SET Name='".$_POST['nombre']."',  apellido = '".$_POST['apellido']."', AccessPassword= '".$_POST['password']."',  Email = '".$_POST['email']."', cedula = ".$_POST['cedula'].", fechaNac = '".$_POST['fecha']."' WHERE ConsigneeCode=".$_POST['consignee'];

if ($conn->query($sql) === TRUE) {
	header("Location: cuenta.php?mensaje=3");
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();


 ?>
