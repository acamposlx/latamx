<?php  
include_once 'admin/conexion.php';
$sql = "select * from instructions";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$sqlU = "UPDATE receipts SET instrucciones=1 WHERE receipt=".$row["code"];
		if ($conn->query($sqlU) === TRUE) {
    		echo "Record updated successfully";
    		echo "<br>";
		} else {
    		echo "Error updating record: " . $conn->error;
    		echo "<br>";
		}
    }
}
$conn->close();
?>