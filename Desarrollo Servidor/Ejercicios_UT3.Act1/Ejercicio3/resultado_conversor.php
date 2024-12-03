<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resultado</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <?php
  # -- Variables --
  $tipoConversion = $_REQUEST['tipo'];
  $datos = $_REQUEST['datos'];
  $resultado;
  echo "<div class='conversor'>";
  switch ($tipoConversion) {
    case 'Kb':
      $resultado = $datos / 1024;
      echo "<p>$datos Kb son $resultado Mb.</p>";
      break;

    default:
      $resultado = $datos * 1024;
      echo "<p>$datos Mb son $resultado Kb.</p>";
  }
  echo "<form action='formulario_conversor.php'>";
  echo "<input type='submit' value='Volver'>";
  echo "</form></div>";
  ?>
</body>

</html>