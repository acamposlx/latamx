<?php
session_start();
$pagina="cuenta";
include('head.php');
include_once('admin/conexion.php');


include('httpful.phar');
if (isset($_SESSION['cedula']))
	{
		$sqlDatos = "select * from consignatario where cedula = '".$_SESSION['cedula']."'";
		$resultDatos = $conn->query($sqlDatos);
		if ($resultDatos->num_rows > 0) {
    	    while($row = $resultDatos->fetch_assoc()) {
    			$codigocon = $row["ConsigneeCode"];
    			$Email = $row["Email"];
    			$Nombre = $row["Name"]. " " .$row["apellido"];
    			$Cedula = $row["cedula"];
    			$FechaNac = $row["fechaNac"];
    			$Telefono = $row["telefono"];
				$Password = $row["AccessPassword"];
            }
		}

		$sqlDirecciones = "select * from direcciones where cedula = '".$_SESSION['cedula']."'";
		$resultDirecciones = $conn->query($sqlDirecciones);
	}
?>

<br>
<div class="container">
  <div class="row">
    <div class="centrado-porcentual">
      <div class="row" style="background-color: #CCC;"></div>
      No nos hace falta conocer el tamaño de esta caja para poder centrarla vertical y horizontalmente :)
    </div>
  </div>
  <div class="row">
    <div class="centrado-porcentual">
      <div class="row" style="background-color: #282828;"></div>
      No nos hace falta conocer el tamaño de esta caja para poder centrarla vertical y horizontalmente :)
    </div>
  </div>
</div>
<br>
<br>
<br>
<br>
<br>
<?php include('pie.php'); ?>
