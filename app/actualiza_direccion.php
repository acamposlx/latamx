<?php 

include_once('admin/conexion.php');


$sqlU = "UPDATE direcciones SET direccion = '".$_POST['direccion']."', nombreDireccion='".$_POST['nombreDireccion']."'  WHERE idDireccion=".$_POST['iddireccion'];

if ($conn->query($sqlU) === TRUE) {
	header("Location: cuenta.php?mensaje=4");
} else {
    echo "Error updating record: " . $conn->error;
}
  

 ?>