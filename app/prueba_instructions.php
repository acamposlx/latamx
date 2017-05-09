<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
date_default_timezone_set('Europe/Bucharest');
require_once('admin/conexion.php');
include('admin/funciones/funciones_servicios.php');
include('admin/funciones/funciones.php');
include('admin/funciones/funciones_comunes.php');


$sqlP = "select * from receipts where instrucciones = 0 and receipt >17500";
$resultados = $conn->query($sqlP);


if ($resultados->num_rows > 0) {
 
    // output data of each row
    while($row = $resultados->fetch_assoc()) { 
      $ri = instrucciones($row["receipt"]);

      
      foreach($ri as $r){
        if (isset($r['Code'])){
          echo $r['Code'];
          /*$bi = buscaInstrucciones($r['Code']);
           if ($bi->num_rows == 0){
            echo "bien";
           
            insertaInstrucciones($r['Code'], $r['Author'], $r['Type'], $r['Insurance'], $r['InsuranceAmount'], $r['Payment'], $r['Code']);          
          }*/
        }
      }
    }

    
} else {
    echo "0 results";
}
$conn->close();
?>
