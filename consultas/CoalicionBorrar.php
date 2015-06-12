<?php session_start();

    if (isset($_SESSION['Usuario'])) {
?>

<?php
include '../coneccion/coneccion.php';
include  '../clases/Coalicion.php';
include '../controladores/CoalicionControlador.php';

$sql="DELETE FROM coalision where idCoalision=".$_REQUEST['idCoalision'].";";
print consultaA($con, $sql);
header("Location: consultarcoalicion.php");
?>

<?php }else{
    header("Location: InicioSesion.php");
 } ?>