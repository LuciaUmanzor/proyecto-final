<?php
session_start();
if(isset($_SESSION["usuario"])){
  mysql_connect("localhost","root","");
  mysql_select_db("tribunal");
  $t=mysql_query("select * from registrovotantes where DUI='".$_SESSION["usuario"]."'");
    if(mysql_num_rows($t)>0){
      if(mysql_result($t,0,"estado")=="0"){


?>
  <!doctype html>
  
    <html lang="es">

   <head>
  <meta charset="iso-8859-1">
  <meta name="descripcion" content=" Aplicacion web">
     <meta name="contenido" content="codigo basico html5">
       <title>ELECCION EN EL SALVADOR </title>
    
         <meta charset="iso-8859-1">
       <meta name="Descripcion" content="multimplicacion">

     <link type="text/css" rel="stylesheet" href="css/estiloPresindente.css">
       <link rel="stylesheet" href="css/normalize.css">
       <script type="text/javascript" src="javascript.js"></script>
</head>
<body style="background:#9999ff" onload="retroceder();">




<div id="titulo">
<header>


  <br><center><h1>PAPELETA PARA ELECCIONES DE PRESIDENTE</h1></center><br>

  </header>
</div>
  
 <div class="jumbotron">
       <form action="voto.php" method="post" id="voto">
         <table class="table-bordered">
         
  <div id="imagen1">
     <figure>
  <a href="votar.php?dui=<?php echo $_SESSION['usuario']; ?>&partido=1"> <img src="partidos/Alianza.jpg"></a>
  </figure>
  </div>


    <div id="imagen2">
     <figure>
    <a href="votar.php?dui=<?php echo $_SESSION['usuario']; ?>&partido=2"> <img src="partidos/L.A.Z.G.png"></a>
  </figure>
  </div>
  
 <br> <div id="imagen3">
     <figure>
    <a href="votar.php?dui=<?php echo $_SESSION['usuario']; ?>&partido=3"> <img src="partidos/LIBRE.png"></a>
  </figure>
  </div></br>
  

  <div id="imagen4">
     <figure>
    <a href="votar.php?dui=<?php echo $_SESSION['usuario']; ?>&partido=4"> <img src="partidos/PHP.png"></a>
  </figure>
  </div>


  <div id="imagen5">
     <figure>
  <a href="votar.php?dui=<?php echo $_SESSION['usuario']; ?>&partido=5"> <img src="partidos/union.jpg"></a>
  </figure>
  </div>

</table>

 <tr>
  <br><br><br><br><br>
      <td colspan="2">
            <br><input type= "submit" name= 'bot' value= 'VOTAR' class="btn btn-info"></br>
      </td>

    </tr>

</from>
<?php
      print '<a href=\'papeletadiputados.php\'>SIGUIENTE PAGINA</a>';
?>
</table>
    </div>

 </html>

<?php
 }else{
  echo "USTED YA HA VOTADO<br>";
  echo "<a href='dui.php'>Regresar</a>";
 }
    }else{
      echo "NO EXISTE EL NUMERO DE DUI";
    }
}
?>