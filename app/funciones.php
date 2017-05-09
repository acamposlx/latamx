<?php
//require_once('admin/conexion.php');
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

function generaUsuarioStephy($Name, $Add1, $City, $State, $Email, $Phone1, $AccessPassword, $destination){
	$client = new SoapClient("http://s6.stephytrackingonline.com/stows/stows.asmx?wsdl");
	$params = array(
  		"Username" => 'LatamCargoUSAWS',
  		"Password" => 'L@c678dRttR#8rt78fhjruw@y328@#178$',
  		"Serial" => 'LatamCargoUSA',
		"CustomerType"	=> '0',
		"Name"	=> $Name,
		"Contact"	=> $Name,
		"Add1"	=> $Add1,
		"City"	=> $City,
		"State"	=> $State,
		"Country"	=> 'Venezuela',
		"Email"	=> $Email,
		"Phone1"	=> $Phone1,
		"Destination"	=> $destination,
		"AccessPassword"	=> $AccessPassword,
		"CountryID"	=> '0',
		"OperationType"	=> 1,
		"StatusID"	=> 2,
	);
	$result = $client->__soapCall("WSSetConsignees", array($params));
	$array = (array) $result;
	$array = get_object_vars($result);
	if(is_XML($array["WSSetConsigneesResult"])){
		$xml= str_replace('">','" />',$array["WSSetConsigneesResult"]);
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
			$resultado = $obj;
		}
	} else {
		return $result;
	}
}



function insertaDireccion($direccion, $ciudad, $cedula, $nombre, $email){
	include('admin/conexion.php');
	$sql= "INSERT INTO direcciones (direccion, idCiudad, cedula, nombreDireccion) VALUES ('".$direccion."', '".$ciudad."', '".$cedula."', '".$nombre."')";

	
	if ($conn->query($sql) === TRUE) {
    $resultado = "New record created successfully";
	} else {
    	$resultado =  "Error: " . $sql . "<br>" . $conn->error;
	}


	return $conn->query($sql);
	$conn->close();
}

function enviarEmailBienvenida($email, $sexo){
	$handler = curl_init("http://www.latamxpress.com.ve/bienvenida.php?email=".$email."&sexo=".$sexo);  
	$response = curl_exec ($handler);  
	curl_close($handler);  
	return $response;
}

function recuperaDatos($email, $pass){

$handler = curl_init("http://www.latamxpress.com.ve/datos.php?email=".$email."&pass=".$pass);  
	$response = curl_exec ($handler);  
	curl_close($handler);  
	return $response;


}

function confirmaRegistro($email, $pass, $id){
	$handler = curl_init("http://www.latamxpress.com.ve/confirmacionRegistro.php?email=".$email."&pass=".$pass."&id=".$id);  
	$response = curl_exec ($handler);  
	curl_close($handler);  
	return $response;
}





function insertaConsignatario($Consigna, $Nombre, $Direccion, $Ciudad, $Estado, $Email, $Telefono, $Destino, $Password, $Apellido, $Sexo, $FechaNac, $Cedula){
	include('admin/conexion.php');

	$sql = "INSERT INTO consignatario (ConsigneeCode, Name, Contact, Add1, City, State, Country, Email, Phone1, Destination, AccessPassword, statusID, apellido, telefono, sexo, fechaNac, cedula)
	VALUES ($Consigna, '".$Nombre."', '".$Nombre."', '".$Direccion."', '".$Ciudad."', '".$Estado."', '0', '".$Email."', '".$Telefono."', '".$Destino."', '".$Password."', 1, '".$Apellido."', '".$Telefono."', '".$Sexo."', '".$FechaNac."', '".$Cedula."')";

		if ($conn->query($sql) === TRUE) {
			return 1;
		} else {
			return $conn->error;
		}
	$conn->close();

}

function is_XML($xml) {
    $doc = @simplexml_load_string($xml);
    if ($doc) {
        return true; //this is valid
    } else {
        return false; //this is not valid
    }
}





function guardarTracking($consigna, $box, $date, $time, $note, $status, $operator, $tracking, $receipt){
	include('admin/conexion.php');
	$sqlTrack = "select * from tracking where ID = ".$consigna;
	$resultTrack = $conn->query($sqlTrack);
	if ($resultTrack->num_rows == 0) {
		$sqlIn = "INSERT INTO tracking (ID, Box, Date, Time, Note, Status, Operator, Tracking, receipt) VALUES ('".$consigna."', '".$box."', '".$date."', '".$time."', '".$note."', '".$status."', '".$operator."', '".$tracking."', ".$receipt.")";
		if ($conn->query($sqlIn) === TRUE) {
		}
	}
	$conn->close();
}







function servicioTracking($receipt){
	require_once('lib/nusoap.php');

	$servicio="http://latam-cargo.com.ve/WSGetReceiptTracking.svc?wsdl"; //url del servicio
	$parametros=array(); //parametros de la llamada
	$parametros['receiptb']=$receipt;
	$client = new SoapClient($servicio, $parametros);
	$resultado = $client->listaTracking($parametros);//llamamos al métdo que nos interesa con los parámetros
	$resultado = obj2array($resultado);
	if (isset($resultado['listaTrackingResult']['Entidades.ClsTracking'])){
		$Consigna=$resultado['listaTrackingResult']['Entidades.ClsTracking'];
    	$n=count($Consigna);
    	for($i=0; $i<$n; $i++){
			if (isset($Consigna['ID'])){

				$newstring = substr($Consigna['Box'], -3);
				guardarTracking($Consigna['ID'], $Consigna['Box'], $Consigna['Date'], $Consigna['Time'], $Consigna['Note'], $Consigna['Status'], $Consigna['Operator'], $Consigna['Tracking'], $receipt);
			} else {
				$consigna=$Consigna[$i];
				$newstring = substr($Consigna[0]['Box'], -3);
				guardarTracking($Consigna[$i]['ID'], $Consigna[$i]['Box'], $Consigna[$i]['Date'], $Consigna[$i]['Time'], $Consigna[$i]['Note'], $Consigna[$i]['Status'], $Consigna[$i]['Operator'], $Consigna[$i]['Tracking'], $receipt);
			}
		}
	}






return $newstring;
}

