<?php
if (isset($_POST['email'])){
	include_once('admin/conexion.php');
	include('funciones.php');
	$sql1 = "SELECT * FROM consignatario where Email='".$_POST['email']."'";
	$result1 = mysqli_query($conn, $sql1); 
	if (mysqli_num_rows($result1) > 0) {
		while($row = mysqli_fetch_assoc($result1)) {
            $Email= $row["Email"];
            $Pass= $row["AccessPassword"];
    	}
		recuperaDatos($Email, $Pass);
		$bool=1;
	}else{
		$bool = 0;
    	$existemail = 0;
	}
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>...::: LatamCargoXpress :::...</title>
</head>
<body>
<?php
$pagina="checklogin";
include('head.php');
if ($bool == 1){
?>
	<div class="alert alert-success">
  		<strong>Exito!</strong> Tus datos fueron enviados al correo electrónico suministrado.
	</div>
<?php
}
if ($bool == 0){
?>
<div class="alert alert-danger">
  <strong>Error!</strong> No conseguimos información de su cuenta. Comuniquese con nosotros por el correo sistemas@latamxpress.com
</div>
<?php
}
?>
<br>
<div class="col-sm-3 col-lg-12" align="center">Escribe tu correo electrónico 
<form method="post" action="recuperaDatosAction.php"><input type="email" name="email" id="email"><input type="submit"></form>
</div>
<?php
include('pie.php');
?>
</body>
</html>
