<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $_SESSION['nombre'] = $_POST['nombre'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nombre</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>



  <form action="nombre.php" method="POST">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required>
    <button type="submit">Guardar</button>
  </form>
  <a href="formulario.php">Volver a la página principal</a>





</body>

</html>