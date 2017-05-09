<?php  
function facturas($invoice, $shipper, $consignatario, $agente, $fechadesde, $fechahasta){
	$client = new SoapClient("http://s6.stephytrackingonline.com/stows/stows.asmx?wsdl");
	$params = array(
	"Username" => 'LatamCargoUSAWS',
	"Password" => 'L@c678dRttR#8rt78fhjruw@y328@#178$',
	"Serial" => 'LatamCargoUSA',
	"CustomerType" => '0',
	"Invoice" => $invoice,
	"ShipperID" => $shipper,
	"ConsigneeID" => $consignatario,
	"AgentID" => $agente,
	"FromDate" => $fechadesde,
	"ToDate" => $fechahasta,
	);
	$result = $client->__soapCall("WSGetInvoices", array($params));
	$array = (array) $result;
	$array = get_object_vars($result);
	if(is_XML($array["WSGetInvoicesResult"])){
 	 	$xml= str_replace('">','" />',$array["WSGetInvoicesResult"]);
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



