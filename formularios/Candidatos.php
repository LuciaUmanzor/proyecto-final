<?php session_start();

    if (isset($_SESSION['Usuario'])) {
?>

<?php include '../coneccion/coneccion.php'; ?>
<?php $conexion = new mysqli('127.0.0.1', 'root', '', 'tribunal'); ?>


<!DOCTYPE html>

<html lang="es">

<head>
	<meta charset=utf-8>
	<title> Inscripción de Candidatos</title>
	<script language="javascript" src="js/jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="../mycss/estilo.css">
	<link rel="stylesheet" type="text/css" href="../mycss/estiloInscripcionPar.css">

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
                   <li><a href="../consultas/consultarcandidato.php">Registros</a>
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
                  <li><a href="Elecciones.php">Elecciones</a>
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

	<p>Incripción de Candidatos</p>
	<table border="0x">
		<form method="post" action="../manejadores/manejadorCandidato.php?accion=save" name="forCandidatos" enctype="multipart/form-data">
			<tr>
				<td>
					<label2>Nombres:</label2>
				</td>
				<td>
					<input name="NombresCandidato" type="text" placeholder="Nombre Candidato" required="required" maxlength="35">
				</td>
			</tr>
			<tr>
				<td>
					<label1>Apellidos:</label1>
				</td>
				<td>
					<input name="ApellidosCandidato" type="text" placeholder="Apellido Candidato" required="required" maxlength="35">
				</td>
			</tr>
			<tr>
				<td>
					<label1>Dui del Candidato:</label1>
				</td>
				<td>
					<input name="DUICandidato" type="text" maxlength="`10" id="input" pattern="[0-9]{8}[-][0-9]{1}" title="debe conter 9 digitos seguidos de '-'antes del ultimo digito" placeholder="00000000-0" required="required" maxlength="10">
				</td>
			</tr>
			<tr>
				<td>
					<label3>Tipo de Candidatura:</label3>
				</td>
				<td>
					<select name="TipoCandidato" required="required">
						<option value="">Seleccionar</option>
						<option value="Alcalde">Alcalde</option>
						<option value="Diputado">Diputado</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<label6>Participación</label6>
				</td>
				<td>
					<select name="Participacion" required="required">
		        	    <option value="">Seleccionar</option>
		        	    <option value="Partidaria">Partidaria</option>
		        	    <option value="Independiente">No Partidaria</option>
					</select>
				</td>
			</tr>

			<td>
			    <label3> coalision:</label3>
		   </td>
			<td>
				<select name="coalision" required="required">
					<option value="">seleccionar</option>
					<?php
                    $sql = "SELECT Nombre FROM coalision;";
                    $datos = consultaD($con, $sql);
                        foreach ($datos as $value) {
                            print "<option value='";
                            print $value['Nombre'];
                            print "'>";
                            print $value['Nombre'];
                            print "</option>";
                        }

                     ?>
				</select>d>
			<tr>
				<td>
					<label4>Departamento:</label4>
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
					<label5>Municipio:</label5>
				</td>
				<td>
					<select name="municipio" id="municipio" required="required">
						<option value="">Seleccionar</option>
					</select>
				</td>
			</tr>
	
		<form method="post" action="" enctype="multipart/form-data">
			<tr>
				<td>
					
				</td>
			</tr>
			<tr>
				
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<input name="btnGuardarCandidato" type="submit" class="btnEnviar" value="Guardar">
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
         window.location='Candidatos.php';   
      
    }
    alert("Datos Almacenados Correctamente!!");
    setTimeout("redir3()",200);
}

if($_GET("e")!=null){
    
    function redir3(){
         window.location='Candidatos.php';   
      
    }
    alert("Error al Guardar los Datos!!");
    setTimeout("redir3()",200);
}

</script>

<?php }else{
    header("Location:../formularios/InicioSesion.php");
 } ?>