<?php
session_start();
$pagina="cuenta";
include('head.php');
include_once('admin/conexion.php');

if (isset($_SESSION['ConsigneeCode'])){
	$sqlDatos = "select * from consignatario where ConsigneeCode = '".$_SESSION['ConsigneeCode']."'";
	$resultDatos = $conn->query($sqlDatos);
	if ($resultDatos->num_rows > 0) {
		while($row = $resultDatos->fetch_assoc()) {
        	$codigocon = $row["ConsigneeCode"];
			$Email = $row["Email"];
			$Nombre = $row["Name"]. " " .$row["apellido"];
            $Cedula = $row["cedula"];
            $FechaNac = $row["fechaNac"];
            $Telefono = $row["telefono"];
            $Password = $row["AccessPassword"];
            $Apellido = $row["apellido"];
          }
		}

		$sqlDirecciones = "SELECT direcciones.direccion, direcciones.nombreDireccion, ciudades.ciudad, direcciones.cedula, direcciones.idDireccion FROM direcciones INNER JOIN ciudades ON ciudades.id_ciudad = direcciones.idCiudad where cedula = '".$_SESSION['cedula']."'";


		$resultDirecciones = $conn->query($sqlDirecciones);



    $sqlTarjetas = "SELECT * FROM tarjetas where cedula = '".$_SESSION['cedula']."'";


    $resultTarjetas = $conn->query($sqlTarjetas);
	}


if (isset($_GET["mensaje"])){
switch ($_GET["mensaje"]) {
    case 1:
      $mensaje = "Direccion Agregada";
      break;
    case 2:
      $mensaje = "Tarjeta Agregada";
      break;
    case 3:
      $mensaje = "Datos Modificados";
      break;
    case 4:
      $mensaje = "Dirección Modificada";
      break;
    case 5:
      $mensaje = "Dirección Eliminada";
      break;
    case 6:
      $mensaje = "Tarjeta Modificada";
      break;
    case 9:
      $mensaje = "Tarjeta Eliminada";
      break;

    default:
        echo "Your favorite color is neither red, blue, nor green!";
}


?>

<div class="alert alert-success">
  <strong>Exito!</strong> <?php echo $mensaje; ?>
</div>
<?php
}


?>


<br>
<div class="container">
  <div class="row">
    <div class="col-lg-offset-2 col-lg-8 bloqueCuenta">
      <div class="row">
        <table width="100%">
          <tr>
            <td><i class="material-icons" style="font-size:90px;color:white;">account_box</i></td>
            <td><table width="75%">
                <tr>
                  <td class="tituloCuenta"><?php echo $Nombre; ?></td>
                  <td align="right" style="color: #298be8; font-style: normal; font-weight: bold; font-size: 14px;">&nbsp;#&nbsp;<?php echo $codigocon; ?></td>
                </tr>
                <tr>
                  <td colspan="2"><hr width="100%" color="white"></td>
                </tr>
                <tr>
                  <td class="tituloCuenta2">Email: </td>
                  <td class="datosCuenta2"><?php echo $Email; ?></td>
                </tr>
                <tr>
                  <td class="tituloCuenta2">Cédula: </td>
                  <td class="datosCuenta2"><?php echo $Cedula; ?></td>
                </tr>
                <tr>
                  <td class="tituloCuenta2">Fecha de Nacimiento: </td>
                  <td class="datosCuenta2"><?php echo $FechaNac; ?></td>
                </tr>
              </table></td>
            <td><table>
                <tr>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td><a href="javascript:showhide('info')"><img src="img/btnModificaDatos.jpg"></a></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td><a href="javascript:showhide('direcciones')"><img src="img/btnMisDirecciones.jpg"></a></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td><a href="javascript:showhide('tarjetas')"><img src="img/btnMisTarjetas.jpg"></a></td>
                </tr>
              </table></td>
          </tr>
        </table>
      </div>
			<div class="row" style="background-color: #FFF;">

			</div>
      <div class="row">
        <div class="col-sm-12 bloqueCuenta2" style="position: relative; z-index: 100;">
          <div class="row">
            <div class="col-sm-12" style="position: relative; z-index: 100;">
              <div id="info" style="display:none;">
              <br>
                <div class="table-responsive">
                  <table class="table"  style="background-color: #000;">
                    <tr>
                      <th class="tituloCuenta2">Datos Personales</th>
                      <th class="tituloCuenta2">Email</th>
                      <th class="tituloCuenta2">Cédula</th>
                      <th class="tituloCuenta2">Fecha de Nacimiento</th>
                      <th colspan="2"></th>
                    </tr>
                    <tr style="background-color: #75787a; height: 60px; padding-top: 25;">
                      <td class="datosCuenta"><?php echo $Nombre; ?></td>
                      <td class="datosCuenta"><?php echo $Email; ?></td>
                      <td class="datosCuenta"><?php echo $Cedula; ?></td>
                      <td class="datosCuenta"><?php echo $FechaNac; ?></td>
                      <td><a href="editarDatos.php"><img src="img/btnEditar.jpg"></a></td>
                    </tr>
                  </table>
                </div>

              <div class="row" style="background-color: white; height: 2px;">&nbsp;</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
        <div class="col-sm-12 bloqueCuenta2" style="position: relative; z-index: 100;">
          <div class="row">
            <div class="col-sm-12" style="position: relative; z-index: 100;">
              <div id="direcciones" style="display:none;"><br>
                <br>
                <div class="row" style="background-color: #686765;">
                  <div class="col-sm-12" style="text-align: right;"> <span align="right" class="subtitulos"><i class="material-icons" style="font-size:15px;color:white;">add_to_queue</i><a href="AgregaDireccion.php" class="titulos2">Agregar Direcci&oacute;n</a></span> </div>
                </div><br>
                <div class="table-responsive">
                  <table class="table"  style="background-color: #000;">
                    <tr>
                      <th class="tituloCuenta2">Direcciones</th>
                      <th class="tituloCuenta2">Ciudad</th>
                      <th class="tituloCuenta2">Cédula</th>
                      <th class="tituloCuenta2">Tipo</th>
                      <th colspan="2"></th>
                    </tr>
                    <?php
                if ($resultDirecciones->num_rows > 0) {
                  while($rowD = $resultDirecciones->fetch_assoc()) {
                    $small = substr($rowD["direccion"], 0, 100);
?>
                    <tr style="background-color: #75787a; height: 60px; padding-top: 25;">
                      <td class="datosCuenta"><?php echo $small; ?></td>
                      <td class="datosCuenta"><?php echo $rowD["ciudad"]; ?></td>
                      <td class="datosCuenta"><?php echo $rowD["cedula"]; ?></td>
                      <td class="datosCuenta"><?php echo $rowD["nombreDireccion"]; ?></td>
                      <td><form method="post" action="ActualizaDireccion.php">
                          <input type="hidden" name="iddireccion" value="<?php echo $rowD["idDireccion"]; ?>">
                          <input type="image" name="submit" src="img/btnEditar.jpg" border="0" alt="Submit" />
                        </form></td>
                      <td><form method="post" action="EliminaDireccion.php"  onsubmit="return confirm('Esta Seguro de eliminar la dirección?');">
                        <input type="hidden" name="iddireccion" value="<?php echo $rowD["idDireccion"]; ?>">
                        <input type="image" name="submit" src="img/btnEliminar.jpg" border="0" alt="Submit" />
                        </form></td>
                    </tr>
                    <?php
                  }
                }
