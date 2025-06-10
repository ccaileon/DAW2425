<?php 
$server = "127.0.0.1";
$user = "root";
$password = "";
$database = "actividad";

try {
  $conexion = new PDO("mysql:host=$server;dbname=$database;charset=utf8", $user, $password);

  $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die("Error de conexión: " . $e->getMessage());
}

?>