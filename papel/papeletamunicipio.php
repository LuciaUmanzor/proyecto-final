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
        <script type="text/javascript" src="javascript.js"></script>
</head>
<body style="background:#ffcccc" onload="retroceder();">





<div id="titulo">
<header>


  <center><h1>PAPELETA PARA ELECCIONES DE ALCALDES</h1></center>

  </header>
</div>
  
 <div class="jumbotron">
       <form action="voto.php" method="post" id="voto">
         <table class="table-bordered">
         
  <div id="imagen1">
     <figure>
  <a href="votacion.php?dui=<?php echo $_SESSION['usuario']; ?>&partido=1"> <img src="partidos/Alianza.jpg"></a>
  </figure>
  </div>


    <div id="imagen2">
     <figure>
    <a href="votacion.php?dui=<?php echo $_SESSION['usuario']; ?>&partido=2"> <img src="partidos/L.A.Z.G.png"></a>
  </figure>
  </div>
  
 <br> <div id="imagen3">
     <figure>
    <a href="votacion.php?dui=<?php echo $_SESSION['usuario']; ?>&partido=3"> <img src="partidos/LIBRE.png"></a>
  </figure>
  </div></br>
  

  <div id="imagen4">
     <figure>
    <a href="votacion.php?dui=<?php echo $_SESSION['usuario']; ?>&partido=4"> <img src="partidos/PHP.png"></a>
  </figure>
  </div>


  <div id="imagen5">
     <figure>
  <a href="votacion.php?dui=<?php echo $_SESSION['usuario']; ?>&partido=5"> <img src="partidos/union.jpg"></a>
  </figure>
  </div>

</table>

    </tr>

</from>

    </div>

 </html>
?>