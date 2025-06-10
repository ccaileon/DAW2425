<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calculadora Salario</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <?php
  echo "<h1>Calculadora de salario semanal</h1>";
  echo "<form action='calculo_horas.php' method='POST'>";
  echo "<p>Introduce el número de horas trabajadas cada día (excluye el tiempo de descanso):</p>";
  echo "<div class='formulario'>";
  echo "<label for='lunes'>Lunes:</label><br>";
  echo "<input type='number' step='0.1' name='lunes'><br>";
  echo "<label for='martes'>Martes:</label><br>";
  echo "<input type='number' step='0.1' name='martes'><br>";
  echo "<label for='miercoles'>Miércoles:</label><br>";
  echo "<input type='number' step='0.1' name='miercoles'><br>";
  echo "<label for='jueves'>Jueves:</label><br>";
  echo "<input type='number' step='0.1' name='jueves'><br>";
  echo "<label for='viernes'>Viernes:</label><br>";
  echo "<input type='number' step='0.1' name='viernes'><br>";
  echo "</div>";
  echo "<input type='submit' value='Calcular salario'>";
  echo "</form>"

    ?>
</body>

</html>