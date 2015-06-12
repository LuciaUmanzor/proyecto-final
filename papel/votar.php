<?php
	if(isset($_GET["dui"])){
		$con=mysql_connect("localhost","root");
		mysql_select_db("tribunal");
		$dui=$_GET["dui"];
		if(mysql_query( $sql = "UPDATE `presidente` SET VOTO = VOTO+1 WHERE id_presidente = ".$_GET["partido"].";")){

			echo "GUARDADO";
			mysql_query("update registrovotantes set estado=1 where DUI='".$dui."'");
			 header("location: papeletadiputados.php");
		}
		 elseif(mysql_query( $sql = "UPDATE `presidente` SET VOTO = VOTO+1 WHERE `presidente`.`id_presidente` = ".$_GET["partido"].";")){

			echo "GUARDADO";
			
			 header("location: papeltamunicipio.php");
		}else{
			echo "error";
			}
	}
?>