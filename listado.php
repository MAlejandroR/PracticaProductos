<?php

//Auto carga de clases
spl_autoload_register (function ($clase) {
  require_once ("$clase.php");
});

//Tomamos los datos de conexion
$datos=parse_ini_file ("conexion.ini");

//Si hace falta inicializamos variables
$familia_selected=null;

//Obtenemos todas las familias (cod y nombre)
$familias=DB::obtener_familias ();



//Si he presionado algún botón actualizo familia o voy a editar.php
//Si hace falta obtenemos todos los productos

//Por ejemplo

//Muy importante cerrar la conexión
DB::cerrar ();


?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Práctica Productos</title>
  <link rel="stylesheet" href="estilo.css">
</head>
<body>
<div id="container">
  <div id="encabezado">
    <h1 >Tarea: Listado de productos de una familia </h1>
    <form  class="contenido_encabezado" action="listado.php" method="post">
      <label for="">Familia </label>
      <select name="familia">
        <?php
        //Mostramos las familias

        ?>
      </select>
      <input type="submit" value="Mostrar producto" name="submit">
    </form>
    <br />
  </div>

  <div id="contenido">
    <?php
    //Si hemos selecionado una familia mostramos los productos

    ?>
  </div>

  <div id="pie"></div>

</div>
</body>
</html>
