<?php 
session_start();
include('headInterna.php'); 
include('httpful.phar');
$receipt = $_GET['receipt'];
$uri2 = "http://latam-cargo.com.ve/api/Documentos?receipt=" .$receipt;
$response2 = \Httpful\Request::get($uri2)->send();
$array2 = json_decode($response2);
$cantidad = count($array2);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>


<br><br>
<?php 
foreach($array2 as $obj)
	{
?>
		<iframe frameborder="0" allowtransparency="true"  width="800" height="600" src="http://s6.stephytrackingonline.com/latamcargousa/Documents/InSeeDocument.asp?FileName=<?php echo $obj->documento; ?>&Code=12323&Type=Receipt&Stamp=true"></iframe>
<?php 
	}
include('pie.php'); ?>


