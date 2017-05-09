<?php
date_default_timezone_set('Africa/Lagos');
session_start();
$pagina="Embarques";
include('head.php');
include_once('admin/conexion.php');
for ($i=1; $i < $_POST['cantidad'] + 1; $i++){
	require_once('lib/nusoap.php');
	$servicio="http://latam-cargo.com.ve/ServicioInstrucciones.svc?wsdl"; //url del servicio
	$parametros=array(); //parametros de la llamada
	$parametros['sReceipt']=$_POST['receipt'.$i];
	$parametros['sServicio']=$_POST['metodo'];
	$parametros['sSeguro']=$_POST['insurance'];
	$parametros['sMontoSeguro']="0";
	$parametros['sRepack']=$_POST['repack'];

	$client = new SoapClient($servicio, $parametros);
	$resultado = $client->asignarInstrucciones($parametros);//llamamos al métdo que nos interesa con los parámetros
	$resultado = obj2array($resultado);
	$resultadofinal= $resultado['asignarInstruccionesResult'];



	$sql = "UPDATE receipts SET instrucciones = 1 WHERE receipt=".$_POST['receipt'.$i];
	if ($conn->query($sql) === TRUE) {
    	
	} else {
    	
	}
}




function obj2array($obj) {
  $out = array();
  foreach ($obj as $key => $val) {
    switch(true) {
        case is_object($val):
         $out[$key] = obj2array($val);
         break;
      case is_array($val):
         $out[$key] = obj2array($val);
         break;
      default:
        $out[$key] = $val;
    }
  }
  return $out;
}
?>
<div id="container">
	<div class="row">
		<div class="alert alert-success" align="center">
  		<strong>Su solicitud de embarque ha sido procesada con éxito!!!</strong><br>
  		Gracias por preferirnos!
		</div>

	</div>
</div>
<br>
<br>
<br>
<br>
<br>
<?php include('pie.php'); ?>
</body>
</html>
