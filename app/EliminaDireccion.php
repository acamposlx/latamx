<?php
include_once('admin/conexion.php');


// sql to delete a record
$sql = "DELETE FROM direcciones WHERE iddireccion=".$_POST['iddireccion'];

if ($conn->query($sql) === TRUE) {
	header("Location: cuenta.php?mensaje=5");
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>