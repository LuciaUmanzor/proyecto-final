<?php
	if(isset($_GET["dui"])){
		$con=mysql_connect("localhost","root");
		mysql_select_db("tribunal");
		$dui=$_GET["dui"];
		if(mysql_query( $sql = "UPDATE `diputado` SET voto = voto+1 WHERE `diputado`.`id_diputado` = ".$_GET["partido"].";")){

			echo "GUARDADO";
		
			 header("location: papeletamunicipio.php");
		
		
		}else{
			echo "error";
			}
	}
?>