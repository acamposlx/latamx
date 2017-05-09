<?php 
include_once('admin/conexion.php');
$sql = "select receipt from tracking where Note like '%Re-Packed%'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$sqlU = "UPDATE receipts SET reempacado=1 WHERE receipt=".$row["receipt"];
		if ($conn->query($sqlU) === TRUE) {
    		echo "Record updated successfully" .$row["receipt"];
		} else {
    		echo "Error updating record: " . $conn->error;
		}
    }
} else {
    echo "0 results";
}
$conn->close();
?>