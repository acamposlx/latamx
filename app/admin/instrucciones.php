<?php
include('conexion.php');
include('../servicios/WSGetShippingInstruction.php');
$sql = "SELECT * FROM receipts WHERE receipts.consigneeid = 2798 ORDER BY receipts.receipt DESC";
$resultado = $conn->query($sql);
function is_XML($xml) {
    $doc = @simplexml_load_string($xml);
    if ($doc) {
        return true; //this is valid
    } else {
        return false; //this is not valid
    }
}



if ($resultado->num_rows > 0) {
	while($row = $resultado->fetch_assoc()) {
		$registros[] = $row;
	}
	for($i = 0; $i < $resultado->num_rows; $i += 20)
	{
		$select = "SELECT * FROM receipts WHERE receipts.consigneeid = 2798 ORDER BY receipts.receipt DESC limit " .$i. ", 20";
		$resultado2 = $conn->query($select);
		if ($resultado2->num_rows > 0) {
			while($row2 = $resultado2->fetch_assoc()) {
				$si = "select * from instructions where receipt =" .$row2["receipt"];

				$resultado3 = $conn->query($si);
				//echo "string".$resultado3->num_rows;
				if ($resultado3->num_rows == 0) {
					$instru = instruccion($row2["receipt"], '');
					$sqlI = "insert into instructions (code, author, type, insurance, insuranceammount, payment, receipt) VALUES ('".$instru['Code']."', '".$instru['Author']."', '".$instru['Type']."', '".$instru['Insurance']."', '".$instru['InsuranceAmount']."', '".$instru['Payment']."', '".$row2["receipt"]."')";
  					if ($conn->query($sqlI) === TRUE) {
  					} else {
      					echo "Error: " . $sqlI . "<br>" . $conn->error;
  					}
  					$sqlU = "UPDATE receipts SET instrucciones=1 WHERE receipt=".$row2["receipt"];
  					if ($conn->query($sqlU) === TRUE) {
  					} else {
      					echo "Error updating record: " . $conn->error;
  					}
				}
			}
		}
		sleep(5);
	}
}

$conn->close();
?>
