<?php
include_once('conexion.php');
include('../httpful.phar');
$uri = "http://latam-cargo.com.ve/api/ReceiptsStephy";
$response = \Httpful\Request::get($uri)->send();
$array = json_decode($response);


foreach($array as $obj)
{
	$sql = "SELECT receipt FROM receipts where receipt =" .$obj->receipt;
	$result = $conn->query($sql);
	if ($result->num_rows == 0) 
	{
    	$sql2 = "INSERT INTO receipts (receipt, date, shipperid, shipper, consigneeid, consignee, agentid, agent, pieces, weight, volume, weightvol, itemdescription, notes, countryid, instrucciones, entregado, embarcado, servicio)
		VALUES ('".$obj->receipt."', '".$obj->date."', '".$obj->shipperid."', '".$obj->shipper."', '".$obj->consigneeid."', '".$obj->consignee."', '".$obj->agentid."', '".$obj->agent."', '".$obj->pieces."', '".$obj->weight."', '".$obj->volume."', '".$obj->weightvol."', '".$obj->itemdescription."', '".$obj->notes."', '".$obj->countryid."', '".$obj->instrucciones."', '".$obj->entregado."', '".$obj->embarcado."', '".$obj->servicio."')";

		if (mysqli_query($conn, $sql2)) 
		{
    		echo "New record created successfully";
    		echo "<br>"; 
		} 
		else 
		{
    		echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
		}
    }
	else 
	{
    	echo "0 results";
	}
}

$conn->close();

?>