<?php session_start();

    if (isset($_SESSION['Usuario'])) {
?>
<!DOCTYPE html>

<html lang="es">

<head>
	<meta charset="utf-8">
	<title>Elecciones</title>
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
                   <li><a href="../consultas/consultarperiodo.php">Registros</a>
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
                  <li><a href="Candidatos.php">Candidatos</a>
                        <ul>
                       </ul>      
                 </li>

		
                   <li><a href="Partidos.php"> Partidos</a></li>
                        <ul>	
               </ul>

                 </li>

                   <li><a href="Votantes.php">Votantes</a></li>
                        <ul>
                       </ul>      
                 </li>

                 <li><a href="Coalicion.php"> Coalición</a></li>
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

	<p>Periodo de Elección</p>
	<table border="0px">
		<form method="post" action="../manejadores/manejadorPeriodo.php?accion=save" name="Eleccion">
			<tr>
				<td>
					<label>Tipo:</label>
				</td>
				<td>
					<select name="Eleccion" required="required">
						<option value="">Seleccionar</option>
						<option value="Alcaldes y Diputados">Alcaldes y Diputados</option>
						<option value="Presidenciales">Presidenciales</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<label>Año:</label>
				</td>
				<td>
					<input type="text" name="PeriodoE" required="required" placeholder="0000" maxlength="4">
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<input name="btnEleccion" type="submit" class="btnEnviar" value="Guardar">
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
         window.location='Elecciones.php';   
      
    }
    alert("Datos Almacenados Correctamente!!");
    setTimeout("redir3()",200);
}

if($_GET("e")!=null){
    
    function redir3(){
         window.location='Elecciones.php';   
      
    }
    alert("Error al Guardar los Datos!!");
    setTimeout("redir3()",200);
}
<?php }else{
    header("Location:../formularios/InicioSesion.php");
 } ?>