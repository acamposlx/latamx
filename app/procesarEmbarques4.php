<?php 
date_default_timezone_set('Africa/Lagos');
session_start();
$pagina="Embarques";
include('head.php'); 
include_once('admin/conexion.php');
?>
<script type="text/javascript">
	function activarboton(){
    	var boton = document.getElementById("btnConfirma");
 document.getElementById('btnConfirma').disabled = false;
	}

</script>
<script type="text/javascript">
function validateForm() {
    var radios = document.getElementsByName("radioConfirma");
    var formValid = false;

    var i = 0;
    while (!formValid && i < radios.length) {
        if (radios[i].checked) formValid = true;
        i++;        
    }

    if (!formValid) alert("Must check some option!");
    return formValid;
}
</script>

<br>
<?php if($_POST['repack']==1){
?>
<script type="text/javascript">sweetAlert("Reempaque", "Monto referencial, el mismo será consolidado y contabilizado en una única factura al finalizar el proceso de reempacado.", "info");</script>

<?php
} 
?>
<form id="formEmbarques" action="procesarEmbarquesFinal.php" method="post" onsubmit="return validateForm()">
<input name="cantidad" type="hidden" value="<?php echo $_POST['cantidad']; ?>">
<input name="pais" type="hidden" value="<?php echo $_POST['pais']; ?>">
<input name="metodo" type="hidden" value="<?php echo $_POST['metodo']; ?>">
<input name="insurance" type="hidden" value="<?php echo $_POST['insurance']; ?>">
<input name="repack" type="hidden" value="<?php echo $_POST['repack']; ?>">
<table style="width:75%;" align="center">
<tr>
	<td colspan="2"><h1>Confirmaci&oacute;n</h1></td>
</tr>
</table>
<table style="width:75%; border:1;" border="1" align="center">
<tr style="background-color:#004c96; color:#FFF;">
    <td>Recibo</td>
    <td>Shipper</td>
    <td>Fecha</td>
    <td>Piezas</td>
    <td>Peso</td>
    <td>Peso Volumétrico</td>
    <td>Volúmen</td>
</tr>
<?php   
$totalCostoMercancia = 0;
$totalCostoSeguro = 0;
$totalCostoEnvio = 0;
$sumaPeso = 0;
$sumaPesoVolumetrico = 0;
$sumaVolumen = 0;
$seguro =0;
for ($i=1; $i < $_POST['cantidad'] + 1; $i++){
	//$seguro=$seguro + $_POST['costoSeguro'.$i];
?>
	<input name="costoMercancia<?php echo $i ?>" type="hidden" value="<?php echo $_POST['costoMercancia'.$i]; ?>">
	<input name="costoSeguro<?php echo $i ?>" type="hidden" value="<?php echo $_POST['costoSeguro'.$i]; ?>">
   	<input name="receipt<?php echo $i ?>" type="hidden" value="<?php echo $_POST['receipt'.$i]; ?>">
<?php   
	$sqlPendientes = "SELECT * FROM receipts where receipt=".$_POST['receipt'.$i];
	$resultPendientes = mysqli_query($conn, $sqlPendientes);
	$cantidadEmbarquesPendientes = mysqli_num_rows($resultPendientes);
    while($row = mysqli_fetch_assoc($resultPendientes)) {
		$sumaPeso = $sumaPeso + $row["weight"];
		$sumaPesoVolumetrico = $sumaPesoVolumetrico + $row["weightvol"];
		$sumaVolumen = $sumaVolumen + $row["volume"];
		$totalCostoMercancia = $totalCostoMercancia + $_POST['costoMercancia'.$i];
		//$totalCostoSeguro= $totalCostoSeguro + $_POST['costoSeguro'.$i];
		$formattedCM = number_format($_POST['costoMercancia'.$i], 2);
		//$formattedCS = number_format($_POST['costoSeguro'.$i], 2);
		$time = strtotime($row["date"]);
		$newformat = date('d/m/Y',$time);
?>
		<tr>
			<td><?php echo $row["receipt"]; ?></td>
			<td><?php echo $row["shipper"]; ?> [<?php echo $row["shipperid"]; ?>]</td>
			<td align="right"><?php echo $newformat; ?></td>
			<td align="right"><?php echo $row["pieces"]; ?></td>
			<td align="right"><?php echo $row["weight"]; ?> lb</td>
			<td align="right"><?php echo $row["weightvol"]; ?> lb</td>
			<td align="right"><?php echo $row["volume"]; ?> cuft</td>
		</tr>
<?php 
	}
}
?>	
<tr>
	<td colspan="4" align="right">Totales:</td>
	<td align="right"><?php echo $sumaPeso; ?> lb</td>
	<td align="right"><?php echo $sumaPesoVolumetrico; ?> lb</td>
	<td align="right"><?php echo $sumaVolumen; ?> cuft</td>
