<?php session_start();

    if (isset($_SESSION['Usuario'])) {
?>

<?php include '../coneccion/coneccion.php'; ?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<title>Registros de partidos</title>
	<link rel="stylesheet" type="text/css" href="../mycss/estilo.css">
	<link rel="stylesheet" type="text/css" href="../mycss/estiloInscripcionPar.css">
	<link rel="shortcut icon" type="image/x-icon" href="../image/ic.ico">
</head>

<body body style="background:#9999ff">

  	<div class="contenedor">
		<header>
			<div class="centra">
			<figure>
 
            
              <center><p> <img src="imagen/333.gif">  </p></center>

               </figure>
             
     
		        </div>
		        <nav>
		        	<a href="../formularios/Partidos.php">Inicio</a>
		        </nav>
			</div>
	    </header>
	</div>

	<section>
		<p>Registro de los partidos guardados</p>
		<br>

		<?php

		$sql = 'SELECT idPartidos, NombrePartido as Nombre, Responsable as Representante, DUIRepresentante as DUI, Bandera FROM inscripcionpartido';
		$datoss =  consultaD($con, $sql);
		print imprimetabla($datoss,"Partidos","table table-bordered table-striped","table",1);
		?>
		<br>
		<p>Votos Registrados</p>
		<?php
		?>
	</section>
	


</html>

<script>
function $_GET(param){

/* Obtener la url completa */
url = document.URL;
/* Buscar a partir del signo de interrogación ? */
url = String(url.match(/\?+.+/));
/* limpiar la cadena quitándole el signo ? */
url = url.replace("?", "");
/* Crear un array con parametro=valor */
url = url.split("&");
x = 0;
while (x < url.length)
{
p = url[x].split("=");
if (p[0] == param)
{
return decodeURIComponent(p[1]);
}
x++;
}
}

if($_GET("g")!=null){
    
    function redir3(){
         window.location='consultarpartido.php';   
      
    }
    alert("Datos Actualizados Correctamente");
    setTimeout("redir3()",200);
}

if($_GET("e")!=null){
    
    function redir3(){
         window.location='consultarpartido.php';   
      
    }
    alert("Error al Actualizar los Datos");
    setTimeout("redir3()",200);
}


</script>

<?php }else{
    header("Location: ../formularios/InicioSesion.php");
 } ?>