<?php  
include('conexion.php');
$sql = "select distinct Email, AccessPassword from consignatario where Email <> 'NA' and Email <> 'N/A' order by Email";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

if ($row["AccessPassword"] == ''){
$password = 1234;

}
	else{

		$password = $row["AccessPassword"];
	}

        echo "['email'    => '" . $row["Email"]. "', 'password' => '" . $password. "',],";
        echo "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();

?><br>