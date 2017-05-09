<?php  
require_once 'DAL/cls.conexion.php';
 




class Receipts{
public $receipt;
public $date;
public $shipperid;
public $shipper;
public $consigneeid;
public $consignee;
public $agentid;
public $agent;
public $pieces;
public $weight;
public $volume;
public $weightvol;
public $itemdescription;
public $notes;
public $countryid;
public $instrucciones;
public $entregado;
public $embarcado;
public $servicio;
public $documento;
public $reempacado;

	public function getReceipt($consignee){
		$conn = dbConnect();
		// Create the query
		$sql = 'SELECT * FROM receipts where consigneeid = '.$consignee;
		// Create the query and asign the result to a variable call $result
		$result = $conn->query($sql);
		// Extract the values from $result
		$rows = $result->fetchAll();
		foreach ($rows as $row) {
		$receiptss[]= $row['receipt'];
		}
		return $receiptss;
	}

	public function setReceipt($receipt){
        $this->receipt = $receipt;
    }
}