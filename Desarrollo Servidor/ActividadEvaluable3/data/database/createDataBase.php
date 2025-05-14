<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crear Base de Datos</title>
</head>
<body>
  <?php 
  
$server = "127.0.0.1";
$user = "root";
$password = "";

$conexion = mysqli_connect($server, $user, $password);

if (!$conexion) {
  die("Fallo en la conexión: " . mysqli_connect_error());
}

$sql = "CREATE DATABASE IF NOT EXISTS eventos_tech";
if (mysqli_query($conexion, $sql)) {
  echo "Base de datos 'eventos_tech' creada o ya existente.";
} else {
  echo "Error al crear la base de datos: " . mysqli_error($conexion) . "<br>";
}

mysqli_select_db($conexion, "eventos_tech");

# -- Tabla Eventos --
$sqlTablaEventos = "CREATE TABLE eventos (
id INT AUTO_INCREMENT PRIMARY KEY,
nombre VARCHAR(100) NOT NULL,
fecha DATE NOT NULL,
descripcion TEXT,
lugar VARCHAR(100),
capacidad INT
);";

if (mysqli_query($conexion, $sqlTablaEventos)) {
  echo "Tabla 'eventos' creada correctamente. <br>";
} else {
  echo "Error al crear la tabla: " . mysqli_error($conexion);
}

 echo "<div class='row'><a href=../../front-end/login/login.php>Iniciar Sesión</a></div>";
  mysqli_close($conexion);

  ?>
</body>
</html>