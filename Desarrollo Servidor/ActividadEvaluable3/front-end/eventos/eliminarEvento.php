<?php
include_once("../../data/database/conexion.php");

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"])) {
  $id = $_GET["id"];

  // Validamos que el id sea numérico (por seguridad extra)
  if (!is_numeric($id)) {
    exit("ID inválido.");
  }

  $sql = "DELETE FROM eventos WHERE id = ?";

  $stmt = $database->prepare($sql);
  $stmt->bind_param("i", $id); // i de integer

  if ($stmt->execute()) {
    header("Location: tablaEventos.php");
    exit();
  } else {
    echo "Error al eliminar el evento.";
  }

  $stmt->close();
  $database->close();
} else {
  echo "Solicitud no válida. Consulte al administrador de la página.";
}