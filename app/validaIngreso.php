<?php 
if ($pagina != "Rastreo")
{
	if (!isset($_SESSION['ConsigneeCode'])){
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo "<div class='md-col-12' align='center'>No tiene permiso para ingresar a esta seccion</div>";
		include('pie.php');
		exit();
	}
}
?>