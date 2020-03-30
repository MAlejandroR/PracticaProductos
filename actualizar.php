<?php
//Este fichero se puede usar sin modificar
$texto = $_GET['msj'];
$familia = $_GET['familia'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta http-equiv="refresh" content="5; url=listado.php?familia=<?=$familia?>">
    <title>Plantilla para Ejercicios Tema 3</title>
    <link href="estilo.css" rel="stylesheet" type="text/css">
</head>

<body>

<div id="encabezado">
    <h1>Ejercicio: Gestión de productos </h1>
    </form>
</div>

<div id="contenido">
    <h2><?=$texto?></h2>
    <h3>Esta página en 5 segundos se redirigirá a listados.php</h3>
</div>

<div id="pie">
</div>
</body>
</html>
