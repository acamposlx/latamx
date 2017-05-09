<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
date_default_timezone_set('Europe/Bucharest');
require_once('lib/nusoap.php');
require_once('admin/conexion.php');
$servicio="http://latam-cargo.com.ve/ServicioConsignatarios.svc?wsdl"; //url del servicio
$parametros=array(); //parametros de la llamada




$parametros['Username']="LatamCargoUSAWS";
$parametros['Password']="L@c678dRttR#8rt78fhjruw@y328@#178$";
$parametros['Serial']="LatamCargoUSA";
$parametros['CustomerType']="0";

$parametros['FromDate']="01/01/2000";
$parametros['ToDate']="01/01/2016";
$parametros['AgentID']="";
$parametros['ConsigneeID']="";


$client = new SoapClient($servicio, $parametros);
$result = $client->listaConsignatarios($parametros);//llamamos al métdo que nos interesa con los parámetros


$result = obj2array($result);
$Consigna=$result['listaConsignatariosResult']['Entidades.Consignatarios'];
$n=count($Consigna);

for($i=0; $i<$n; $i++){
    $ConsigneeCode=$Consigna[$i]['ConsigneeCode'];
    $Add1 = $Consigna[$i]['Add1'];
    $Add2 = $Consigna[$i]['Add2'];
    $City = $Consigna[$i]['City'];
    $Contact = $Consigna[$i]['Contact'];
    $Country = $Consigna[$i]['Country'];
    $Date = $Consigna[$i]['Date'];
    $Destination = $Consigna[$i]['Destination'];
    $Email = $Consigna[$i]['Email'];
    $ID1 = $Consigna[$i]['ID1'];
    $ID2 = $Consigna[$i]['ID2'];
    $Name = $Consigna[$i]['Name'];
    $Notas = $Consigna[$i]['Notas'];
    $Password = $Consigna[$i]['Password'];
    $Phone1 = $Consigna[$i]['Phone1'];
    $Phone2 = $Consigna[$i]['Phone2'];
    $State = $Consigna[$i]['State'];
    $StatusID = $Consigna[$i]['StatusID'];
    $ZipCode=$Consigna[$i]['ZipCode'];


    $sql = "SELECT * FROM consignatario where ConsigneeCode = ".$ConsigneeCode;
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        // output data of each row
        while($row = $resultado->fetch_assoc()) {

        }
    } else {

      $sqlI = "INSERT INTO consignatario (ConsigneeCode, Add1, Add2, City, Contact, Country, Date, Destination, Email, ID1, ID2, Name, Notas, AccessPassword, Phone1, Phone2, State, StatusID, ZipCode) VALUES (".$ConsigneeCode.", '".$Add1."', '".$Add2."', '".$City."', '".$Contact."', '".$Country."', '".$Date."', '".$Destination."', '".$Email."', '".$ID1."', '".$ID2."', '".$Name."', '".$Notas."', '".$Password."', '".$Phone1."', '".$Phone2."', '".$State."', ".$StatusID.", '".$ZipCode."')";

      if ($conn->query($sqlI) === TRUE) {
          echo "New record created successfully";
          echo "<br>";
      } else {
          echo "Error: " . $sqlI . "<br>" . $conn->error;
      }

    }

    //aquí iría el resto de tu código donde procesas los datos recibidos
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
$conn->close();
?>
