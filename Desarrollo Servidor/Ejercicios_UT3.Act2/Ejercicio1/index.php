<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>¿Cuál es mayor?</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <?php

  echo '<div class="contenedor">';
  echo '<form action="numero_mayor.php" method="POST">';
  echo '<h2>Introduce el primer número</h2>
  <input type="number" id="numero1" name="numero1" required>

    <h2>Introduce el segundo número</h2>
  <input type="number" id="numero2" name="numero2" required>

    <h2>Introduce el tercer número</h2>
  <input type="number" id="numero3" name="numero3" required>';

  echo '<h3>¿Cuál es mayor?</h3>';
  echo '<input type="submit" value="¡Descúbrelo!">';
  echo '</form></div>'
    ?>
</body>

</html>