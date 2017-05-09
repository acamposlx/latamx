<?php  
include_once('conexion.php');
$sql = "SELECT * FROM receipts where entregado = 0 or entregado is null";
$result = $conn->query($sql);

 $rawdata = array(); //creamos un array
  $i=0;
while($row = mysqli_fetch_assoc($result))
{
        $rawdata[$i] = $row;
        $i++;
}



echo json_encode($rawdata);

?>
