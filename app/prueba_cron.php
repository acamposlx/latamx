<?php

echo getcwd() . "\n";

$url = 'http://latam-cargo.com.ve/api/SetConsignee?nombre=alex campos&direccion1=el paraiso&ciudad=caracas&estado=1&email=alexcamposve@gmail.com&telefono=5433449&cedula=16005403&fechanac=16/05/1978';

$service_url = 'http://example.com/api/conversations';
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);

$curl_response = curl_exec($curl);



echo "aqui" .$curl_response;

if ($curl_response === false) {
    $info = curl_getinfo($curl);
    curl_close($curl);
    die('error occured during curl exec. Additioanl info: ' . var_export($info));
}
curl_close($curl);
$decoded = json_decode($curl_response);

echo $decoded;
if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
    die('error occured: ' . $decoded->response->errormessage);
}
echo 'response ok!';
var_export($decoded->response);

?>