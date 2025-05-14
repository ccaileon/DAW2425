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

  # -- Crear BBDD --
$sql = "CREATE DATABASE IF NOT EXISTS examensim";
if (mysqli_query($conexion, $sql)) {
  echo "Base de datos  examensim' creada o ya existente.";
} else {
  echo "Error al crear la base de datos: " . mysqli_error($conexion) . "<br>";
}

mysqli_select_db($conexion,  "examensim");

# -- Crear Tabla --
$sqlTablaUsuarios = "CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50),
    email VARCHAR(100),
    edad INT
);";

if (mysqli_query($conexion, $sqlTablaUsuarios)) {
  echo "Tabla 'usuarios' creada correctamente. <br>";
} else {
  echo "Error al crear la tabla: " . mysqli_error($conexion);
}

 echo "<div class='row'><a href=../frontend/addUser.php>Ir a la página principal</a></div>";
  mysqli_close($conexion);

  ?>
</body>
</html>


