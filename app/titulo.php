<?php 
if ($pagina  <> "checklogin")
{
?>
	<div class="row">
		<div class="col-sm-12 col-lg-12">
<?php
		if ($pagina == "dashboard")
	{
		$hex = "#004c96";
		$imagen = "http://latamxpress.com/app/Images/calendar.png";
		$titulo = "Embarques Pendientes";
	}
	
		if ($pagina == "Embarques")
	{
		$hex = "#004c96";
		$imagen = "http://latamxpress.com/app/Images/calendar.png";
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
?>
<table style="background-color: <?php echo $hex; ?>; width:100%;">
<tr>
	<td style="width:75px; left:10px; clip:rect(10px, auto, auto, 10px); text-align:center;">&nbsp;</td>
    <td width=75px;>&nbsp;</td>
    <td>&nbsp;</td>
</tr>
<tr>
	<td style="width:75px; left:10px; clip:rect(20px, auto, auto, 10px); text-align:center;"><img src=" <?php echo $imagen; ?> " width="52" height="52" /></td>
    <td style="width:75%;" class="titulos"><?php echo $titulo; ?></td>
    <td>
		<table width="100%" border="0">
        <tr>
			<td style="text-align:right;" class="subtitulos">
			<script type="text/javascript">
			//<![CDATA[
			function makeArray()
				{
					for (i = 0; i<makeArray.arguments.length; i++)
					this[i + 1] = makeArray.arguments[i];
				}
			var months = new makeArray('Enero','Febrero','Marzo','Abril','Mayo', 'Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
			var date = new Date();
			var day = date.getDate();
			var month = date.getMonth() + 1;
			var yy = date.getYear();
			var year = (yy < 1000) ? yy + 1900 : yy;
			//document.write(day + " de " + months[month] + " del " + year);
			//]]>
			</script>
			<script type="text/javascript">
			function startTime()
				{
					today=new Date();
					var day = today.getDate();
					var yy = today.getYear();
			var year = (yy < 1000) ? yy + 1900 : yy;
					h=today.getHours();
					m=today.getMinutes();
					s=today.getSeconds();
					m=checkTime(m);
					s=checkTime(s);
					document.getElementById('reloj').innerHTML=day+" de "+ months[month] + " del " + year  + " " + h+":"+m+":"+s;
					t=setTimeout('startTime()',500);
				}
			function checkTime(i)
				{
					if (i<10) {i="0" + i;}return i;
				}
			window.onload=function(){startTime();}
			</script><?php
			if (isset($_SESSION['Name']))
				{
?>
			Bienvenido <?php echo $_SESSION['Name']; ?>
			<div id="reloj" style="font-size:15px;"></div>
<?php
				}
?>

			</td>
            <td width="25px;">&nbsp;</td>
		</tr>
        </table></td>
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
<?php }}?>
