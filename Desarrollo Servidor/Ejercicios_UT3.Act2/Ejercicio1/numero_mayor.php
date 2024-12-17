<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>El mayor</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <?php
  # -- Variables --
  $numeros = array($_REQUEST['numero1'], $_REQUEST['numero2'], $_REQUEST['numero3']);
  $numeroMayor = 0;
  for ($i = 0; $i < count($numeros); $i++) {
    if ($numeros[$i] > $numeroMayor) {
      $numeroMayor = $numeros[$i];
    }
  }
  echo '<div class="contenedor">';
  echo '<form action="index.php">';
  echo "<h1>¡El número mayor es $numeroMayor!</h1>";
  echo '<input type="submit" value="Volver">';
  echo '</form> </div>';





  ?>
</body>

</html>