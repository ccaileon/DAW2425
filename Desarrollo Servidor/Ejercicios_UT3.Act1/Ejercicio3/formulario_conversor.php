<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Conversor</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <?php
  echo "<div class='conversor'>";
  echo "<h1>Conversor Kb a Mb</h1>";
  echo "<form action='resultado_conversor.php' method='POST'>";
  echo "<h2>Escoge la conversión:</h2>";
  echo "<label for='kb'>Kb a Mb</label>";
  echo "<input type='radio' name='tipo' value='Kb'><br>";
  echo "<label for='kb'>Mb a Kb</label>";
  echo "<input type='radio' name='tipo' value='Mb'><br>";
  echo "<label for'datos'>Introduce el tamaño:</label>";
  echo "<input type='number' step='0,01' name='datos' placeholder='Kb/Mb'>";
  echo "<input type='submit' value='Calcular'>";
  echo "</div>";
  echo "</form>";



  ?>
</body>

</html>