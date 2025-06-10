<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calculadora</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <?php
  echo "<h1>Calculadora para Principiantes</h1>";
  echo "<div class='formulario'>"; #Abrimos div de formulario
  echo "<div class='numeros'>"; #Abrimos div de numeros
  # -- INTRODUCIR NÚMEROS --
  echo "<FORM ACTION='datos_operaciones.php' METHOD='POST'>";
  echo "<label for='numero1'>Introduzca el primer número: </label>";
  echo "<input type='number' name='numero1' id='numero1'><br>";
  echo "<label for='numero2'>Introduzca el segundo número: </label>";
  echo "<input type='number' name='numero2' id='numero2'><br>";
  echo "</div>"; #Cerramos div de numeros
# -- OPERACIONES --
  echo "<div class='operaciones'>"; #Abrimos div de operaciones
  echo "<label for 'operacion'>Seleccione la operación: </label><br>";
  echo "<input type='radio' name='operacion' value='sumar'>Suma";
  echo "<input type='radio' name='operacion' value='restar'>Resta";
  echo "<input type='radio' name='operacion' value='producto'>Producto";
  echo "<input type='radio' name='operacion' value='cociente'>Cociente";
  echo "</div>"; #Cerramos div de operaciones
  echo "<input type='submit' value='Enviar datos'/>"; #Boton de enviar
  echo "</div>"; #Cerramos div de formulario
  




  ?>
</body>

</html>