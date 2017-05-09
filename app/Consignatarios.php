<?php
include('httpful.phar');
$uri = "http://latam-cargo.com.ve/api/Stephy";
$response = \Httpful\Request::get($uri)->send();
$array = json_decode($response);
?>

<table>
<tr>
	<td>Codigo</td>
    <td>Direccion</td>
    <td>Nombre</td>
    <td>Password</td>
</tr>
<?php
foreach($array as $obj)
	{
		$ConsigneeCode= $obj->ConsigneeCode;
		$Date= $obj->Date;
		$Name= $obj->Name;
		$Contact= $obj->Contact;
		$Add1= $obj->Add1;
		$Add2= $obj->Add2;
		$City= $obj->City;
		$State= $obj->State;
		$ZipCode= $obj->ZipCode;
		$Country= $obj->Country;
		$Email= $obj->Email;
		$Phone1= $obj->Phone1;
		$Phone2= $obj->Phone2;
		$Notas= $obj->Notas;
		$Destination= $obj->Destination;
		$Password= $obj->Password;
		$ID1= $obj->ID1;
		$ID2= $obj->ID2;
		$StatusID= $obj->StatusID;
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "latamxpress";
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) 
			{
				die("Connection failed: " . $conn->connect_error);
			}

		$sql = "INSERT INTO consignatario (ConsigneeCode, Date, Name, Contact, Add1, Add2, City, State, ZipCode, Country, Email, Phone1, Phone2, Notes, Destination,
		AccessPassword, ID1, ID2, StatusID)
		VALUES ('".$ConsigneeCode."', '".$Date."', '".$Name."', '".$Contact."', '".$Add1."','".$Add2."',
		'".$City."','".$State."','".$ZipCode."','".$Country."','".$Email."','".$Phone1."','".$Phone2."',
		'".$Notas."','".$Destination."','".$Password."','".$ID1."','".$ID2."','".$StatusID."')";

		if ($conn->query($sql) === TRUE) 
			{
				echo "New record created successfully";
				echo "<br>";
			} 
		else 
			{
				echo "Error: " . $sql . "<br>" . $conn->error;
				echo "<br>";
			}
		$conn->close();
?>
		<tr>
			<td><?php echo $ConsigneeCode; ?></td>
			<td><?php echo $Add1; ?></td>
			<td><?php echo $Name; ?></td>
			<td><?php echo $Password; ?></td>
		</tr>
<?php
	}
?>
</table>
