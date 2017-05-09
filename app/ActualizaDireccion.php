<?php session_start();
include('httpful.phar');
$pagina="cuenta";
include('head.php'); 
include_once('admin/conexion.php');

$sql = "SELECT * FROM direcciones where idDireccion = ".$_POST['iddireccion'];

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$direccion = $row["direccion"];
		$nombreDireccion = $row["nombreDireccion"];
		$idDireccion = $row["idDireccion"];
    $idCiudadO= $row["idCiudad"];
    }
}





$sqlCiudad = "select * from ciudades  order by ciudad";
$resultC = $conn->query($sqlCiudad);





?>
<br>
<div class="container">
  <div class="bloqueCuenta">
    <form method="post" action="actualiza_direccion.php">
    <input type="hidden" name="iddireccion" value="<?php echo $idDireccion; ?>">
      <table class="table table-condensed">
    <tr>
      <th colspan="2" class="titulos" style="background-color: #000;">Modificar Dirección</th>
    </tr>
    <tr>
      <td class="tituloCuenta">Nombre:</td>
      <td><div class="input-group">
        <span class="input-group-addon" id="basic-addon1">Nombre</span>
        <input type="text" class="form-control" placeholder="Nombre" aria-describedby="basic-addon1" name="nombreDireccion" value="<?php echo $nombreDireccion; ?>">
      </div></td>
    </tr>
    <tr>
      <td class="tituloCuenta">Dirección:</td>
      <td><div class="input-group">
        <span class="input-group-addon" id="basic-addon2">Dirección</span>
        <textarea cols="25" rows="5" name="direccion" class="form form-control" aria-describedby="basic-addon2"><?php echo $direccion; ?></textarea></div></td>
    </tr>
    <tr>
      <td class="tituloCuenta">Ciudad:</td>
      <td><div class="input-group">
        <span class="input-group-addon" id="basic-addon6">Ciudad</span>
      <select name="idciudad" class="form form-control">
        <?php 
if ($resultC->num_rows > 0) {
    // output data of each row
    while($rowC = $resultC->fetch_assoc()) {
    if ($idCiudadO == $rowC["idCiudad"]){
      echo "hola";
?>
        <option selected="selected" value="<?php echo $rowC["idCiudad"]; ?>"><?php echo utf8_decode($rowC["ciudad"]);?></option>
        <?php 
    } else {
      echo "no";
?>
        <option value="<?php echo $rowC["idCiudad"]; ?>"><?php echo $rowC["ciudad"];?></option>
        <?php 
                  }

    }
}
?>
      </select></div></td>
    </tr>
    <tr>
      <td colspan="2" align="right"><input type="submit" class="btn btn-success" value="Modificar mi dirección"></td>
    </tr>
    </table>  
    </form>
    </div>
  </div>
<br>
<br>
<br>
<br>
<br>
<?php 

$conn->close();

include('pie.php'); ?>