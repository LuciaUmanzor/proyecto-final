<?php session_start(); ?>

<?php

 $dui = $_REQUEST['dui'];


 $conexion = mysql_connect("localhost", "root") or die ("PROBLEMA AL CONECTAR");


 mysql_select_db("tribunal", $conexion) or die ("ERROR AL CONECTAR A LA BASE DE DATOS");

 
 $estandar= mysql_query( "SELECT * FROM registrovotantes where idVotante = '$dui' AND estado=0" ,$conexion);
  //var_dump($estandar);
  //exit();
 if (mysql_num_rows($estandar)>0) {
					$row = mysql_fetch_array($estandar);
					$_SESSION["dui"] = $row['dui']; 
					header("location: papeletaprecidente.php=".$row['dui']);


				
				}
				else{
					header("Location:dui.php?msg=1");
				}
			
		?>