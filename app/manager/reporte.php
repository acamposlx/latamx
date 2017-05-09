<!DOCTYPE html>
<html>
<head>
	<title></title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
</head>
<body>

<div class="container">
  	<table class="table table-bordered">
	<tr>
		<th>Consignatario</th>
		<th>Apellido</th>
		<th>Email</th>
		<th>Fecha de Nacimiento</th>
		<th>Cantidad de Embarques</th>
		<th>Fecha Ultimo Embarque</th>
	</tr>
<?php  
include('funciones/conexion.php');
$sql = "SELECT * FROM consignatario";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
    	$i=0;
		$sql2 = "SELECT * FROM receipts where consigneeid = ". $row["ConsigneeCode"];
		$result2 = mysqli_query($conn, $sql2);
		if (mysqli_num_rows($result2) > 0) {
			while($row2 = mysqli_fetch_assoc($result2)) {
				$i++;
				$time = strtotime($row2["date"]);
				$newformat = date('d-m-Y',$time);
				
			}
			echo "<tr><td>" .$row["Name"]. "</td><td>" .$row["apellido"]. "</td><td>" .$row["Email"]. "</td><td>" .$row["fechaNac"]. "</td><td>"  .$i. "</td><td>".$newformat."</td></tr>";
		}
    }
} else {
    echo "0 results";
}

mysqli_close($conn);

?>

</table>
</body>
</html>

