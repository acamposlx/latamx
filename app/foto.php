<?php
include_once('admin/conexion.php');


$sqlDoc = "select * from documentosreceipt where receipt =".$_GET['receipt'];
$resultadoDoc = $conn->query($sqlDoc);
      while($rowF = $resultadoDoc->fetch_assoc()) {
 ?>
 <iframe src="http://s6.stephytrackingonline.com/latamcargousa/utils/getinlinepdf.asp?f6r2uBVQ=LE&PDFFile=<?php echo $rowF["documento"]; ?>" width="100%" height="100%"></iframe>

<?php


      }
 ?>