?>
                  </table>
                </div>
              <div class="row" style="background-color: white; height: 2px;">&nbsp;</div>
            </div>
          </div>
        </div>
      </div>
    </div><br><br>
<!-- tarjetas -->
    <div class="row">
        <div class="col-sm-12 bloqueCuenta2" style="position: relative; z-index: 100;">
          <div class="row">
            <div class="col-sm-12" style="position: relative; z-index: 100;">
              <div id="tarjetas" style="display:none;">
              <br>
                              <div class="row" style="background-color: #686765;">
                  <div class="col-sm-12" style="text-align: right;"> <span align="right" class="subtitulos"><i class="material-icons" style="font-size:15px;color:white;">add_to_queue</i><a href="AgregaTarjeta.php" class="titulos2">Agregar Tarjeta</a></span> </div>
                </div><br>
                <div class="table-responsive">
                  <table class="table"  style="background-color: #000;">
                    <tr>
                      <th class="tituloCuenta2">Tarjetas</th>
                      <th class="tituloCuenta2">Tipo</th>
                      <th class="tituloCuenta2">Numeración</th>
                      <th class="tituloCuenta2">Fecha Vencimiento</th>
                      <th colspan="2"></th>
                    </tr>
<?php
                    if ($resultTarjetas->num_rows > 0) {
                      while($rowT = $resultTarjetas->fetch_assoc()) {
?>
                        <tr style="background-color: #75787a; height: 60px; padding-top: 25;">
                          <td>&nbsp;</td>
                          <td class="datosCuenta"><?php echo $rowT["tipo"]; ?></td>
                          <td class="datosCuenta"><?php
                          $rest = substr($rowT["numeroTarjeta"], -4);
                          echo "****-****-****-".$rest; ?></td>
                          <td class="datosCuenta"><?php echo $rowT["fechaVencimiento"]; ?></td>
                          <td><form method="post" action="editaTarjeta.php">
                          <input type="hidden" name="idTarjeta" value="<?php echo $rowT["idTarjeta"]; ?>">
                          <input type="image" name="submit" src="img/btnEditar.jpg" border="0" alt="Submit" />
                          </form></td>
                          <td><form method="post" action="EliminaTarjeta.php"  onsubmit="return confirm('Esta Seguro de eliminar la tarjeta?');">
                          <input type="hidden" name="idtarjeta" value="<?php echo $rowT["idTarjeta"]; ?>">
                          <input type="image" name="submit" src="img/btnEliminar.jpg" border="0" alt="Submit" />
                          </form></td>
                        </tr>
<?php
                      }
                    }
?>
                  </table>
                </div>
              <div class="row" style="background-color: white; height: 2px;">&nbsp;</div>
            </div>
          </div>
        </div>
      </div>
    </div><br><br>
  </div>
</div>
</div>
</div>
<br>
<br>
<br>
<br>
<br>
<?php include('pie.php'); ?>
