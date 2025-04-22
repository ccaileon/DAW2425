<?php
include_once("../../data/database/conexion.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = $_POST['id'];
  $nombre = $_POST['nombre'];
  $fecha = $_POST['fecha'];
  $ubicacion = $_POST['ubicacion'];
  $capacidad = $_POST['capacidad'];
  $descripcion = $_POST['descripcion'];

  $sql = "UPDATE eventos SET nombre=?, fecha=?, lugar=?, capacidad=?, descripcion=? WHERE id=?";
  // Preparamos la consulta para evitar inyecciones
  $stmt = $database->prepare($sql);
  $stmt->bind_param("sssisi", $nombre, $fecha, $ubicacion, $capacidad, $descripcion, $id); // sssisi -> string, string, string, integer, integer (datos que entran)

  if ($stmt->execute()) {
    header("Location: tablaEventos.php#tabla");
  } else {
    echo "Error al actualizar el evento.";
  }
}
?>