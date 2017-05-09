<?php
include_once('conexion.php');
include('../httpful.phar');
$uri = "http://latam-cargo.com.ve/api/InstruccionesStephy?receiptOrigen=1";
$response = \Httpful\Request::get($uri)->send();
$array = json_decode($response);




foreach($array as $obj)
{
	$sql3 = "SELECT receipt FROM instructions where receipt =" .$obj->receipt;
	$result3 = $conn->query($sql3);
	if ($result3->num_rows == 0) 
	{
    	$sql2 = "INSERT INTO instructions (code, author, type, insurance, insuranceammount, payment, receipt)
		VALUES ('".$obj->code."', '".$obj->author."', '".$obj->type."', '".$obj->insurance."', '".$obj->insuranceammount."', '".$obj->payment."', '".$obj->receipt."')";

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