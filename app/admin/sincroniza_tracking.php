<?php
include_once('conexion.php');
include('../httpful.phar');
$sql3 = "SELECT * FROM `receipts` WHERE entregado = 0 and receipt > 15300 and receipt < 15400 ";
$result3 = $conn->query($sql3);
$i=0;
while($row = mysqli_fetch_assoc($result3))
{
  $uri = "http://latam-cargo.com.ve/api/Tracking?receipt=".$row["receipt"];
  $response = \Httpful\Request::get($uri)->send();
  $array = json_decode($response);
  foreach($array as $obj)
  {
    $sql = "SELECT * FROM tracking WHERE ID = ".$obj->ID;
    $result = $conn->query($sql);
    if ($result->num_rows == 0)
  	{

      $sqlI = "insert into tracking (ID, Box, Date, Time, Note, Status, Operator, Tracking, receipt) values (".$obj->ID.", '".$obj->Box."', '".$obj->Date."', '".$obj->Time."', '".$obj->Note."', '".$obj->Status."', '".$obj->Operator."', '".$obj->Tracking."', '".$row["receipt"]."')";
      if ($conn->query($sqlI) === TRUE) {
        echo "New record created successfully";
            		echo "<br>";
      }
      else {
        echo "Error: " . $sqlI . "<br>" . $conn->error;
            		echo "<br>";
      }

    }
    else
    {

      echo $obj->ID ."existe";
      echo "<br>";
    }
  }

}
$conn->close();
?>
