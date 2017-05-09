<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>...::: LatamCargoXpress :::...</title>
<!-- Bootstrap Core CSS -->
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!-- Theme CSS -->
<link href="css/freelancer.min.css" rel="stylesheet">
<!-- Custom Fonts -->
<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">


<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.7/css/bootstrap-dialog.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.7/js/bootstrap-dialog.min.js"></script>

<script src="dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="dist/sweetalert.css">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<script src="scripts/jquery-1.8.3.min.js"></script>
<script type="text/javascript">
var divState = {}; // we store the status in this object
function showhide(id) {
    if (document.getElementById) {
        var divid = document.getElementById(id);

        divState[id] = (divState[id]) ? false : true; // initialize / invert status (true is visible and false is closed)
        //close others
        for (var div in divState){
            if (divState[div] && div != id){ // ignore closed ones and the current
                document.getElementById(div).style.display = 'none'; // hide
                divState[div] = false; // reset status
            }
        }
        divid.style.display = (divid.style.display == 'block' ? 'none' : 'block');
    }
}
</script>


<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-92320907-1', 'auto');
  ga('send', 'pageview');

</script>
<link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
</head>
<body id="page-top" class="index" onload="myFunction()">
<img src="Images/bg_general.jpg" id="full-screen-background-image" />

<!-- Navigation -->
<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
      		<a class="navbar-brand" href="#"><img src="Images/logo-latamxpress-blanco.png" /></a>
		</div>

<?php
		if(isset($_SESSION['ConsigneeCode'])){
?>
			<div id="navbar" class="navbar-collapse collapse">
    			<ul class="nav navbar-nav">
      				<li class="active"><a href="dashboard.php">Inicio</a></li>
      				<li><a href="embarquespendientes.php">Embarques Pendientes</a></li>
					<li><a href="embarquestransito.php">Embarques en Tr&aacute;nsito</a> </li>
					<li><a href="historial.php">Historial</a> </li>
					<li><a href="rastreo.php">Rastreo</a> </li>
					<li><a href="faq.php">FAQ</a> </li>
					<li><a href="cuenta.php">Mi Cuenta</a></li>
					<li><a href="cerrarSesion.php">Salir</a> </li>
    			</ul>
				<ul class="nav navbar-nav navbar-right">
					<li>
<?php
					if (isset($_SESSION['Name'])){
?>
						<a href="#">Bienvenido <?php echo $_SESSION['Name']; ?></a>
<?php
					}
?>
					</li>
      			</ul>
      		</div>
<?php
		}
?>
  	</div>
<?php
if ($pagina  <> "checklogin"){
?>
	<div class="row">
		<div class="col-sm-12 col-lg-12">
<?php
	if ($pagina == "Embarques"){
		$hex = "#004c96";
		$imagen = "Images/calendar.png";
		$titulo = "Embarques Pendientes";
	}
	if ($pagina == "transito")
    {
    	$hex = "#39b54a";
        $imagen = "Images/traffic.png";
		$titulo = "Embarques en Tr&aacute;nsito";
	}
	if ($pagina == "Historial")
    {
    	$hex = "#93278f";
        $imagen = "Images/history.png";
        $titulo = "Historial";
	}
	if ($pagina == "Rastreo")
    {
    	$hex = "#004698";
        $imagen = "Images/1469572681_18_radio_satellite_electric_wave_communication_space_spaceship_telescope_tracker.png";
		$titulo = "Rastreo";
	}
	if ($pagina == "Facturas")
	{
    	$hex = "#f15a24";
        $imagen = "Images/facturas.png";
        $titulo = "Facturas";
	}
	if ($pagina == "cuenta")
	{
		$hex = "#7f7f7f";
        $imagen = "Images/1469572829_user_male2.png";
        $titulo = "Mi Cuenta";
	}

	if ($pagina == "puntos")
	{
		$hex = "#ed1c24";
		$imagen = "Images/1469573278_card_in_use.png";
		$titulo = "Puntos";
	}


	if ($pagina == "faq")
	{
		$hex = "#00a99d";
		$imagen = "Images/1469572919_faq.png";
		$titulo = "Preguntas Frecuentes";
	}


	if ($pagina == "dashboard")
	{
		$hex = "#00a99d";
		$imagen = "Images/1469572919_faq.png";
		$titulo = "DashBoard";
	}
?>
	<table  style="background-color: <?php echo $hex; ?>; border: 1; width:100%;">
	<tr>
		<td style="width:75px; left:10px; clip:rect(10px, auto, auto, 10px); text-align:center;">&nbsp;</td>
    	<td width=75px;>&nbsp;</td>
    	<td>&nbsp;</td>
	</tr>
	<tr>
		<td style="width:75px; left:10px; clip:rect(20px, auto, auto, 10px); text-align:center;">
<?php
		if(isset($titulo)){
			if($pagina == "dashboard"){
?>
				<i class="fa fa-desktop fa-4x" style="color: #FFF;"></i>
<?php
			} else { ?>
				<img src=" <?php echo $imagen; ?> " width="52" height="52" />
<?php 
			} 
?>
		</td>
    	<td colspan="2" class="titulos"><?php echo $titulo; ?></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
    	<td width="75px;">&nbsp;</td>
    	<td>&nbsp;</td>
	</tr>
	<tr>
    	<td colspan="3"  style=" left:10px; clip:rect(20px, auto, auto, 10px); text-align:right;"> </td>
	</tr>
	</table>
		</div>
	</div>
<?php 
	}
}
?></nav>
