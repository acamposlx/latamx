<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
date_default_timezone_set('Europe/Bucharest');
require_once('lib/nusoap.php');
require_once('admin/conexion.php');
$servicio="http://latam-cargo.com.ve/ServicioReceipts.svc?wsdl"; //url del servicio
$parametros=array(); //parametros de la llamada
$parametros['Username']="LatamCargoUSAWS";
$parametros['Password']="L@c678dRttR#8rt78fhjruw@y328@#178$";
$parametros['Serial']="LatamCargoUSA";
$parametros['CustomerType']="0";

$client = new SoapClient($servicio, $parametros);
$result = $client->listaReceipts($parametros);//llamamos al métdo que nos interesa con los parámetros

$result = obj2array($result);




$Consigna=$result['listaReceiptsResult']['Entidades.ClsReceipts'];
$n=count($Consigna);

for($i=0; $i<$n; $i++){
    $consigna=$Consigna[$i];
    echo $consigna['Receipt'];
    echo "<br>";
  } 


    

mysqli_close($conn);
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
