<?php
session_start();
$pagina="checklogin";
include_once('admin/conexion.php');






$sql1 = "SELECT * FROM consignatario where Email='".$_POST['username']."'";
$result1 = mysqli_query($conn, $sql1); 
if (mysqli_num_rows($result1) > 0) {
    $existemail = 1;
}
else{
    $existemail = 0;
}




if ($existemail==1){
    $sql = "SELECT * FROM consignatario where Email='".$_POST['username']."' and AccessPassword='".$_POST['password']."'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $ConsigneeCode= $row["ConsigneeCode"];
            $Name= $row["Name"];
            $Cedula = $row["cedula"];
    }
    $_SESSION['Name'] = $Name;
    $_SESSION['ConsigneeCode'] = $ConsigneeCode;
    $_SESSION['cedula'] = $Cedula;
    header ("Location: dashboard.php");
    } else {
        include('head.php');
?>
        <script type="text/javascript">
        swal({
        title: "Error!",
        text: "Contraseña incorrecta.",
        type: "error",
        confirmButtonText: "Cerrar"
        });
        </script>
<?php
        header( "refresh:3;url=http://www.latamxpress.com/app" );
        include('pie.php');
        die();
    }
} else {
        include('head.php');
?>
        <script type="text/javascript">
        swal({
        title: "Error!",
        text: "comuniquese con nosotros a traves del email sistemas@latamxpress.com.",
        type: "error",
        confirmButtonText: "Cerrar"
        });
        </script>
<?php
        header( "refresh:3;url=http://www.latamxpress.com/app" );
        include('pie.php');
        die();


}
mysqli_close($conn);
?>