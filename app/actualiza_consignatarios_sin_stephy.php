<?php 
include_once('admin/conexion.php');
include('httpful.phar');
		$sqlDatos = "select * from consignatario where ConsigneeCode = 0";
		$resultDatos = $conn->query($sqlDatos);
		if ($resultDatos->num_rows > 0) {
    	    while($row = $resultDatos->fetch_assoc()) {
    			$codigocon = $row["Name"]; 
		echo $codigocon;
            }
		}

?>