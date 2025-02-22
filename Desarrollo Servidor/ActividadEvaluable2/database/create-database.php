<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crear Base de Datos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="css/styles.css" rel="stylesheet">
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

  $sql = "CREATE DATABASE IF NOT EXISTS inmobiliaria";
  if (mysqli_query($conexion, $sql)) {
    echo "Base de datos 'inmobiliaria' creada o ya existe.";
  } else {
    echo "Error al crear la base de datos: " . mysqli_error($conexion) . "<br>";
  }

  mysqli_select_db($conexion, "inmobiliaria");


  # -- Tabla Usuario --
  $sqlUsuario = "CREATE TABLE usuario (
usuario_id INT(5) NOT NULL AUTO_INCREMENT,
nombre VARCHAR(35) NOT NULL,
apellidos VARCHAR(60) NOT NULL,
correo VARCHAR(100) NOT NULL,
clave VARCHAR(80) NOT NULL,
tipo_usuario VARCHAR(20),
PRIMARY KEY (usuario_id)
)";
  if (mysqli_query($conexion, $sqlUsuario)) {
    echo "Tabla 'usuario' creada correctamente.<br>";
  } else {
    echo "Error al crear la tabla: " . mysqli_error($conexion);
  }

  # -- Tabla Pisos --
  $sqlPisos = "CREATE TABLE pisos (
Codigo_piso INT NOT NULL AUTO_INCREMENT,
calle VARCHAR(40) NOT NULL,
numero INT(3) NOT NULL,
piso INT NOT NULL,
puerta VARCHAR(5) NOT NULL,
cp INT NOT NULL,
metros INT NOT NULL,
ciudad VARCHAR (15),
precio FLOAT NOT NULL,
imagen_url VARCHAR(250) NOT NULL,
usuario_id INT(5) REFERENCES usuario(usuario_id),
PRIMARY KEY (Codigo_piso)
)";

  if (mysqli_query($conexion, $sqlPisos)) {
    echo "Tabla 'pisos' creada correctamente.<br>";
  } else {
    echo "Error al crear la tabla: " . mysqli_error($conexion);
  }

  # -- Tabla Locales --
  $sqlLocales = "CREATE TABLE locales (
Codigo_local INT NOT NULL AUTO_INCREMENT,
calle VARCHAR(40) NOT NULL,
numero INT(3) NOT NULL,
piso INT NOT NULL,
puerta VARCHAR(5) NOT NULL,
cp INT NOT NULL,
metros INT NOT NULL,
ciudad VARCHAR (15),
precio FLOAT NOT NULL,
imagen_url VARCHAR(255) NOT NULL,
usuario_id INT(5) REFERENCES usuario(usuario_id),
PRIMARY KEY (Codigo_local)
)";

  if (mysqli_query($conexion, $sqlLocales)) {
    echo "Tabla 'locales' creada correctamente.<br>";
  } else {
    echo "Error al crear la tabla: " . mysqli_error($conexion);
  }

  # -- Tabla Pisos Comprados --
  $sqlPisosComprados = "CREATE TABLE pisos_comprados (
usuario_comprador INT(5) REFERENCES usuario(usuario_id),
Codigo_piso INT REFERENCES pisos(Codigo_piso),
Precio_final FLOAT NOT NULL
)";

  if (mysqli_query($conexion, $sqlPisosComprados)) {
    echo "Tabla 'pisos_comprados' creada correctamente.<br>";
  } else {
    echo "Error al crear la tabla: " . mysqli_error($conexion);
  }

  # -- Tabla Locales Comprados --
  $sqlLocalesComprados = "CREATE TABLE locales_comprados (
usuario_comprador INT(5) REFERENCES usuario(usuario_id),
Codigo_local INT REFERENCES locales(Codigo_local),
Precio_final FLOAT NOT NULL
)";

  if (mysqli_query($conexion, $sqlLocalesComprados)) {
    echo "Tabla 'locales_comprados' creada correctamente.<br>";
  } else {
    echo "Error al crear la tabla: " . mysqli_error($conexion);
  }

  echo "<div class='row'><a href=#>Ir a Inicio</a></div>";
  mysqli_close($conexion);
  ?>
</body>

</html>