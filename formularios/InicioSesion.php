

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<title> Votaciónes en el Salvador</title>
	<link rel="stylesheet" type="text/css" href="../mycss/estilo.css">
	<link rel="stylesheet" type="text/css" href="../mycss/estiloSesion.css">
	<link rel="shortcut icon" type="image/x-icon" href="../image/ic.ico">
</head>

<body body style="background:#9999ff">

  	<div class="contenedor">
		<header>
			<div class="centra">
			<figure>
 
            
              <center><p> <img src="imagen/333.gif">  </p></center>

               </figure>
               </header>
		<header>
			<div class="centra">
				
		        <nav>
		        	<a href="../principal.php">Inicio</a>
		        </nav>
			</div>
	    </header>
	</div>

	<section>
		<div id="textoPr"><br>
			<tr>
				<td>
					<figure>
						<img class="sesion" src="../imagen/regis.png" alt="Inicio de Sesión">
					</figure>
				</td>
				<td>
					<form action="../sesion/sesion.php" method="post" name="forSesion">
						<label1>Usuario</label1><br>
						<input name="Usuario" type="text" class="inputUsuario" placeholder="Username" required="required" maxlength="10"><br>
						<label2>Clave</label2><br>
						<input name="Clave" type="password" class="inputUsuario" placeholder="Password" required="required" maxlength="10"><br>
						<input class="btnEnviar" type="submit" name="btnSubmit" value="INGRESAR">
					</form>
				</td>
			</tr>
		</table>
	</section>
</body>

</html>
