<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resultado Operación</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <?php
  # -- VARIABLES OPERACIONES --
  $numeroUno = $_REQUEST['numero1'];
  $numeroDos = $_REQUEST['numero2'];
  $operacion = $_REQUEST['operacion'];
  $resultado;
  echo '<div class="resultado">'; #Abrimos div de resultado
# -- RESULTADO OPERACIONES --
  switch ($operacion) {
    case 'sumar':
      $resultado = $numeroUno + $numeroDos;
      echo "<h1>El resultado de la suma de los números $numeroUno y $numeroDos es: $resultado.</h1>";
      break;
    case 'restar':
      $resultado = $numeroUno - $numeroDos;
      echo "<h1>El resultado de la resta de los números $numeroUno y $numeroDos es: $resultado.</h1>";
      break;
    case 'producto':
      $resultado = $numeroUno + $numeroDos;
      echo "<h1>El resultado del producto de los números $numeroUno y $numeroDos es: $resultado.</h1>";
      break;
    default:
      $resultado = $numeroUno / $numeroDos;
      echo "<h1>El resultado del cociente de los números $numeroUno y $numeroDos es: $resultado.</h1>";
  }

  # -- BOTON PARA VOLVER --
  echo "<FORM ACTION='operaciones.php' METHOD='POST'>";
  echo "<input type='submit' value='Volver a la Calculadora'>";
  echo "</FORM>";



  ?>
</body>

</html>