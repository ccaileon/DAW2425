<?php
session_start(); // Inicia la sesión

if (!isset($_SESSION['nombre'])) {
  $_SESSION['nombre'] = '';
}

if (!isset($_SESSION['apellidos'])) {
  $_SESSION['apellidos'] = '';
}
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Datos Eliminados</title>
   <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Los datos han sido borrados</h1>
    <p><a href="formulario.php">Volver a la página principal</a></p>
</body>
</html>

