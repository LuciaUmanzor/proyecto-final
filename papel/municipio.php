<?php
session_start();
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



         <meta charset="iso-8859-1">
       <meta name="Descripcion" content="multimedia">
     <meta name="Contenido" content="Aplicacion">
      <link rel="stylesheet" href="./libs/bootstrap/css/bootstrap.css">
    <script src="./libs/jquery-2.1.0.js"></script>
    <link rel="stylesheet" href="./libs/jquery-ui/css/smoothness/jquery-ui-1.10.4.custom.min.css">
    <script src="./libs/validacion/jquery.validate.min.js"></script>
    <script src="./libs/validacion/messages.js"></script>
    <script src="./libs/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
  
</head>

 <body>

<div id= "titulo2">

<header>


  <h1>PAPELETA DE ELECION DE  CONSEJOS     EL SALVADOR EN ELECCIONES</h1>
  <h2></h2>
</div>
  </header>
  
 <div class="jumbotron">
        <form action="voto.php" method="post" id="presidente">
            <table class="table-bordered">
           
         <table class="table-bordered">
         
<div id="textoPr">
    <div id="imagen1">
     <figure>
<a href="votacion.php?dui=<?php echo $_SESSION['dui']; ?>&partido=6">  <img src="partidos/popular.jpg" ></img></a>
  </figure>
  </div>

   <div id="imagen2">
     <figure>
   <a href="votacion.php?dui=<?php echo $_SESSION['dui']; ?>&partido=2"> <img src="partidos/CAMPESINO.jpg" ></img></a>
  </figure>
  </div>

    <div id="imagen3">
     <figure>
  <a href="votacion.php?dui=<?php echo $_SESSION['dui']; ?>&partido=3"> <img src="partidos/revolucion.jpg"></img></a>
  </figure>
  </div>
  
 <br> <div id="imagen4">
     <figure>
   <a href="votacion.php?dui=<?php echo $_SESSION['dui']; ?>&partido=1"><img src="partidos/cafe.jpg"></img></a>
  </figure>
  </div></br>
  

  <div id="imagen5">
     <figure>
  <a href="votacion.php?dui=<?php echo $_SESSION['dui']; ?>&partido=5"> <img src="partidos/libertad.jpg" ></img></a>
  </figure>
  </div>


  <div id="imagen6">
     <figure>
  <a href="votacion.php?dui=<?php echo $_SESSION['dui']; ?>&partido=4"> <img src="partidos/esperanza.jpg" ></img></a>
  </figure>
  </div>




</from>
 <?php
      print '<a href=\'VOTO.PHP\'>SIGUIENTE PAGINA</a>';
?>
</table>
    </div>

 </html>
 