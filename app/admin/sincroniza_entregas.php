<?php
include_once('conexion.php');
include('../httpful.phar');
$sql3 = "SELECT * FROM `receipts`";
$result3 = $conn->query($sql3);
$i=0;
while($row = mysqli_fetch_assoc($result3))
{
  $sql = "SELECT * FROM instructions WHERE receipt = ".$row["receipt"];
  $result = $conn->query($sql);

  while($row = mysqli_fetch_assoc($result))
  {
    $sqlU = "UPDATE receipts SET instrucciones=1 WHERE receipt=".$row["receipt"];
    if ($conn->query($sqlU) === TRUE) {
      echo "Record updated successfully";
    }
    else {
      echo "Error updating record: " . $conn->error;
    }
  }
}
$conn->close();
?>
