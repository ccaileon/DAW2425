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
  # -- Variables días de la semana --
  $horasTrabajadas = array($_REQUEST['lunes'], $_REQUEST['martes'], $_REQUEST['miercoles'], $_REQUEST['jueves'], $_REQUEST['viernes']);
  $totalHoras = array_sum($horasTrabajadas);
  $paga = $totalHoras * 12;
  echo "<h1>Total horas trabajadas</h1>";
  echo "Esta semana has trabajado un total de $totalHoras horas. Te corresponde una paga semanal de $paga €.";

  echo "<form action='horas_formulario.php'>";
  echo "<input type='submit' value='Volver'>";
  ?>
</body>

</html>