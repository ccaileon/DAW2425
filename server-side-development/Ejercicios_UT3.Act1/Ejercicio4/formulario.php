<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <?php
  echo "<h1>Formulario de Usuario</h1>";
  echo "<form action='datos_usuario.php' method='POST'>";
  echo "<div class='formulario'>";
  echo "<p>Escriba los datos siguientes:</p>";
  echo "<label for='nombre'>Nombre:</label>";
  echo "<input type='text' name='nombre' required>";
  echo "<label for='apellidos'>Apellidos:</label>";
  echo "<input type='text' name='apellidos' required>";
  echo "<label for='edad'>Edad:</label>";
  echo "<select id='edad' name='edad' required>
  <option value='seleccione' disabled>-- seleccione --</option>
    <option value='menor de 20 años'>Menor de 20 años</option>
    <option value='entre 20 y 39 años'>Entre 20 y 39 años</option>
    <option value='entre 40 y 59 años'>Entre 40 y 59 años</option>
     <option value='mayor de 60 años'>Mayor de 60 años</option>
  </select>";
  echo "<label for='peso'>Peso:</label>";
  echo "<input type='number' max='300' name='peso' required>";

  echo "<label for='sexo'>Sexo: </label>";
  echo "<input type='radio' name='sexo' value='Hombre'>";
  echo "<label for='hombre'>Hombre </label>";
  echo "<input type='radio' name='sexo' value='Mujer'>";
  echo "<label for='mujer'>Mujer </label>";

  echo "<label for='estado'> Estado civil: </label>";
  echo "<input type='radio' name='estado' value='Soltero'>";
  echo "<label for='soltero'>Soltero </label>";

  echo "<input type='radio' name='estado' value='Casado'>";
  echo "<label for='casado'>Casado </label>";

  echo "<input type='radio' name='estado' value='Otro'>";
  echo "<label for='otro'>Otro </label><br>";



  echo "<label for='aficiones'>Aficiones: </label><br>";

  echo "<input type='checkbox' name='aficiones[]' value='cine'>
  <label for='aficion1'>Cine</label><br>";

  echo "<input type='checkbox' name='aficiones[]' value='literatura'>
  <label for='aficion2'>Literatura</label><br>";

  echo "<input type='checkbox' name='aficiones[]' value='Tebeos'>
  <label for='aficion3'>Tebeos</label><br>";

  echo "<input type='checkbox' name='aficiones[]' value='deporte'>
  <label for='aficion4'>Deporte</label><br>";

  echo "<input type='checkbox' name='aficiones[]' value='musica'>
  <label for='aficion5'>Música</label><br>";

  echo "<input type='checkbox' name='aficiones[]' value='television'>
  <label for='aficion6'>Televisión</label><br>";

  echo "<input type='submit' value='Enviar'>";
  echo "<input type='reset' value='Borrar'>";

  ?>
</body>

</html>