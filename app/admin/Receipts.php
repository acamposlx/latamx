<?php
ini_set('max_execution_time', 900);
include_once('conexion.php');

$fecha = date('m/j/Y');
$nuevafecha = strtotime ( '-45 day' , strtotime ( $fecha ) ) ;
$nuevafecha = date ( 'm/j/Y' , $nuevafecha );

/* Initialize webservice with your WSDL */
$client = new SoapClient("http://s6.stephytrackingonline.com/stows/stows.asmx?wsdl");

/* Fill your Contact Object */


/* Set your parameters for the request */
$params = array(
  	"Username" => 'LatamCargoUSAWS',
  	"Password" => 'L@c678dRttR#8rt78fhjruw@y328@#178$',
  	"Serial" => 'LatamCargoUSA',
	"CustomerType"	=> '0',
	"Receipt"	=> '',
	"ShipperID"	=> '',
	"ConsigneeID"	=> '',
	"AgentID"	=> '',
	"FromDate" => $nuevafecha,
	"ToDate" => $fecha,
	"DateType"	=> '0',
);

/* Invoke webservice method with your parameters, in this case: Function1 */
$result = $client->__soapCall("WSGetReceipts", array($params));
$array = (array) $result;
$array = get_object_vars($result);
if(is_XML($array["WSGetReceiptsResult"])){
	$xml= str_replace('">','" />',$array["WSGetReceiptsResult"]);
	$xml = str_replace('</row>','',$xml);
	$xml = new SimpleXMLElement($xml);
	$json = json_encode($xml);
	$array = json_decode($json,TRUE);
	if(isset($array["row"] )){
		foreach ($array["row"] as $filas){
			$datos[] = $filas["@attributes"];
		}
  	} else {
		$datos = $array["@attributes"];
	}
	$i = 0;
	//print_r($datos);
	foreach($datos as $obj){
		$sql = "select * from receipts where Receipt = ".$obj['Receipt'];
		$result = $conn->query($sql);
		if ($result->num_rows == 0) {
			$i++;
			$weight = substr($obj['Weight'], 0, 4);
			$volume = substr($obj['Volume'], 0, 4);
			$weightvol = substr($obj['WeightVol'], 0, 4);

			if ($obj['AgentID'] == ''){
				$agenteid =0;
			} else{
				$agenteid = $obj['AgentID'];
			}



			$sqlI = "insert into receipts (receipt, date, shipperid, shipper, consigneeid, consignee, agentid, agent, pieces, weight, volume, weightvol, itemdescription, notes, countryid, instrucciones, entregado, embarcado, servicio, documento, reempacado) VALUES ('".$obj['Receipt']."', '".$obj['Date']."', '".$obj['ShipperID']."', '".$obj['Shipper']."', '".$obj['ConsigneeID']."', '".$obj['Consignee']."', '".$agenteid."', '".$obj['Agent']."', '".$obj['Pieces']."', '".$weight."', '".$volume."', '".$weightvol."', '".$obj['ItemDescription']."', '".$obj['Notes']."', '".$obj['CountryID']."', 0, 0, 0, 0, 0, 0)";
			if ($conn->query($sqlI) === TRUE) {
    			echo "New record created successfully" .$obj['Receipt'];
    			echo "<br>"; 
			} else {
    			echo "Error: " . $sqlI . "<br>" . $conn->error;
				echo "<br>"; 
			}

		}
	}
}
else
{
	print_r($result);
}

function is_XML($xml) {
    $doc = @simplexml_load_string($xml);
    if ($doc) {
        return true; //this is valid
    } else {
        return false; //this is not valid
    }
}

$conn->close();
?>