function cantidadPendientes($consignatario){
	include('admin/conexion.php');
	$sqlPendientes = "SELECT * FROM receipts where instrucciones = 0 and reempacado = 0 and consigneeid=".$consignatario;
	$resultPendientes = mysqli_query($conn, $sqlPendientes);


	$cantidad = mysqli_num_rows($resultPendientes);
	if (mysqli_num_rows($resultPendientes) > 0) {
    // output data of each row
    	while($row = mysqli_fetch_assoc($resultPendientes)) {
 			if (strpos($row["notes"], 'From') !== false) {
      		$cantidad = $cantidad - 1;
      		}  
        	//$pendientes= $row["cantidadPendientes"];
    	}
	}
	return $cantidad;
	$conn->close();
}


function cantidadHold($consignatario){
	include('admin/conexion.php');
	$sql = "SELECT * FROM receipts INNER JOIN instructions ON receipts.receipt = instructions.receipt WHERE instructions.type = 'Hold' AND entregado = 0 AND receipts.consigneeid = ".$consignatario." ORDER BY receipts.receipt DESC";
	$result = mysqli_query($conn, $sql);
	$cantidad = mysqli_num_rows($result);
	if (mysqli_num_rows($result) > 0) {
    	while($row = mysqli_fetch_assoc($result)) {
 			if (strpos($row["notes"], 'From') !== false) {
      		$cantidad = $cantidad - 1;
      		}     		
			//$pendienteshold= $row["cantidadPendientes"];
    	}
	}
	return $cantidad;
	$conn->close();
}



function cantidadTransito($consignatario){
	include('admin/conexion.php');
	$sqlTransito = "SELECT count(*) as cantidadTransito FROM receipts INNER JOIN instructions ON receipts.receipt = instructions.`code` WHERE receipts.instrucciones = '1' AND receipts.entregado = '0' AND receipts.reempacado = '0' AND receipts.countryid = '0' AND receipts.consigneeid = '".$consignatario."' AND instructions.type <> 'Hold'";
	$resultTransito = mysqli_query($conn, $sqlTransito);
	if (mysqli_num_rows($resultTransito) > 0) {
	    while($rowT = mysqli_fetch_assoc($resultTransito)) {
    	    $transito= $rowT["cantidadTransito"];
    	}
	}
	return $transito;
	$conn->close();
}



function cantidadHistorial($consignatario){
include('admin/conexion.php');

$sqlHistorial = "SELECT count(*) as cantidadHistorial FROM receipts where entregado = 1 and consigneeid=".$consignatario;
$resultHistorial = mysqli_query($conn, $sqlHistorial);
if (mysqli_num_rows($resultHistorial) > 0) {
    // output data of each row
    while($rowH = mysqli_fetch_assoc($resultHistorial)) {
        $historial= $rowH["cantidadHistorial"];
    }
}

return $historial;
$conn->close();

}







function cantidadFacturas($consignatario){
include('admin/conexion.php');

$sql = "SELECT count(*) as cantidadFacturas FROM invoices where consigneeid=".$consignatario;
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $facturas= $row["cantidadFacturas"];
    }
}

return $facturas;
$conn->close();

}




function generaEstados()
{
  include('admin/conexion.php');

	$sqlEstados = "SELECT * FROM estados";
	$resultEstados = $conn->query($sqlEstados);

	if ($resultEstados->num_rows > 0) {
	    // output data of each row
			echo "<select name='estados' id='estados' class='form-control' style='width:100%;' onChange='cargaContenido(this.id)' required>";
			echo "<option value='0'>Elige</option>";
	    while($rowEstados = $resultEstados->fetch_assoc()) {
				echo "<option value='".$rowEstados["id_estado"]."'>".utf8_encode($rowEstados["estado"])."</option>";
	    }
			echo "</select>";
	} else {
	    echo "0 results";
	}
}




function estado_por_id($estado){
	include('admin/conexion.php');
	$sql = "select * from estados where id_estado = ".$estado;
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
				$nombre = $row["estado"];
	    }
	} else {
	    echo "0 results";
	}
return $nombre;
}



function ciudad_por_id($ciudad){
	include('admin/conexion.php');
	$sql = "select * from ciudades where id_ciudad = ".$ciudad;
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
				$nombre = $row["ciudad"];
	    }
	} else {
	    echo "0 results";
	}
return $nombre;
}



function destino_por_id($ciudad){
	include('admin/conexion.php');
	$sql = "select * from ciudades where id_ciudad = ".$ciudad;
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
				$nombre = $row["Code"];
	    }
	} else {
	    echo "0 results";
	}
return $nombre;
}





function buscarEmbarque($receipt){
include('admin/conexion.php');
$sql = "SELECT * FROM receipts where receipt=".(int)$receipt;
$result = mysqli_query($conn, $sql);

return $result;

}
?>
