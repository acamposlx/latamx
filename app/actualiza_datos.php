<?php
include_once('admin/conexion.php');


$sql = "UPDATE consignatario SET Name='".$_POST["nombre"]."', apellido = '".$_POST["apellido"]."',  cedula='".$_POST["cedula"]."', fechaNac = '".$_POST["fechanac"]."', telefono = '". $_POST["telefono"]."' WHERE ConsigneeCode=".$_POST["codigoconsig"];
$newURL="cuenta.php?mensaje=exito";
if ($conn->query($sql) === TRUE) {
header('Location: '.$newURL);
} else {
    echo "Error updating record: " . $conn->error;
}
?>
