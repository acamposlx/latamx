<?php 
session_start();
$pagina = "Facturas";
include('head.php'); 
$dsn = 'mysql:host=localhost;dbname=latamxpr_latam';
$user = 'latamxpr_latam';
$password = 'Alex162310';
$pdo = new PDO($dsn, $user, $password);
$sql= "SELECT * FROM invoices where ConsigneeID=".$_SESSION['ConsigneeCode'];
$stmt = $pdo->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();
$cantidad = count($result);
?>
<br>
<?php
if ($cantidad==0){
?>	
	<div align="center">Si usted desea información sobre su estado de cuenta, por favor comuniquese con nuestro departamento de servicio al cliente o escribanos a info@lataxpress.com<br><img src="img/enconstruccion.png" /></div>
<?php	
} else {
?>
	<div class="table-responsive">
	<table class="table table-striped">
	<tr style="background-color:#f15a24; color:#FFF;">
		<td>Invoice</td>
    	<td>Date</td>
    	<td>File</td>
    	<td>Shipper</td>
    	<td>Balance</td>
	</tr>
<?php
	foreach($result as $row){
		$time = strtotime($row['InvoiceDate']);
		$newformat = date('Y-m-d',$time);
?>
  		<tr class="d<?php echo $i; ?>">
    		<td><?php echo $row['Invoice']; ?></td>
    		<td><?php echo $newformat; ?></td>
    		<td><?php echo $row['FileNumber']; ?></td>
    		<td><?php echo $row['Shipper']; ?> [<?php echo $row['ShipperID']; ?>]</td>
    		<td><?php echo $row['Balance']; ?> $</td>
  		</tr>

<?php 
	}
}
?>		</table></div>
<br>
<br>
<br>
<br>
<br>
<?php include('pie.php'); ?>