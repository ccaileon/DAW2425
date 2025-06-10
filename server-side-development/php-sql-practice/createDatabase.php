<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crear Base de Datos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="styles.css" rel="stylesheet">
</head>

<body>
  <?php

  $server = "127.0.0.1";
  $user = "root";
  $password = "";


  $conexion = mysqli_connect($server, $user, $password);


  if (!$conexion) {
    die("Fallo la conexión: " . mysqli_connect_error());
  }

  $sql = "CREATE DATABASE IF NOT EXISTS concesionario";
  if (mysqli_query($conexion, $sql)) {
    echo "Base de datos 'concesionario' creada o ya existe.";
  } else {
    echo "Error al crear la base de datos: " . mysqli_error($conexion) . "<br>";
  }

  mysqli_select_db($conexion, "concesionario");

  $sql = "CREATE TABLE IF NOT EXISTS coches (
    id INT AUTO_INCREMENT PRIMARY KEY,
    marca VARCHAR(255) NOT NULL,
    modelo VARCHAR(255) NOT NULL,
    año INT NOT NULL
)";
  if (mysqli_query($conexion, $sql)) {
    echo "Tabla 'coches' creada correctamente.<br>";
  } else {
    echo "Error al crear la tabla: " . mysqli_error($conexion);
  }

  echo "<div class='row'><a href=add1.php>Ir a Inicio</a></div>";
  mysqli_close($conexion);
  ?>
</body>

</html>