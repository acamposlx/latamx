<?php  
function consignatarios($fechadesde, $fechahasta, $agente, $consignatario){
	$client = new SoapClient("http://s6.stephytrackingonline.com/stows/stows.asmx?wsdl");
	$params = array(
	"Username" => 'LatamCargoUSAWS',
	"Password" => 'L@c678dRttR#8rt78fhjruw@y328@#178$',
	"Serial" => 'LatamCargoUSA',
	"CustomerType" => '0',
	"FromDate" => $fechadesde,
	"ToDate" => $fechahasta,
	"AgentID" => $agente,
	"ConsigneeID" => $consignatario,
	);
	$result = $client->__soapCall("WSGetConsignees", array($params));
	$array = (array) $result;
	$array = get_object_vars($result);
	if(is_XML($array["WSGetConsigneesResult"])){
 	 	$xml= str_replace('">','" />',$array["WSGetConsigneesResult"]);
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
  		
		return $datos;
	}
}
?>