<?php

include_once('conexion.php');
/* Create a class for your webservice structure, in this case: Contact */
class GetConsignees {
    function GetConsignees($Username, $Password, $Serial, $CustomerType, $FromDate, $ToDate, $AgentID, $ConsigneeID)
    {
        $this->Username = $Username;
				$this->Password = $Password;
				$this->Serial = $Serial;
				$this->CustomerType = $CustomerType;
				$this->FromDate = $FromDate;
				$this->ToDate = $ToDate;
				$this->AgentID = $AgentID;
				$this->ConsigneeID = $ConsigneeID;
    }
}

/* Initialize webservice with your WSDL */
$client = new SoapClient("http://s6.stephytrackingonline.com/stows/stows.asmx?wsdl");

/* Fill your Contact Object */

//codigo para commit

/* Set your parameters for the request */
$params = array(
  	"Username" => 'LatamCargoUSAWS',
  	"Password" => 'L@c678dRttR#8rt78fhjruw@y328@#178$',
  	"Serial" => 'LatamCargoUSA',
	"CustomerType"	=> '0',
	"FromDate" => '01/01/2000',
	"ToDate" => '03/30/2017',
);

/* Invoke webservice method with your parameters, in this case: Function1 */
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
	
	foreach($datos as $obj){
	ini_set('max_execution_time', 300);
		$sql = "select * from consignatario where ConsigneeCode = ".$obj['ConsigneeCode'];
		$result = $conn->query($sql);
		if ($result->num_rows == 0) {
			$i++;
			$sqlI = "insert into consignatario (ConsigneeCode, Name, Contact, Add1, Add2, City, State, ZipCode, Country, Email, Phone1, Phone2, Destination, AccessPassword, Notes, ID1, ID2, statusID, Date) VALUES ('".$obj['ConsigneeCode']."', '".$obj['Name']."', '".$obj['Contact']."', '".$obj['Add1']."', '".$obj['Add2']."', '".$obj['City']."', '".$obj['State']."', '".$obj['ZipCode']."', '".$obj['Country']."', '".$obj['Email']."', '".$obj['Phone1']."', '".$obj['Phone2']."', '".$obj['Destination']."', '".$password."', '".$obj['Notas']."', '".$obj['ID1']."', '".$obj['ID2']."', '".$obj['StatusID']."', '".$obj['Date']."')";
			if ($conn->query($sqlI) === TRUE) {
    			echo "New record created successfully";
    			echo "<br>"; 
			} else {
    			echo "Error: " . $sql . "<br>" . $conn->error;
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
					echo $i;
					$conn->close();
?>
