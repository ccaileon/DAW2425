<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ver datos</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>

<?php

$nombre = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : 'No introducido';
$apellidos = isset($_SESSION['apellidos']) ? $_SESSION['apellidos'] : 'No introducido';

echo "<h1>Datos Introducidos</h1>";
echo "<p>Nombre: $nombre</p>";
echo "<p>Apellidos: $apellidos</p>";

echo "    <p><a href='formulario.php'>Volver a la página principal</a></p>"
?>

</body>

</html>