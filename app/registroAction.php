<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

include_once('funciones.php');
$nombreestado = estado_por_id($_POST['estados']);

$nombreciudad = ciudad_por_id($_POST['ciudades']);
$nombredestino = destino_por_id($_POST['ciudades']);

$resultado = generaUsuarioStephy($_POST['nombre'], $_POST['txtDireccion'], $nombreciudad, $nombreestado, $_POST['txtEmail'], $_POST['telefono'], $_POST['password'], $nombredestino );
foreach ($resultado as $r) {
	if($r == 'Email found!'){
		$newURL= "confirmaRegistroFallo.php?correo=".$_POST['txtEmail'];
		header('Location: '.$newURL);
	} else{
		$valorinserta = insertaConsignatario($r, $_POST['nombre'], $_POST['txtDireccion'], $_POST['ciudades'], $_POST['estados'], $_POST['txtEmail'], $_POST['telefono'], $nombredestino, $_POST['password'],   $_POST['apellido'], $_POST['sexo'], $_POST['fechanac'], $_POST['identificacion']);
	 	$insertadir = insertaDireccion($_POST['txtDireccion'], $_POST['ciudades'], $_POST['identificacion'], "PRINCIPAL", $_POST['txtEmail']);

	 		enviarEmailBienvenida($_POST['txtEmail'], $_POST['sexo']);
?>

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
        	<?php  if($_POST['sexo']==1) {?>


            <span style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif">Bienvenido</span>
<?php }else{ ?>
  	<span style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif">Bienvenida</span>
<?php } ?>
        	</h1>
          	<span style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif">Gracias por registrarte en <strong>LATAM XPRESS.<br>
          	</strong>
          	En breves momentos recibiras un correo con las instrucciones para activar tu cuenta.</span></td>
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
<?php  
	}
}
?>
