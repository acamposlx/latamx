<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<style type="text/css">
#form1 table tr td table {
	color: #FFF;
}
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="solicitaAction.php">
  <input name="medidasel" type="hidden" value="<?php echo $_GET['medidasel']; ?>" />
  <input name="pesosel" type="hidden" value="<?php echo $_GET['pesoSel']; ?>" />
  <input name="pesoindicado" type="hidden" value="<?php echo $_GET['pesoIndicado']; ?>" />
  <input name="largo" type="hidden" value="<?php echo $_GET['largo']; ?>" />
  <input name="ancho" type="hidden" value="<?php echo $_GET['ancho']; ?>" />
  <input name="alto" type="hidden" value="<?php echo $_GET['alto']; ?>" />
  <table width="95%" border="0" align="center">
    <tr>
      <td><img src="images/logo_web1.png" width="221" height="67" /></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3">Por favor llene el siguiente formulario para solicitar una cotización con las siguientes especificaciones:</td>
    </tr>
    <tr>
      <td colspan="3"><table width="100%" border="0">
          <tr>
            <td bgcolor="#000033">Tipo de Envio</td>
            <td bgcolor="#000033">&nbsp;</td>
            <td bgcolor="#000033"><?php 
			if (isset($_GET['pesoSel']))
				{ 
					echo "Aereo";
				}
			else
				{ 
					echo "Maritimo";
				}
?></td>
          </tr>
          <tr>
            <td bgcolor="#000033">Largo</td>
            <td bgcolor="#000033">&nbsp;</td>
            <td  style="font-family:Tahoma, Geneva, sans-serif; color:#000"><?php echo $_GET['largo']; ?> &nbsp; <?php echo  $_GET['medidasel'];?></td>
          </tr>
          <tr>
            <td bgcolor="#000033">Ancho</td>
            <td bgcolor="#000033">&nbsp;</td>
            <td  style="font-family:Tahoma, Geneva, sans-serif; color:#000"><?php echo $_GET['ancho']; ?> &nbsp;<?php echo  $_GET['medidasel'];?></td>
          </tr>
          <tr>
            <td bgcolor="#000033">Alto</td>
            <td bgcolor="#000033">&nbsp;</td>
            <td  style="font-family:Tahoma, Geneva, sans-serif; color:#000"><?php echo $_GET['alto']; ?> &nbsp;<?php echo  $_GET['medidasel'];?></td>
          </tr>
          <?php 
			if (isset($_GET['pesoSel']))
				{ ?>
          <tr>
            <td bgcolor="#000033">Peso</td>
            <td bgcolor="#000033">&nbsp;</td>
            <td  style="font-family:Tahoma, Geneva, sans-serif; color:#000"><?php echo $_GET['pesoIndicado']; ?> &nbsp;<?php echo  $_GET['pesoSel'];?></td>
          </tr><?php 	}
?>
      </table></td>
    </tr>
    <tr>
      <td>Nombre</td>
      <td>&nbsp;</td>
      <td><label for="nombre"></label>
        <input type="text" class="form form-control" name="nombre" id="nombre" /></td>
    </tr>
    <tr>
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td>Email</td>
      <td>&nbsp;</td>
      <td><input name="email" type="text" class="form form-control" id="email" /></td>
    </tr>
    <tr>
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td>Teléfono de Contacto</td>
      <td>&nbsp;</td>
      <td><input name="telefono" type="text" class="form form-control" id="textfield" /></td>
    </tr>
    <tr>
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="submit" name="button" class="w3-btn w3-round-large w3-blue  w3-small" id="button" value="Cotizar" /></td>
    </tr>
  </table>
</form>
</body>
</html>