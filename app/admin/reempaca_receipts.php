<?php 
include_once('conexion.php');
$sql = "select * from tracking where note like '%Packed%'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

    	$sqlU = "update receipts set reempacado = 1 where receipt = ".$row["receipt"];
		if ($conn->query($sqlU) === TRUE) {
    		echo "Record updated successfully";
		} else {
    		echo "Error updating record: " . $conn->error;
		}
    }
} else {
    echo "0 results";
}
$conn->close();
?>