</tr>
<?php 	
	$total = 0;
	$total = $totalCostoMercancia + $totalCostoSeguro + $totalCostoEnvio;
	$formattedTCM = number_format($totalCostoMercancia, 2);
	$formattedTCS = number_format($totalCostoSeguro, 2);
	$formattedTCE = number_format($totalCostoEnvio, 2);	
	$formattedT = number_format($total, 2);	
	$monto = 0;
	if ($_POST['metodo'] == 13)
		{
			$costo = 4;
		}
	else
		{
			$costo = 16;
		}
	if ($sumaPesoVolumetrico > $sumaPeso)
		{
			$monto = ($sumaPesoVolumetrico * $costo) + $seguro;	
		}
	else
		{
			$monto = ($sumaPeso * $costo) + $seguro;	
		}
?>	
</table>
<br>
<br>
<table  style="border-collapse: separate; border-spacing: 5px; width:35%;" align="center" >
<tr>
	<td style="background-color:#004c96; color:#FFF;">Destino:</td>
    <td align="right">Venezuela</td>
</tr>
<tr>
	<td style="background-color:#004c96; color:#FFF;">M&eacute;todo de Envio:</td>
    <td align="right">
<?php 
	if($_POST['metodo']==13){ echo "Express Aereo";}
	if($_POST['metodo']==12){ echo "Express Maritimo";}
	if($_POST['metodo']==1){ echo "Hold";}
?>
	</td>
</tr>
<?php if($_POST['repack'] == 0){ ?>
<tr>
    <td style="background-color:#004c96; color:#FFF;">Total Costo Encomienda <?php echo $_POST['repack']; ?></td>
	<td align="right">$ <?php echo $monto; ?></td>
</tr>
<?php } ?>
</table>

<div align="center">
<input type="checkbox" name="radioConfirma" value="1" onclick="javascript:activarboton();" />

<a href="#" data-toggle="modal" data-target="#myModal">He leido y acepto las condiciones del servicio.</a>
</div>
<div align="center"><input name="btnConfirma"  id="btnConfirma" type="submit" value="Confirmar Instrucciones" class="btn btn-success" disabled="disabled" /></div>
</form>
<br>
<br>
<br>
<br>
<br>



<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Condiciones del Servicio</h4>
      </div>
      <div class="modal-body">
        <small><strong>T&eacute;rminos y condiciones - LatamXpress</strong></small>
        <br>
      	<small>En &eacute;sta p&aacute;gina usted encontrar&aacute; una versi&oacute;n est&aacute;ndar de los t&eacute;rminos y condicionesdel sitio web de LatamXpress. N&oacute;tese que ciertos pa&iacute;ses pueden requerir t&eacute;rminos y condicionesdiferentes.</small>
      <small>Los T&eacute;rminos y Condiciones de uso del sitio web de LatamXpress son los siguientes:</small>
      <small><br />
        <strong>Autorizaci&oacute;n para Reproducci&oacute;n</strong></small>
        <br>
      <small>
      Cualquier persona puede reproducir cualquier parte del material de estas p&aacute;gina web sujeto a lassiguientes condiciones:</small><ul>
        <li class=menu01>El material solamente puede ser utilizado con prop&oacute;sitos informativos o no comerciales<br /></li>
        <li class=menu01>No puede modificarse en ning&uacute;n modo<br /></li>
        <li class=menu01>No puede realizarse ninguna copia no autorizada de cualquier marca registrada de LatamXpress<br /></li>
        <li><span class=menu01>Cualquier copia de cualquier parte del material debe incluir el siguiente aviso de derechos de autor: Copyright ©  LatamXpress. Todos los Derechos Reservados.</span><br />
        </li></ul><br>
      <small><strong>Otras Marcas Registradas y Nombres Comerciales</strong><br />
        <br />
        Todas las marcas registradas o nombres comerciales a los que se refiere este material son propiedad de sus respectivos due&ntilde;os.<br />
      </small><br>
<small><strong>Comentarios</strong></small><br>
<small>LatamXpress le agradece su informaci&oacute;n, ideas y sugerencias, pero no podr&aacute; responder todos los comentarios individuales. LatamXpress podr&aacute; utilizar cualquier informaci&oacute;n por usted enviada y actuar en consecuencia.<br />
Utilizaci&oacute;n de caracter&iacute;sticas interactivas en este sitio</small>
<small>Para su conveniencia, LatamXpress podr&aacute; ofrecer caracter&iacute;sticas interactivas en este sitio, tal como acceso a comentarios de rastreo y de usuario. Usted est&aacute; autorizado a utilizar estas caracter&iacute;sticas solamente con fines espec&iacute;ficos y con ning&uacute;n otro fin.</small><br>
<small><strong>Correcci&oacute;n de este sitio</strong></small><br>
 <small>Esta p&aacute;gina web puede contener errores que hayan pasado inadvertidos o errores tipogr&aacute;ficos. Estos ser&aacute;n corregidos a discreci&oacute;n de LatamXpress, a medida que se identifiquen. La informaci&oacute;n en esta p&aacute;gina web se actualiza regularmente, pero los errores pueden permanecer u ocurrir a medida que se realizan cambios durante las actualizaciones. La informaci&oacute;n de Internet se mantiene en forma independiente en varios sitios en todo el mundo y parte de la informaci&oacute;n a la que se accede a trav&eacute;s de &eacute;sta p&aacute;gina web puede originarse fuera de LatamXpress. LatamXpress declina toda obligaci&oacute;n o responsabilidad por este contenido.<br /></small>
