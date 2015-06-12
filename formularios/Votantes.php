<?php session_start();

    if (isset($_SESSION['Usuario'])) {
?>
<?php $conexion = new mysqli('127.0.0.1', 'root', '', 'tribunal'); ?>
<!DOCTYPE html>

<html lang="es">

<head>
	<meta charset="utf-8">
	<title> Inscripción de votantes</title>
	<script language="javascript" src="js/jquery.js"></script>
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
                   <li><a href="../consultas/consultarvotante.php">Registros</a>
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

                   <li><a href="Coalicion.php">Votantes</a></li>
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
		<p>Incripción Votantes</p>
	<table border="0x">
		<form method="post" action="../manejadores/manejadorVotante.php?accion=save" name="forVotantes">
			<tr>
				<td>
					<label3>Nombres:</label3>
				</td>
				<td>
					<input name="txtNombresVotante" type="text" placeholder="Nombres del Votante" required="required" maxlength="35">
				</td>
			</tr>
			<tr>
				<td>
					<label2>Apellido:</label2>
				</td>
				<td>
					<input name="txtapellidoVotante" type="text" placeholder="Apellidos del Votante" required="required" maxlength="35">
				</td>
			</tr>
			<tr>
				<td>
					<label1>DUI:</label1>
				</td>
				<td>
					<input name="txtDUI" type="text" maxlength="`10" id="input" pattern="[0-9]{8}[-][0-9]{1}" title="debe conter 9 digitos seguidos de '-'antes del ultimo digito" placeholder="00000000-0" required="required" >
				</td>
			</tr>
			<tr>
				<td>
					<label5>Género:</label5>
				</td>
				<td>
					<select name="Radgenero" required="required">
						<option value="">Seleccionar</option>
						<option value="Femenino">Femenino</option>
						<option value="Masculino">Masculino</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<label6>Fecha de nacimiento:</label6>
				</td>
				<td>
					<input name="FechaNac" type="date" required="required">
				</td>
			</tr>
			<tr>
				<td>
					<label7>Dirección:</label7>
				</td>
				<td>
					<textarea name="Direccion" rows="5" cols="35" placeholder="Dirección del Votante" required="required" maxlength="50"></textarea>
				</td>
			</tr>
			<tr>
				<td>
					<label8>Departamento:</label8>
				</td>
				<td>
					<select name="depto" id="depto" required="required">
						<option value="">Seleccionar</option>
						<?php
						$result = $conexion->query("SELECT * FROM departamento");
						if ($result->num_rows > 0) {
						while ($row = $result->fetch_assoc()) {
							echo '<option value="'.$row['codigo'].'">'.utf8_encode($row['nombre']).'</option>';
						}
						}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<label9>Municipio:</label9>
				</td>
				<td>
					<select name="municipio" id="municipio" required="required">
						<option value="">Seleccionar</option>
									
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<input name="btnGuardarVotantes" type="submit" class="btnEnviar" value="Guardar">
				</td>
			</tr>
		</form>
		<script language="javascript">
		$(document).ready(function(){
			$("#depto").change(function () {
				$("#depto option:selected").each(function () {
					id_depto = $(this).val();
					$.post("municipios.php", { id_depto: id_depto }, function(data){
						$("#municipio").html(data);
					});
				});
			})
		});
		</script>
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
         window.location='Votantes.php';   
      
    }
    alert("Datos Almacenados Correctamente!!");
    setTimeout("redir3()",200);
}

if($_GET("e")!=null){
    
    function redir3(){
         window.location='Votantes.php';   
      
    }
    alert("Error al Guardar los Datos!!");
    setTimeout("redir3()",200);
}

</script>

<?php }else{
    header("Location:../formularios/InicioSesion.php");
 } ?>