<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Datos Usuario</title>
  <link rel="stylesheet" href="style.css">
  <!-- Fuentes consultadas:
 https://www.w3schools.com/php/func_string_implode.asp
  -->
</head>

<body>
  <?php
  # -- Variables del formulario --
  $nombre = $_REQUEST['nombre'];
  $apellidos = $_REQUEST['apellidos'];
  $edad = $_REQUEST['edad'];
  $peso = $_REQUEST['peso'];
  $sexo = $_REQUEST['sexo'];
  $estado = $_REQUEST['estado'];
  $aficiones = $_REQUEST['aficiones'];

  echo "<h1>Datos de $nombre $apellidos</h1>";
  echo "<h3>Compruebe que sus datos son correctos</h3>";

  echo "Su nombre es <b>$nombre.</b><br>";
  echo "Sus apellidos son <b>$apellidos.</b><br>";
  echo "Su edad es <b>$edad.</b><br>";
  echo "Su peso es de <b>$peso kilos.</b><br>";
  echo "Usted es <b>$sexo.</b><br>";
  echo "Su estado civil es <b>$estado.</b><br>";
  echo "Sus aficiones son:<b> " . implode(', ', $aficiones) . ".</b><br><br>";

  echo "<form action='formulario.php'>";
  echo "<a href='formulario.php'>Volver al formulario</a>";
  echo "</form>";



  ?>
</body>

</html>