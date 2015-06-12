<?php session_start();

    if (isset($_SESSION['Usuario'])) {
?>

<?php
include '../coneccion/coneccion.php';
$sql ="SELECT * FROM inscripcionpartido WHERE idPartidos ='".$_REQUEST['idPartidos']."';";
$datos= consultaD($con, $sql,3);
//var_dump($datos);
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<title>Modificar Registros</title>
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

	<p>Modificar Registros</p>

	<table border="0px">
		<form method="post" action="../manejadores/manejadorPartidos.php?accion=ac" name="forPartidos">
			<input type="hidden" name="idPartidos" value="<?php print $datos[0][0];?>">
			<tr>
				<td>
					<label1>Nombre:</label1><br>
				</td>
				<td>
					<input name="NombrePartido" value="<?php print $datos[0][1]; ?>" type="text" class="" placeholder="Nombre del Partido" required="required" maxlength="35"><br>
				</td>
			</tr>
			
			<tr>
				<td>
					<label2>Representante:</label2><br>
				</td>
				<td>
					<input name="ResponsablePartido" value="<?php print $datos[0][2]; ?>" type="text" class="" placeholder="Representante Legal" required="required" maxlength="35"><br>
				</td>
			</tr>
			<tr>
				<td>
					<label1>Dui:</label1><br>
				</td>
				<td>
					<input name="DUIRepresentante" value="<?php print $datos[0][3]; ?>" type="text" class="" placeholder="00000000-0" required="required" maxlength="10"><br>
				</td>
			</tr>
			<tr>

			<td>
					<label> Bandera </label>
				</td>
			</tr>
			<tr>
				<td>
					<input type="file" name="Bandera" class="file" required="required">
				</td
				
			</tr>
			<tr>
				<td colspan="2">
					<input name="btnGuardarPartido" type="submit" class="btnEnviar" value="Actualizar">
				</td>
			</tr>
		</form>
	</table>
	

	>
</body>

</html>



<?php }else{
    header("Location: ../formularios/InicioSesion.php");
 } ?>