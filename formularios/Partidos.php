<?php session_start();

    if (isset($_SESSION['Usuario'])) {
?>

<?php include '../coneccion/coneccion.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Formulario de Inscripción de Partidos</title>
	<link rel="stylesheet" type="text/css" href="../mycss/estilo.css">
	<link rel="stylesheet" type="text/css" href="../mycss/estiloInscripcionPar.css">
	<link rel="shortcut icon" type="image/x-icon" href="../image/ic.ico">

	<link type="text/css" rel="stylesheet" href="estilo6.css">
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
		       <P><div id="menu">
<ul class="nav">

			 <li><a href="Iniciotribunal.php">Inicio</a>
				<ul>
                              <ul>
                           </ul>
                        </li>
                        <ul>
                     </ul>
                   </li>
                    </ul> 
                   </li> 
                   <li><a href="../consultas/consultarpartido.php">Registros</a>
				<ul>
                              <ul>
                           </ul>
                        </li>
                        <ul>
                     </ul>
                   </li>
                    </ul> 
                   </li> 	
                    <li><a href="#">menu</a> 		
                      
          	<ul>          
                  <li><a href="elecciones.php">Elecciones</a>
                        <ul>
                       </ul>      
                 </li>

		
                   <li><a href="Coalicion.php"> Coalicion</a></li>
                        <ul>	
               </ul>

                 </li>

                   <li><a href="Votantes.php">Votantes</a></li>
                        <ul>
                       </ul>      
                 </li>

                 <li><a href="Candidatos.php"> Candidatos</a></li>
                        <ul>

                       </ul>      
                 </li>

                	<li><a href="../reporte/menurepor.php"> Resutados</a></li>
                        <ul>
                       </ul>
                    
                     <li><a href="../sesion/cerrar.php">Cerrar Sesión</a></li>
                        <ul>
                         </ul>      
                 </li>      
                 </li>     
           <ul>
             </ul>
             </li>
            	</ul>	
              </li>
                       
                  </div>     
                  </p>       
		        </nav>
			</div>
	    </header>
	</div>

	
	<br>
		<p>Incripción de Partidos Políticos</p>

	<table border="0px">
		<form method="post" action="../manejadores/manejadorPartidos.php?accion=save" name="forPartidos">
			<tr>
				<td>
					<label1>Nombre:</label1><br>
				</td>
				<td>
					<input name="NombrePartido" type="text" class="" placeholder="Nombre del Partido" required="required" maxlength="35"><br>
				</td>
			</tr>
			
			<tr>
				<td>
					<label2>Representante:</label2><br>
				</td>
				<td>
					<input name="ResponsablePartido" type="text" class="" placeholder="Representante Legal" required="required" maxlength="35"><br>
				</td>
			</tr>
			<tr>
				<td>
					<label1>Dui:</label1><br>
				</td>
				<td>
					<input name="DUIRepresentante" type="text" maxlength="`10" id="input" pattern="[0-9]{8}[-][0-9]{1}" title="debe conter 9 digitos seguidos de '-'antes del ultimo digito" class="" placeholder="00000000-0" required="required" ><br>
				</td>
			</tr>
			<tr>
				<tr>
				<td>
					<label> Bandera </label>
				</td>
			</tr>
			<tr>
				<td>
					<input type="file" name="Bandera" class="file" required="required">
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<input name="btnGuardarPartido" type="submit" class="btnEnviar" value="Guardar">
				</td>
			</tr>
		</form>
	</table>

	
</body>

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
         window.location='Partidos.php';   
      
    }
    alert("Datos Almacenados Correctamente!!");
    setTimeout("redir3()",200);
}

if($_GET("e")!=null){
    
    function redir3(){
         window.location='Partidos.php';   
      
    }
    alert("Error al Guardar los Datos!!");
    setTimeout("redir3()",200);
}

</script>

<?php }else{
    header("Location:../formularios/InicioSesion.php");
 } ?>