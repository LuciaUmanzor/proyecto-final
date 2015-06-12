<?php
include '../clases/Candidato.php';
include '../controladores/CandidatoControlador.php';
include '../coneccion/coneccion.php';

 
$candidato= new CandidatoControlador();
@$accion=$_REQUEST['accion'];
switch ($accion) {
    case 'save':

     @$dui=$_POST['DUICandidato'];

    $conexion=mysql_connect("127.0.0.1","root","")or die ('Ha fallado la conexión con el servidor: '.mysql_error());
    mysql_select_db("tribunal",$conexion)or die ('Error al seleccionar la Base de Datos: '.mysql_error());
//para un dui repetido
    $nuevo_dui=mysql_query("SELECT * from inscripcioncandidato where DUICandidato='$dui'");
    $dui_exist = mysql_num_rows($nuevo_dui);


    if ($dui_exist>0) {
        echo "<script type=\"text/javascript\">alert('El Numero de Dui $dui ya existe!!');window.location.assign('../formularios/Candidatos.php');</script>";
    }else{
        if (isset($_REQUEST['btnGuardarCandidato'])) {
            $candidato->setidCandidato('null');
            $candidato->setNombres($_REQUEST['NombresCandidato']);
            $candidato->setApellidos($_REQUEST['ApellidosCandidato']);
            $candidato->setDUICandidato($_REQUEST['DUICandidato']);
            $candidato->setCodTipoCandidatura($_REQUEST['TipoCandidato']);
            $candidato->setCodParticipacion($_REQUEST['Participacion']);
            $candidato->setCodCoalision($_REQUEST['coalision']);
            $candidato->setCodDepartamento($_REQUEST['depto']);
            $candidato->setCodMunicipio($_REQUEST['municipio']);
           

            $objetoC=array($candidato->getidCandidato(),
                            $candidato->getNombres(),
                            $candidato->getApellidos(),
                            $candidato->getDUICandidato(),
                            $candidato->getCodTipoCandidatura(),
                            $candidato->getCodParticipacion(),
                            $candidato->getCodCoalision(),
                            $candidato->getCodDepartamento(),
                            $candidato->getCodMunicipio());
                          



            print $candidato->guardarDatos($con,$objetoC);
            header("Location:../formularios/Candidatos.php?g=1");

        }else{
            header("Location:../formularios/Candidatos.php?e=1");

        }
    }
        break;
    case 'ac':

        if (isset($_REQUEST['btnGuardarCandidato'])) {
            $candidato->setidCandidato($_REQUEST['idCandidato']);
            $candidato->setNombres($_REQUEST['NombresCandidato']);
            $candidato->setApellidos($_REQUEST['ApellidosCandidato']);
            $candidato->setDUICandidato($_REQUEST['DUICandidato']);
            $candidato->setCodTipoCandidatura($_REQUEST['TipoCandidato']);
            $candidato->setCodParticipacion($_REQUEST['Participacion']);
            $candidato->setCodCoalision($_REQUEST['coalision']);
            $candidato->setCodDepartamento($_REQUEST['depto']);
            $candidato->setCodMunicipio($_REQUEST['municipio']);
          

            $objetoC=array($candidato->getidCandidato(),
            	$candidato->getNombres(),
                $candidato->getApellidos(),
                $candidato->getDUICandidato(),
                $candidato->getCodTipoCandidatura(),
                $candidato->getCodParticipacion(),
                $candidato->getCodCoalision(),
                $candidato->getCodDepartamento(),
                $candidato->getCodMunicipio());
                


            print $candidato->modificarDatos($con,$objetoC);
            header("Location:../consultas/consultarcandidato.php?g=1");

        }else{
            header("Location:../consultas/consultarcandidato.php?e=1");

        }

        break;

        default:
        print 'No hay Accion que realizar';
        break;
}

?>