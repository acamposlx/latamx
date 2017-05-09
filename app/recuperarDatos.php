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
?>
<br>
<div class="col-sm-3 col-lg-12" align="center">Indicanos tu correo electrónico 
<form method="post" action="recuperaDatosAction.php"><input type="email" name="email" id="email"><input type="submit"></form>
</div>
<?php
include('pie.php');
?>
</body>
</html>
