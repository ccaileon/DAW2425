<?php
session_start();
include_once("../../data/database/conexion.php");

if (!isset($_SESSION['usuario'])) {
  header("Location: login/login.php");
  exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  // Obtenenemos y depuraramos los datos recibidos
  $nombre = mysqli_real_escape_string($database, $_POST['nombre']);
  $fecha = mysqli_real_escape_string($database, $_POST['fecha']);
  $ubicacion = mysqli_real_escape_string($database, $_POST['ubicacion']);
  $descripcion = mysqli_real_escape_string($database, $_POST['descripcion']);
  $capacidad = mysqli_real_escape_string($database, $_POST['capacidad']);


  if (!empty($nombre) && !empty($fecha) && !empty($ubicacion) && !empty($descripcion) && !empty($capacidad)) {
    $sql = "INSERT INTO eventos (nombre, fecha, lugar, descripcion, capacidad) 
            VALUES ('$nombre', '$fecha', '$ubicacion', '$descripcion', '$capacidad')";


    if (mysqli_query($database, $sql)) {
      header("Location: tablaEventos.php#tabla");
      exit();
    } else {
      echo "Error en la consulta: " . mysqli_error($database);
    }
  } else {
    echo "Faltan datos en el formulario.";
  }
}
?>