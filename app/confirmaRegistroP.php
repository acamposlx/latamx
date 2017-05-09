<?php
include_once("admin/conexion.php");


$sql = "SELECT * FROM `consignatario` inner join direcciones on consignatario.cedula = direcciones.cedula WHERE Email = '".$_REQUEST['correo']."'";

$result = $conn->query($sql);




if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        $ddlSaludo =$row["saludo"];
      $nombre=$row["Name"];
      $apellido=$row["apellido"];
      $txtEmail=$row["Email"];
      $identificacion=$row["cedula"];
      $telef=$row["telefono"];
      $sexo=$row["sexo"];
      $fecha=$row["fechaNac"];
      $ddlDestino="0";
      $estado = $row["State"];
      $ciudad = $row["idCiudad"];
      $direccion= $row["direccion"];
  }

} else {
}
$conn->close();
$newURL="http://latamxpress.com/app/confirmaRegistro.php?correo=".$_REQUEST['correo'];
header('Location: '.$newURL);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Confirmaci&oacute;n de Registro a Latam Xpress - BIENVENIDO !</title><link rel="stylesheet" type="text/css" href="Styles/style-1.css"/>

<style type="text/css">
body {
	margin-top: 20px;
	margin-bottom: 20px;
}
</style>
</head>

<body  onload="document.frm1.submit()">

<form name="frm1" id="frm1" action="http://localhost:34321/procesaRegistro.aspx" method="post">
<input name="txtNombreDireccion" type="hidden" value="Principal">
<input name="ddlSaludo" id="ddlSaludo" type="hidden" value="<?php echo $ddlSaludo; ?>">
<input name="nombre" id="nombre" type="hidden" value="<?php echo $nombre; ?>">
<input name="apellido" id="apellido" type="hidden" value="<?php echo $apellido; ?>">
<input name="txtEmail" id="txtEmail" type="hidden" value="<?php echo $txtEmail; ?>">
<input name="identificacion" type="hidden" value="<?php echo $identificacion; ?>">
<input name="telef" type="hidden" value="<?php echo $telef; ?>">
<input name="sexo" type="hidden" value="<?php echo $sexo; ?>">
<input name="fecha" type="hidden" value="<?php echo $fecha; ?>">
<input name="destino" type="hidden" value="0">
<input name="estado" type="hidden" value="<?php echo $estado; ?>">
<input name="ciudad" type="hidden" value="<?php echo $ciudad; ?>">
<input name="direccion" type="hidden" value="<?php echo $direccion; ?>">
</form>



</body>
</html>
