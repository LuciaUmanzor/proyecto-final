<?php session_start();

    if (isset($_SESSION['Usuario'])) {
?>

<?php
include '../coneccion/coneccion.php';

$sql="DELETE FROM banderacoalision where 	idCoalision=".$_REQUEST['Id'].";";
var_dump($sql);
print consultaA($con, $sql);
header("Location: consultarcoalicion.php");
?>

<?php }else{
    header("Location: InicioSesion.php");
 } ?>