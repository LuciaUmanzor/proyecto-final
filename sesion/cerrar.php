<?php 
	session_start();
	session_destroy();
	header("Location:../formularios/InicioSesion.php");
 ?>