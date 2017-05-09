<?php
function receipts2($fechadesde, $fechahasta){
	$client = new SoapClient("http://s6.stephytrackingonline.com/stows/stows.asmx?wsdl");
	$params = array(
  	"Username" => 'LatamCargoUSAWS',
	"Password" => 'L@c678dRttR#8rt78fhjruw@y328@#178$',
	"Serial" => 'LatamCargoUSA',
	"CustomerType"  => '0',
	"Receipt" => '',
	"ShipperID" => '',
	"ConsigneeID" => '',
	"AgentID" => '',
	"FromDate" => $fechadesde,
	"ToDate" => $fechahasta,
	"DateType"  => '0',
	);
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
		foreach($datos as $obj){
			$resultado[]= $obj;
  	}
	} else {
  	$resultado[]= "";
	}
	return $resultado;
}

function receipts($consignatario, $fechadesde, $fechahasta){
	$client = new SoapClient("http://s6.stephytrackingonline.com/stows/stows.asmx?wsdl");
	$params = array(
  "Username" => 'LatamCargoUSAWS',
	"Password" => 'L@c678dRttR#8rt78fhjruw@y328@#178$',
	"Serial" => 'LatamCargoUSA',
	"CustomerType"  => '0',
	"Receipt" => '',
	"ShipperID" => '',
	"ConsigneeID" => $consignatario,
	"AgentID" => '',
	"FromDate" => $fechadesde,
	"ToDate" => $fechahasta,
	"DateType"  => '0',
	);
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
		foreach($datos as $obj){
			$resultado[]= $obj;
  	}
	} else {
  	$resultado[]= "";
	}
	return $resultado;
}

function tracking($receipt, $fechadesde, $fechahasta){
	$client = new SoapClient("http://s6.stephytrackingonline.com/stows/stows.asmx?wsdl");
	$params = array(
    "Username" => 'LatamCargoUSAWS',
    "Password" => 'L@c678dRttR#8rt78fhjruw@y328@#178$',
    "Serial" => 'LatamCargoUSA',
    "CustomerType"  => '0',
    "Receipt" => $receipt,
    "Tracking" => '',
    "FromDate" => $fechadesde,
    "ToDate" => $fechahasta,
	);
	$result = $client->__soapCall("WSGetReceiptTracking", array($params));
	$array = (array) $result;
	$array = get_object_vars($result);
	if(is_XML($array["WSGetReceiptTrackingResult"])){
		$xml= str_replace('">','" />',$array["WSGetReceiptTrackingResult"]);
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
  			//foreach($datos as $obj){
				$resultado[]= $datos;
  			//}
		} else {
  			$resultado[]= "";
		}
		return $resultado;
	}


function instrucciones($receipt){
		$client = new SoapClient("http://s6.stephytrackingonline.com/stows/stows.asmx?wsdl");
		$params = array(
    	"Username" => 'LatamCargoUSAWS',
    	"Password" => 'L@c678dRttR#8rt78fhjruw@y328@#178$',
    	"Serial" => 'LatamCargoUSA',
    	"CustomerType"  => '0',
    	"Receipt" => $receipt,
    	"ConsigneeID" => '',
  		);

  		$result = $client->__soapCall("WSGetShippingInstruction", array($params));
		$array = (array) $result;
		$array = get_object_vars($result);
		if(is_XML($array["WSGetShippingInstructionResult"])){
  			$xml= str_replace('">','" />',$array["WSGetShippingInstructionResult"]);
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
			$resultado[]= $datos;
		} else {
  			$resultado[]= "";
		}
		return $resultado;
	}



function consignatarios(){
		$client = new SoapClient("http://s6.stephytrackingonline.com/stows/stows.asmx?wsdl");
		$params = array(
    	"Username" => 'LatamCargoUSAWS',
    	"Password" => 'L@c678dRttR#8rt78fhjruw@y328@#178$',
    	"Serial" => 'LatamCargoUSA',
    	"CustomerType"  => '0',
    	"FromDate" => "01/01/2017",
    	"ToDate" => '12/31/2017',
 	   	"AgentID"=> '',
		"ConsigneeID"=> '',
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
  			$i = 0;
			$resultado[]= $datos;
		} else {
  			$resultado[]= "";
		}
		return $resultado;
	}


		function documentos($receipt){
			$client = new SoapClient("http://s6.stephytrackingonline.com/stows/stows.asmx?wsdl");
			$params = array(
	    	"Username" => 'LatamCargoUSAWS',
	    	"Password" => 'L@c678dRttR#8rt78fhjruw@y328@#178$',
	    	"Serial" => 'LatamCargoUSA',
	    	"CustomerType"  => '0',
	    	"Code" => $receipt,
	    	"DocType" => 'Receipt',
	  		);

	  		$result = $client->__soapCall("WSGetDocuments", array($params));
			$array = (array) $result;
			$array = get_object_vars($result);
			if(is_XML($array["WSGetDocumentsResult"])){
	  			$xml= str_replace('">','" />',$array["WSGetDocumentsResult"]);
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
				$resultado[]= $datos;
			} else {
	  			$resultado[]= "";
			}
			return $resultado;
		}
?>
