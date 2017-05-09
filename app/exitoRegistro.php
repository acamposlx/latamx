<?php
include_once('admin/conexion.php');
include('funciones.php');
$sqlEstados = "SELECT * FROM consignatario where Email = '".$_GET['Email']."'";
$resultEstados = $conn->query($sqlEstados);

if ($resultEstados->num_rows > 0) {
		while($rowEstados = $resultEstados->fetch_assoc()) {
			$ConsigneeCode = $rowEstados["ConsigneeCode"];
			$Name = $rowEstados["Name"];
			$Email = $rowEstados["Email"];
			$AccessPassword = $rowEstados["AccessPassword"];
			$idConsignatario = $rowEstados["idConsignatario"];
			$Date = $rowEstados["Date"];
		}

} else {
		echo "0 results";
}



confirmaRegistro($Email, $AccessPassword, $idConsignatario);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Registro en LatamXpress - Bienvenido !</title>
<link rel="stylesheet" type="text/css" href="Styles/style-1.css"/>
<style type="text/css">
body {
	margin-top: 20px;
	margin-bottom: 20px;
}
</style>
</head>

<body>
<table width="660" border="0" align="center" cellpadding="1" cellspacing="0" bgcolor="#CCCCCC">
<tr>
  <td>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="130" align="center" bgcolor="#f5f6f7"><img src="http://www.latamxpress.com/app/img/logo_mail.png" width="231" height="72" /></td>
        </tr>
      </table></td>
</tr>
<tr>
  <td>
    <table border="0" align="center" cellpadding="30" cellspacing="0">
        <tr>
          <td valign="top" bgcolor="#FFFFFF"><h1 class="txt3">
           <span style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif">Tu usuario ha sido registrado exitosamente</span>
          </h1>
            <span style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif"><strong><br>
            </strong>
            En breves momentos recibiras nuestro correo de bienvenida con tus datos de acceso al sistema.</span></td>
        </tr>
      </table></td>
</tr>
<tr>
  <td align="center">
    <table width="100%" border="0" cellspacing="0" cellpadding="20" class="txt1">
        <tr>
          <td height="100" align="center" bgcolor="#f5f6f7">
            <span style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif">Miami - Estados Unidos <br> 
8000 NW 29th St, Miami, FL 33122<br>
+1(305)640-5391<br>
+1(305)640-5639<br>
 
Caracas - Venezuela<br>
+58(212)655-0603<br>
 
          <a href="mailto:info@latamxpress.com" class="txt1">info@latamxpress.com</a></span></td>
        </tr>
      </table></td>
</tr>
</table>
</body>
</html>