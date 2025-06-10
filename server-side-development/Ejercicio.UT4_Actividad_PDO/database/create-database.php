<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Base de Datos</title>
</head>
<body>
  
<?php 

$server = "127.0.0.1";
$user = "root";
$password = "";

try {
  $conexion = new PDO("mysql:host=$server", $user, $password);
  $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Conectado con éxito, base de datos creada";


$sql = "CREATE DATABASE IF NOT EXISTS actividad";
$conexion->exec($sql);

$conexion->exec("USE actividad");

$sqlEmpleados = "CREATE TABLE empleados (
  Id INT NOT NULL AUTO_INCREMENT,
  Nombre VARCHAR(50) NOT NULL,
  Apellido VARCHAR(80) NOT NULL,
  Email VARCHAR(150) NOT NULL,
  Salario DECIMAL(6,2) NOT NULL,
  PRIMARY KEY (Id)
)";

$conexion->exec($sqlEmpleados);

} catch (PDOException $e) {
  echo "Error: "
    . $e->getMessage();
}
?>
</body>
</html>