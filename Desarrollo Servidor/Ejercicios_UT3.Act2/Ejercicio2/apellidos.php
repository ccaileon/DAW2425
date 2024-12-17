<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $_SESSION['apellidos'] = $_POST['apellidos'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Apellidos</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>


  <form action="apellidos.php" method="POST">
    <label for="apellidos">Apellidos:</label>
    <input type="text" id="apellidos" name="apellidos" required>
    <button type="submit">Guardar</button>
  </form>

 <a href="formulario.php">Volver a la página principal</a>




</body>

</html>