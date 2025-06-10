<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calculadora Online</title>

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
  echo "<div class ='calculadora'>";
  echo "<h1>Calculadora</h1>";
  echo "<form ACTION='datos_operaciones.php' method='POST'>";
  echo "<p>Introduzca los números a continuación:</p><br>";
  echo "<label for='numero1'>Introduzca el primer número:</label><br>";
  echo "<input type='number' name='numero1'><br>";
  echo "<label for='numero2'>Introduzca el segundo número</label><br>";
  echo "<input type='number' name='numero2'><br>";
  echo "<div class='operaciones'>";
  echo "<label for='opcion'>Escoje una opción:</label>";
  echo "<input type='radio' name='operacion' id='operacion' value='sumar'>Sumar";
  echo "<input type='radio' name='operacion' value='restar'>Restar";
  echo "<input type='radio' name='operacion' value='multiplicar'>Multiplicar";
  echo "<input type='radio' name='operacion' value='dividir'>Dividir<br>";
  echo "<input type='submit' value='Calcular'>";
  echo "</div>";
  echo "</form>";
  echo "</div>";


  ?>

</body>

</html>