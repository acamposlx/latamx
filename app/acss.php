<?php
include_once('admin/conexion.php');
include('httpful.phar');
require_once('lib/nusoap.php');
$sqlDatos = "select * from consignatario where ConsigneeCode = 0";
$resultDatos = $conn->query($sqlDatos);
if ($resultDatos->num_rows > 0) {
	while($row = $resultDatos->fetch_assoc()) {
  	$nombre = $row["Name"] ." ". $row["apellido"] ;
    $password = generaPass();
		$direccion = $row["Add1"];
		$ciudad = $row["City"];
		$estado = $row["State"];
		$email = $row["Email"];
		$telefono = $row["Phone1"];
		$servicio="http://latam-cargo.com.ve/ServicioConsignatarios.svc?wsdl"; //url del servicio
		$parametros=array(); //parametros de la llamada

		$parametros['nombre']=$nombre;
		$parametros['direccion']=$direccion;
		$parametros['ciudad']=$ciudad;
		$parametros['estado']=$estado;
		$parametros['email']=$email;
		$parametros['telefono']=$telefono;
		$parametros['clave']=$password;

		$client = new SoapClient($servicio, $parametros);
		$result = $client->RegistrarStephy($parametros);//llamamos al métdo que nos interesa con los parámetros
		$result = obj2array($result);
		$Consigna=$result['RegistrarStephyResult'];

print_r($Consigna);


		$n=count($Consigna);

	/*	$sql = "UPDATE consignatario SET ConsigneeCode=$Consigna, AccessPassword='".$password."' WHERE Email='".$email."'";
		if ($conn->query($sql) === TRUE) {
			echo "Record updated successfully";
		} else {
			echo "Error updating record: " . $conn->error;
		}*/
		print_r($parametros);
		echo "<br>";		echo "<br>";		echo "<br>";		echo "<br>";
	}
}





function generaPass(){
    //Se define una cadena de caractares. Te recomiendo que uses esta.
    $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
    //Obtenemos la longitud de la cadena de caracteres
    $longitudCadena=strlen($cadena);

    //Se define la variable que va a contener la contraseña
    $pass = "";
    //Se define la longitud de la contraseña, en mi caso 10, pero puedes poner la longitud que quieras
    $longitudPass=10;

    //Creamos la contraseña
    for($i=1 ; $i<=$longitudPass ; $i++){
        //Definimos numero aleatorio entre 0 y la longitud de la cadena de caracteres-1
        $pos=rand(0,$longitudCadena-1);

        //Vamos formando la contraseña en cada iteraccion del bucle, añadiendo a la cadena $pass la letra correspondiente a la posicion $pos en la cadena de caracteres definida.
        $pass .= substr($cadena,$pos,1);
    }
    return $pass;
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