<small><strong>Virus</strong></small>
<small>LatamXpress realizar&aacute; todos los esfuerzos razonables para excluir virus incluidos en la p&aacute;gina web, pero no puede asegurar la exclusi&oacute;n total y no aceptar&aacute; responsabilidad legal por tales virus. Usted deber&aacute; adoptar las medidas apropiadas antes de descargar formaci&oacute;n de esta p&aacute;gina web.<br /><br />
<strong>Declinaci&oacute;n de Responsabilidad</strong></small>
<small>Los servicios, el contenido e informaci&oacute;n en este sitio web se proporcionan sobre la hipot&eacute;tica base de ‘como si’. LatamXpress, hasta donde lo permita la ley, declinar&aacute; todas las responsabilidades, ya sean &eacute;stas expresas, t&aacute;citas, estatutarias o de otro tipo, incluyendo, aunque no exclusivamente, las garant&iacute;as impl&iacute;citas de comercializaci&oacute;n, no infracci&oacute;n por terceras partes y aptitud para un prop&oacute;sito especial. LatamXpress y sus afiliadas y licenciatarias no representan o se responsabilizan por la correcci&oacute;n, completitud, seguridad o adecuaci&oacute;n de los servicios, contenido o informaci&oacute;n proporcionada en o a trav&eacute;s del sitio web de LatamXpress o sus sistemas. Ninguna informaci&oacute;n obtenida a trav&eacute;s de los sistemas o el sitio web de LatamXpress crear&aacute; ninguna responsabilidad que no sea expl&iacute;citamente expresada por LatamXpress en estos t&eacute;rminos y condiciones.</small>
<small>Algunas jurisdicciones no permiten limitaciones impl&iacute;citas de responsabilidad, es por eso que las limitaciones y exclusiones en esta secci&oacute;n pueden no aplicarse a su caso si usted es un cliente. Estas previsiones no afectar&aacute;n sus derechos estatutarios a los que no puede renunciar, en caso de haberlos. Usted manifiesta que est&aacute; de acuerdo y conoce que las limitaciones y exclusiones de responsabilidad y garant&iacute;as expresadas en estos t&eacute;rminos y condiciones son justas y razonables.<br /></small>
<small><strong>Limitaci&oacute;n de responsabilidad</strong></small>
<small>En la medida de lo permitido por ley, en ning&uacute;n caso podr&aacute; LatamXpress ni sus afiliadas, 
 licenciatarias o terceros mencionados en el sitio web de LatamXpress ser responsables por cualquier da&ntilde;o 
 incidental, indirecto, ejemplar, punitivo o consecuencial, p&eacute;rdida de ganancias o da&ntilde;os resultantes de p&eacute;rdida de informaci&oacute;n o interrupci&oacute;n del servicio a consecuencia del uso o la incapacidad de utilizar el sitio web de LatamXpress y cualquier sistema, servicio, contenido o informaci&oacute;n ya sea en garant&iacute;a, contrato, agravio, ofensa, o cualquier otra teor&iacute;a legal, a&uacute;n en el caso de que LatamXpress haya sido asesorado sobre la posibilidad de tal da&ntilde;o. Sin perjuicio de lo anterior, y hasta donde lo permita la ley, usted manifiesta estar de acuerdo que en ning&uacute;n caso la responsabilidad de LatamXpress por cualquier da&ntilde;o (directo o no) o p&eacute;rdida, sin importar la forma de la acci&oacute;n o reclamo, tanto si es parte de un contrato, agravio u otro medio, exceder&aacute; los EUR 100.00. Mientras lo permita la ley, las soluciones establecidas por usted en estos t&eacute;rminos y condiciones son exclusivas y est&aacute;n limitadas a las expresamente proporcionadas por estos t&eacute;rminos y condiciones.</small>
<small><strong>Productos y Servicios</strong></small>
<small>A menos que haya sido expresado en forma escrita, el transporte de productos y servicios mencionados en &eacute;sta p&aacute;gina web est&aacute; sujeto a los t&eacute;rminos y condiciones de env&iacute;o de LatamXpress. Dado que &eacute;stos pueden variar dependiendo de la ubicaci&oacute;n del pa&iacute;s de origen del env&iacute;o, contacte al centro de servicio LatamXpress m&aacute;s cercano para obtener una copia de los t&eacute;rminos y condiciones locales. Puede que no todos los productos y servicios de LatamXpress est&eacute;n disponibles en todos los pa&iacute;ses. <br />
<br /><strong>        Divulgaci&oacute;n de informaci&oacute;n</strong></small>
<small>Toda la informaci&oacute;n brindada a LatamXpress por los visitantes de &eacute;sta p&aacute;gina web se considerar&aacute; confidencial y no ser&aacute; divulgada por LatamXpress a ning&uacute;n tercero, excepto en el caso que se requiera para la provisi&oacute;n de los servicios.</small></small>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>



<?php include('pie.php'); ?>