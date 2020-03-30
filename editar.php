<?php

// Cargamos los fichero '.php' que se van a utilizar...
spl_autoload_register (function ($clase) {
  require "$clase.php";
});



switch ($_POST['submit']) {
  case "Actualizar":
    // Obtenemos los valores... y lo actualizamos
      //En este caso los obtengo como un array, ya que así lo he puesto en el formulario
      //Se puede hacer de otra forma (campo a campo)
    $producto=$_POST['producto'];
    /*
     *
     */
    $result= DB::actualiza_producto (/*...*/);
    $familia = $producto['familia']; //Lo necesito para poder reestablecer la familia

    DB::cerrar (); // Cerrar conexión con la BBDD...

    header ("Location: actualizar.php?msj=$result&familia=$familia");// Redirigir (enviando 1=Si modifico, 0=No)
    break;

  case "Cancelar":

    break;
  default:
      //Obtengo los productos
    if (isset($_POST['cod'])) {
        $cod_producto =$_POST['cod'];
        $familias=DB::obtener_familias ();
        $producto=DB::obtener_producto ($cod_producto); // Obtener los datos del producto seleccionado...
    }else{
        header ("Location: listado.php");
        exit();
    }

}

?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Modificar Producto</title>
  <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<divbody>
  <div id="container">
    <div id="encabezado">
      <h1>Ingrese los nuevos datos para actualizar el producto</h1>
    </div>
    <div id="contenido">

      <fieldset>
        <legend>Modificar Producto</legend>
        <form action="editar.php" method="POST">
            <!-- Introducir los campos del producto a modificar -->
            <input type="submit" id="success" value="Actualizar" name="submit">
            <input type="submit" id="cancel" value="Cancelar" name="sumbit">
        </form>
      </fieldset>
    </div>
    <div id="pie"></div>
  </div>
  </body>
</html>
