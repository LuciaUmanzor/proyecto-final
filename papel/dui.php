
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>Ingresar un dui válido</title>
  <link rel="stylesheet" type="text/css" href="mycss/estiloPresidente.css">
  <link rel="stylesheet" type="text/css" href="mycss/estiloPresidente.css">
  <link rel="shortcut icon" type="image/x-icon" href="image/ic.ico">


    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>

    <script src="./libs/jquery-2.1.0.js"></script>
    <link rel="stylesheet" href="./libs/jquery-ui/css/smoothness/jquery-ui-1.10.4.custom.min.css">
    <script src="./libs/validacion/jquery.validate.min.js"></script>
    <script src="./libs/validacion/messages.js"></script>
    <script src="./libs/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
  
 
 <link href="jquery.keypad.css" rel="stylesheet">
<style>
#inlineKeypad { width: 10em; }
</style>

<script src="jquery.plugin.js"></script>
<script src="jquery.keypad.js"></script>
<script>
$(function () {
  $('#defaultKeypad').keypad();
  $('#inlineKeypad').keypad({onClose: function() {
    alert($(this).val());
  }});
});
</script>
               
</head>
<body body style="background:#9999ff">
 <header>

 <figure>

              <center><p> <img src="imagen/333.gif">  </p></center>
             </figure> 


  <center><h1>VOTACIONES EN LINEA</h1></center>

  </header>
  
  
</div>
</div>


 <div class="jumbotron">
            <form action="dui.php" method="POST" id="precidente">
            <table class="table-bordered">

            <div class="row">
            <center><p><img src="imagen/dui.gif" width="100"heigh="104" HSPACE=40 border="0"> </p></center></br></p></center></br>
           
                <div class="col-xs-2">
                    <center>Ingrese su Numero de Dui:</center>
                </div>
                <div class="col-xs-2">
                    <center><input type="text" class="inputdui" id="defaultKeypad" name="dui" class="required digits form-control" placeholder="00000000-0" name = "dui" style="width:180px;"required></center>
                </div>
            </div>
            <div class="row">
                    <center><input type="submit" name='bot' value='BUSCAR' class="btn btn-primary">
                    </center>
                </div>
            </div>
        </table>
        </form>

    
</body>

</html>


<?php
error_reporting(0);
session_start();
if(isset($_POST["dui"])){
 @$numero = $_REQUEST['dui'];
$conexion = mysql_connect("localhost", "root","") or die ("PROBLEMA AL CONECTAR");


 mysql_select_db("tribunal", $conexion) or die ("ERROR AL CONECTAR A LA BASE DE DATOS");

 $estandar= mysql_query( "SELECT * FROM registrovotantes where DUI = '".$_POST['dui']."'" ,$conexion);

 if(mysql_num_rows($estandar)>0){
  $_SESSION['usuario'] = $_POST['dui'];
    header("location: papeletaprecidente.php");

} else {
echo "EL NUMERO DE DUI NO SE ENCUENTRA";
       
}

}
?>