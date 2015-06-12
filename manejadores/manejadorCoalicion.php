<?php
include '../clases/Coalicion.php';
include '../controladores/CoalicionControlador.php';
include '../coneccion/coneccion.php';

$coalision = new CoalicionControlador();
@$accion=$_REQUEST['accion'];
switch ($accion) {
    case 'save':
        if (isset($_REQUEST['btnCoalicion'])) {
            $coalision->setidCoalision('null');
            $coalision->setPartidouno($_REQUEST['txtpartidouno']);
            $coalision->setPartidodos($_REQUEST['txtpartidodos']);
            $coalision->setPartidotres($_REQUEST['txtpartidotres']);
            $coalision->setPartidocuatro($_REQUEST['txtpartidocuatro']);
            $coalision->setNombre($_REQUEST['txtCoalicion']);
            $coalision->setTipo($_REQUEST['Tipo']);
            $coalision->setBandera($_REQUEST['Bandera']);

            $objetoP=array($coalision->getidCoalision(),
                            $coalision->getPartidouno(),
                            $coalision->getPartidodos(),
                            $coalision->getPartidotres(),
                            $coalision->getPartidocuatro(),
                            $coalision->getNombre(),
                            $coalision->getTipo(),
                            $coalision->getBandera());

            print $coalision->guardarDatos($con,$objetoP);
            header("Location:../formularios/Coalicion.php?g=1");

        }else{
            header("Location:../formularios/Coalicion.php?e=1");

        }
        break;
    case 'ac':

        if (isset($_REQUEST['btnCoalision'])) {
            $coalicion->setidCoalision($_REQUEST['idCoalision']);
            $coalicion->setPartidouno($_REQUEST['txtpartidouno']);
            $coalicion->setPartidodos($_REQUEST['txtpartidodos']);
            $coalicion->setPartidotres($_REQUEST['txtpartidotres']);
            $coalicion->setPartidocuatro($_REQUEST['txtpartidocuatro']);
            $coalicion->setNombre($_REQUEST['txtCoalision']);
            $coalicion->setTipo($_REQUEST['Tipo']);
            $coalicion->setBandera($_REQUEST['Bandera']);

            

            $objetoP=array($coalicion->getidCoalicion(),
                            $coalicion->getPartidouno(),
                            $coalicion->getPartidodos(),
                            $coalicion->getPartidotres(),
                            $coalicion->getPartidocuatro(),
                            $coalicion->getNombre(),
                            $coalicion->getTipo(),
                            $coalicion->getBandera());

            print $coalision->modificarDatos($con,$objetoP);
            header("Location:../consultas/consultarcoalicion.php?g=1");

        }else{
            header("Location:../consultas/consultarcoalicion.php?e=1");

        }

        break;

        default:
        print 'No hay Accion que realizar';
        break;
}

?>
