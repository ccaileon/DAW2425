<?php
session_start();

if (isset($_GET['id']) && isset($_SESSION['usuario_id'])) {
  $idPropiedad = $_GET['id'];
  $idUsuario = $_SESSION['usuario_id'];

  $database = mysqli_connect("127.0.0.1", "root", "", "inmobiliaria") or die("No se ha podido conectar a la base de datos: " . mysqli_connect_error());

  if ($database) {

    $consultaPiso = "SELECT * FROM pisos WHERE Codigo_piso = '$idPropiedad' AND usuario_id = '$idUsuario'";
    $consultaLocal = "SELECT * FROM locales WHERE Codigo_local = '$idPropiedad' AND usuario_id = '$idUsuario'";


    $resultadoPiso = mysqli_query($database, $consultaPiso);
    $resultadoLocal = mysqli_query($database, $consultaLocal);

    if ($resultadoPiso && mysqli_num_rows($resultadoPiso) > 0) {

      $filaPiso = mysqli_fetch_assoc($resultadoPiso);
      $imagenPiso = $filaPiso['imagen_url']; 


      if (file_exists("seller/" . $imagenPiso)) {
        unlink("seller/" . $imagenPiso); 
      }

      $borrarPiso = "DELETE FROM pisos WHERE Codigo_piso = '$idPropiedad' AND usuario_id = '$idUsuario'";
      if (mysqli_query($database, $borrarPiso)) {
        echo "Se ha eliminado la propiedad correctamente.";
      } else {
        echo "Error al eliminar el piso: " . mysqli_error($database);
      }
    } elseif ($resultadoLocal && mysqli_num_rows($resultadoLocal) > 0) {

      $borrarLocal = "DELETE FROM locales WHERE Codigo_local = '$idPropiedad' AND usuario_id = '$idUsuario'";
      if (mysqli_query($database, $borrarLocal)) {
        echo "Se ha eliminado la propiedad correctamente.";
      } else {
        echo "Error al eliminar el local: " . mysqli_error($database);
      }
    } else {

      echo "No tienes permiso para eliminar esta propiedad o no existe.";
    }
  
  }

  echo "<div class='row'>
    <a href='index-seller.php'>Volver</a>
  </div>";

  mysqli_close($database);
} else {
  echo "Error al eliminar la propiedad.";
}
?>