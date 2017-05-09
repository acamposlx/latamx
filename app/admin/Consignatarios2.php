<?php
include_once('conexion.php');
$sql = "SELECT distinct consignatario.Email, consignatario.ConsigneeCode, consignatario.`Name`, consignatario.Contact, consignatario.Add1, consignatario.Add2, consignatario.City, consignatario.State, consignatario.ZipCode, consignatario.Country, consignatario.Phone1, consignatario.Phone2, consignatario.Destination, consignatario.AccessPassword, consignatario.Notes, consignatario.ID1, consignatario.ID2, consignatario.statusID, consignatario.Date, consignatario.saludo, consignatario.apellido, consignatario.telefono, consignatario.sexo, consignatario.fechaNac, consignatario.cedula FROM consignatario WHERE consignatario.Email <> 'NA' AND consignatario.Email <> 'N/A' order by email";
$result = $conn->query($sql);
?>


$users = [
<?php
while($row = $result->fetch_assoc()) {

  $password="";
  if($row["AccessPassword"] == ""){
$password=123456;

  } else {
    $password = $row["AccessPassword"];
  }
        echo "['email'    => '".$row["Email"]."','password' => '".$password."', 'ConsigneeCode' => '".$row["ConsigneeCode"]."', 'first_name' => '".$row["Name"]."','last_name' => '".$row["apellido"]."','Phone1' => '".$row["Phone1"]."','sexo' => '".$row["sexo"]."','fechaNac' => '".$row["fechaNac"]."','cedula' => '".$row["cedula"]."',],";
        echo "<br>";
    }
$conn->close();
?>
];
