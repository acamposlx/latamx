<?php
session_start();
$pagina="dashboard";
include('head.php');
include_once('funciones.php');


if(isset($_SESSION['ConsigneeCode'])){
    $acceso = 1;
} else {
    $acceso = 0;
}
if ($acceso==0){
?>

<div class="col-sm-3 col-lg-12" align="center">No puede ingresar a esta secci&oacute;n.</div>
<?php
    include('pie.php');
    die();
}

$pendientes = cantidadPendientes($_SESSION['ConsigneeCode']);
$transito = cantidadTransito($_SESSION['ConsigneeCode']);
$historial = cantidadHistorial($_SESSION['ConsigneeCode']);
$facturas = cantidadFacturas($_SESSION['ConsigneeCode']);
$hold = cantidadHold($_SESSION['ConsigneeCode']);
$pendientes = $pendientes + $hold;


?>
        <script type="text/javascript">
        swal({
        title: "Exito!",
        text: "Ingreso Correcto",
        type: "success",
        confirmButtonText: "Cerrar"
        });
        </script>

<br />
<br />
<br />
<br />
<a href="embarquespendientes.php" id="u9142-4" class="u9142-4">
<div class="col-sm-3 col-lg-3">
  <div class="block-unitEP" id="block-unitEP">
    <p class="u9142-4" style="text-align: center;"> EMBARQUES PENDIENTES </p>
    <hr style="width: 100%; color: white;" />
    <div align="center">
      <table style="width: 90%; align-items: center; align-content: center;">
        <tr>
          <td rowspan="3" style="align-items: center;"><img src="Images/calendar.png" /></td>
          <td class="u9155-2"><p class="u9155-2" id="u9155-2" style="text-align: right;">Para la fecha usted tiene:</p></td>
        </tr>
        <tr>
          <td class="u9155-4"><p class="u9155-4" id="u9155-4" style="text-align: right;">Embarques pendientes</p></td>
        </tr>
        <tr>
          <td class="u10194-4"><p class="u10194-4" id="u10194-4" style="text-align: right;"><?php echo $pendientes; ?></p></td>
        </tr>
      </table>
    </div>
  </div>
</div>
</a><a href="embarquestransito.php" id="u9142-4" class="u9142-4">
<div class="col-sm-3 col-lg-3">
  <div class="block-unitET" id="block-unitET">
    <p class="u9142-4" style="text-align: center;"> EMBARQUES EN TR&Aacute;NSITO 
    <hr style="width: 100%; color: white;" />
    </p>
    <div align="center">
      <table style="width: 90%; align-items: center; align-content: center;">
        <tr>
          <td rowspan="3" style="align-items: center;"><img src="Images/traffic.png" /></td>
          <td class="u9155-2"><p class="u9155-2" id="u9155-2" style="text-align: right;">Para la fecha usted tiene:</p></td>
        </tr>
        <tr>
          <td class="u9155-4"><p class="u9155-4" id="u9155-4" style="text-align: right;">Embarques en tr&aacute;nsito</p></td>
        </tr>
        <tr>
          <td class="u10194-4"><p class="u10194-4" id="u10194-4" style="text-align: right;"> <?php echo $transito; ?> </p></td>
        </tr>
      </table>
    </div>
  </div>
</div>
</a><a href="historial.php" id="u9142-4" class="u9142-4">
<div class="col-sm-3 col-lg-3">
  <div class="block-unitHIST" id="block-unitHIST">
    <p class="u9142-4" style="text-align: center;"> HISTORIAL
    <hr style="width: 100%; color: white;" />
    </p>
    <div align="center">
      <table style="width: 90%; align-items: center; align-content: center;">
        <tr>
          <td rowspan="3" style="align-items: center;"><img src="Images/history.png" /></td>
          <td class="u9155-2"><p class="u9155-2" id="u9155-2" style="text-align: right;">Para la fecha usted tiene:</p></td>
        </tr>
        <tr>
          <td class="u9155-4"><p class="u9155-4" id="u9155-4" style="text-align: right;">Embarques en total</p></td>
        </tr>
        <tr>
          <td class="u10194-4"><p class="u10194-4" id="u10194-4" style="text-align: right;"> <?php echo $historial; ?> </p></td>
        </tr>
      </table>
    </div>
  </div>
</div>
</a> <a href="invoices.php" id="u9142-4" class="u9142-4">
<div class="col-sm-3 col-lg-3">
  <div class="block-unitFACT" id="block-unitFACT">
    <p class="u9142-4" style="text-align: center;">FACTURAS
    <hr style="width: 100%; color: white;" />
    </p>
    <div align="center">
      <table style="width: 90%; align-items: center; align-content: center;">
        <tr>
          <td rowspan="3" style="align-items: center;"><img src="Images/facturas.png" /></td>
          <td class="u9155-2"><p class="u9155-2" id="u9155-2" style="text-align: right;">Para la fecha usted tiene:</p></td>
        </tr>
        <tr>
          <td class="u9155-4"><p class="u9155-4" id="u9155-4" style="text-align: right;">Facturas en total</p></td>
        </tr>
        <tr>
          <td class="u10194-4"><p class="u10194-4" id="u10194-4" style="text-align: right;"> <?php echo $facturas; ?> </p></td>
        </tr>
      </table>
    </div>
  </div>
</div>
</a>
<?php include('pie.php'); ?>
