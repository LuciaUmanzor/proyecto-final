<?php session_start();

    if (isset($_SESSION['Usuario'])) {
?>

<?php include '../coneccion/coneccion.php'; ?>
<!DOCTYPE html>

<html lang="es">

<head>
	<meta charset="utf-8">
	<title>Formulario de Coalición</title>
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
                   <li><a href="../consultas/consultarcoalicion.php">Registros</a>
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

		
                   <li><a href="Partidos.php"> Partidos</a></li>
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
<p>Coaliciones de Partidos</p>


<table border="0px">
	<form method="post" action="../manejadores/manejadorCoalicion.php?accion=save" name="forCoalision" enctype="multipart/form-data">
		<tr>
			<td>
				<label1>Partido 1:</label1>
			</td>
			<td>
				<input name="txtpartidouno" type="text" required="required" maxlength="20" placeholder="Nombre partido 1">
			</td>
		</tr>
		<tr>
			<td>
				<label2>Partido 2:</label2>
			</td>
		    <td>
				<input name="txtpartidodos" type="text" required="required" maxlength="20" placeholder="Nombre partido 2">
			</td>
		</tr>

		<tr>
			<td>
				<label2>Partido 3:</label2>
			</td>
		    <td>
				<input name="txtpartidotres" type="text" required="required" maxlength="20" placeholder="Nombre partido 3">
			</td>
		</tr>

		<tr>
			<td>
				<label2>Partido 4:</label2>
			</td>
		    <td>
				<input name="txtpartidocuatro" type="text" required="required" maxlength="20" placeholder="Nombre partido 4">
			</td>
		</tr>
		<tr>
			<td>
				<label3>Nombre </label3>
			</td>
			<td>
				<input name="txtCoalicion" type="text" required="required" maxlength="20" placeholder="Nombre de la coalisión">
			</td>
		</tr>
		<tr>
			<td>
				<label4>Tipo de candidatura:</label4>
			</td>
			<td>
				<select name="Tipo" required="required">
					<option value="">Seleccionar</option>
					<option value="Alcaldes">Alcaldes</option>
					<option value="Diputados">Diputados</option>
					<option value="Presidentes">Presidentes</option>
				</select>
			</td>
		</tr>
			<td>
			    <label3>Su Bandera:</label3><br>
		   </td>
			<td>
				<select name="Bandera" required="required">
					<option value="">seleccionar</option>
					<?php
                    $sql = "SELECT Bandera FROM banderacoalision;";
                    $datos = consultaD($con, $sql);
                        foreach ($datos as $value) {
                            print "<option value='";
                            print $value['Bandera'];
                            print "'>";
                            print $value['Bandera'];
                            print "</option>";
                        }

                     ?>
				</select>
				<td colspan="2">
				<input name="btnCoalicion" type="submit" class="btnEnviar" value="Guardar">
			</td>
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
         window.location='Coalicion.php';   
      
    }
    alert("Datos Almacenados Correctamente!!");
    setTimeout("redir3()",200);
}

if($_GET("e")!=null){
    
    function redir3(){
         window.location='Coalicion.php';
      
    }
    alert("Error al Guardar los Datos!!");
    setTimeout("redir3()",200);
}

</script>

<?php }else{
    header("Location:../formularios/InicioSesion.php");
 } ?>