<?php
//call library
require_once('lib/nusoap.php');
$URL       = "www.latamxpress.com/app/servicios.php";
$namespace = $URL . '?wsdl';
//using soap_server to create server object
$server    = new soap_server;
$server->configureWSDL('Servicios Stephy', $namespace);

//register a function that works on server
$server->register('WSGetConsignees', array('Username' => 'xsd:string', 'Password' => 'xsd:string', 'Serial'=> 'xsd:string', 'CustomerType'=> 'xsd:string', 'FromDate'=> 'xsd:string', 'ToDate'	=> 'xsd:string', 'AgentID'=> 'xsd:string', 'ConsigneeID'=> 'xsd:string'), array('return'=>'xsd:string'), 'urn:WSGetConsigneeswsdl', 'urn:WSGetConsigneeswsdl#WSGetConsignees', 'rpc', 'encoded', 'Obtiene Consignatarios'
	);

function WSGetConsignees($Username, $Password, $Serial, $CustomerType, $FromDate, $ToDate, $AgentID, $ConsigneeID){
	echo "hola";
}

// create HTTP listener

$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);
exit();
?>