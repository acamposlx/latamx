<?php
include_once('funciones.php');
?>
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>...::: Latam Xpress :::...</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link href="Styles/style-1.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="scripts/select_dependientes.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>



<script type="text/javascript">
    function confirmEmail() {
        var email = document.getElementById("txtEmail").value
        var confemail = document.getElementById("confemail").value
        if(email != confemail) {
            alert('Email Not Matching!');
        }
    }



    function confirmPass() {
        var pass = document.getElementById("password").value
        var confpass = document.getElementById("confpassword").value
        if(pass != confpass) {
            alert('No concuerdan los password!');
        }
    }
</script>



</head>
<body>

<form method="post" id="formdata" action="registroAction.php">
<input name="txtNombreDireccion" type="hidden" value="Principal">
  <table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td height="100"><img src="img/logo_mail.png"></td>
      <td align="right"><img src="img/slogan_black.png" width="201" height="16"></td>
    </tr>
  </table>

  <div id="exito" style="display:none" align="center"> Sus datos han sido recibidos con &eacute;xito. En 24 horas podr&aacute; ingresar al sistema por la direcci&oacute;n: <a href="http://www.latamxpress.com/app">http://www.latamxpress.com/app</a></div>
	<div id="fracaso" style="display:none"> Se ha producido un error durante el env&iacute;o de datos. </div>
  <hr color="#CCCCCC">





  <div class="container container-fluid">
    <div class="row">
      <div class="col-md-3"><span class="txt2">Registrar Usuario</span> </div>
      <div class="col-md-9" align="right"><font color="#2B80AB" size="2">*</font><span class="Normal">Campos Requeridos</span></div>
    </div>
    <br>
    <div class="row">
      <div class="col-md-3">Nombre:</div>
      <div class="col-md-3"><input name="nombre" id="nombre" type="text" class="form-control" style="width:100%;"  required="required"></div>
      <div class="col-md-3">Apellido:</div>
      <div class="col-md-3"><input name="apellido" id="apellido" type="text" class="form-control" style="width:100%;"  required="required"></div>
    </div>
        <br>
    <div class="row">
      <div class="col-md-3">E-mail</div>
      <div class="col-md-3"><input name="txtEmail" id="txtEmail" type="text" class="form-control" style="width:100%;"  required="required"></div>
      <div class="col-md-3">Confirmar E-mail</div>
      <div class="col-md-3"><input name="confemail" id="confemail" onblur="confirmEmail();" type="text" class="form-control" style="width:100%;"  required="required"></div>
    </div>
        <br>


    <div class="row">
      <div class="col-md-3">Password</div>
      <div class="col-md-3"><input name="password" id="password" type="password" class="form-control" style="width:100%;"  required="required" placeholder="Password"></div>
      <div class="col-md-3">Confirmar Password</div>
      <div class="col-md-3"><input name="confpassword" id="confpassword" type="password" onblur="confirmPass();" class="form-control" style="width:100%;"  required="required" placeholder="Confirmar Password"></div>
    </div>
        <br>
    <div class="row">
      <div class="col-md-3">Num. de Identificación</div>
      <div class="col-md-3"><input name="identificacion" type="text" class="form-control" style="width:100%;"  required="required" placeholder="10254144"><font size="1">(N&uacute;mero de pasaporte / C&eacute;dula / RIF)</font></div>
      <div class="col-md-3">Teléfono</div>
      <div class="col-md-3"><input name="telefono" type="text" class="form-control"  placeholder="+582125555555" required></div>
    </div>
        <br>
    <div class="row">
      <div class="col-md-3">Sexo</div>
      <div class="col-md-3"><select name="sexo" class="form-control" style="width:100%;">
      <option value="0" selected>Seleccione---</option>
      <option value="1">Masculino</option>
      <option value="2">Femenino</option>
      </select></div>
      <div class="col-md-3">Fecha de Nacimiento</div>
      <div class="col-md-3"><input type="text" name="fechanac" class="form-control" placeholder="01/01/2017"></div>
    </div>
        <br>
    <div class="row">
      <div class="col-md-3">Dirección</div>
      <div class="col-md-9"><textarea name="txtDireccion" id="txtDireccion" runat="server" wrap="VIRTUAL" class="form-control" required="required"></textarea></div>
    </div>
        <br>
    <div class="row">
      <div class="col-md-3">Estado</div>
      <div class="col-md-3"><?php generaEstados(); ?></div>
      <div class="col-md-3">Ciudad</div>
      <div class="col-md-3"><div id='ajaxDiv'><select name='ciudades' id='ciudades' class='form-control' style='width:100%;' required=required>"
      <option value='0'>Elige</option></select></div></div>
    </div>
    <br>
    <div class="row">
      <div class="col-md-12" style="text-align: right;"><input name="" type="submit" class="btn btn-success" value="Registrar"></div>
    </div>
  </div>
</form>

<script>
function validaForm(){
    // Campos de texto
    if($("#nombre").val() == ""){
        alert("El campo Nombre no puede estar vac&iacute;o.");
        $("#nombre").focus();       // Esta funci&oacute;n coloca el foco de escritura del usuario en el campo Nombre directamente.
        return false;
    }
    if($("#apellido").val() == ""){
        alert("El campo Apellidos no puede estar vac&iacute;o.");
        $("#apellidos").focus();
        return false;
    }
    if($("#direccion").val() == ""){
        alert("El campo Direcci&oacute;n no puede estar vac&iacute;o.");
        $("#direccion").focus();
        return false;
    }



    return true; // Si todo est&aacute; correcto
}


</script>
</body>
</html>
