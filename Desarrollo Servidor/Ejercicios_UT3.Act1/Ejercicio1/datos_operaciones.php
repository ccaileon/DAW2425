<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resultado</title>
  <style>
    body {
      height: 100vh;
      width: 100vw;
      display: flex;
      font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
      background-color: darkblue;
      color: black;
      justify-content: center;
      align-items: center;
      margin: 0;
    }

    h1 {
      color: blue;
    }

    .calculadora {
      display: flexbox;
      flex-direction: column;
      align-content: center;
      justify-content: center;
      justify-items: center;
      background-color: lightblue;
      padding: 100px;
      border: 5px solid white;
      border-radius: 500px;
    }

    input[type='number'] {
      padding: 10px;
      border-color: blue;
      margin: 5px;
      margin-bottom: 30px;
    }

    input[type='submit'] {
      display: flex;
      padding: 20px;
      background-color: blue;
      color: white;
      border-collapse: collapse;
      border: none;
      border-radius: 50px;
      justify-self: center;
      margin-top: 50px;
    }
  </style>
</head>

<body>
  <?php
  # -- Variables de la operación --
  $numero1 = $_REQUEST['numero1'];
  $numero2 = $_REQUEST['numero2'];
  $tipoOperacion = $_REQUEST['operacion'];
  $resultado;

  echo "<div class='calculadora'>";
  switch ($tipoOperacion) {
    case 'sumar':
      $resultado = $numero1 + $numero2;
      echo "<p>El resultado de la operación de $numero1 + $numero2 es $resultado</p>";
      break;

    case 'restar':
      $resultado = $numero1 - $numero2;
      echo "<p>El resultado de la operación de $numero1 - $numero2 es $resultado</p>";
      break;

    case 'multiplicar':
      $resultado = $numero1 * $numero2;
      echo "<p>El resultado de la operación de $numero1 x $numero2 es $resultado</p>";
      break;

    case 'dividir':
      $resultado = $numero1 / $numero2;
      echo "<p>El resultado de la operación de $numero1 / $numero2 es $resultado</p>";
      break;
  }

  echo "<FORM ACTION='operaciones.php'>";
  echo "<input type='submit' value='Volver a la calculadora'>";
  echo "</FORM>";
  echo "</div>"



    ?>
</body>

</html>