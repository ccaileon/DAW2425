<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panel Comprador</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="../../css/styles.css" rel="stylesheet">
</head>

<body>
  <header>
    <nav class="navbar navbar-light">
      <div class="container">
        <a class="navbar-brand" href="index-buyer.php">Inmobiliaria Costa del Sol</a>
        <form class="d-flex me-auto" action="search-buyer.php" method="POST">
          <select class="form-select me-2" name="tipo-propiedad" required>
            <option value="" selected disabled>- Tipo de propiedad -</option>
            <option value="piso">Piso</option>
            <option value="local">Local</option>
          </select>

          <select class="form-select me-2" name="ciudad" required>
            <option value="" selected disabled>- Ciudad -</option>
            <option value="Málaga">Málaga</option>
            <option value="Estepona">Estepona</option>
            <option value="Marbella">Marbella</option>
            <option value="Torremolinos">Torremolinos</option>
            <option value="Fuengirola">Fuengirola</option>
            <option value="Benalmádena">Benalmádena</option>
            <option value="Ronda">Ronda</option>
            <option value="Coín">Coín</option>
            <option value="Antequera">Antequera</option>
            <option value="Alhaurin el grande">Alhaurín el Grande</option>
          </select>

          <button class="btn btn-primary" type="submit">Buscar</button>
        </form>

        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="../logout.php">Cerrar Sesión</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <div class="container">
    <?php

    if (isset($_GET['id']) && isset($_GET['tipo']) && isset($_SESSION['usuario_id'])) {
      $idPropiedad = $_GET['id'];
      $tipoPropiedad = $_GET['tipo'];
      $idUsuario = $_SESSION['usuario_id'];

      $database = mysqli_connect("127.0.0.1", "root", "", "inmobiliaria") or die("No se ha podido conectar a la base de datos: " . mysqli_connect_error());

      if ($database) {

        if ($tipoPropiedad == 'piso') {

          $consultaPiso = "SELECT * FROM pisos WHERE Codigo_piso = '$idPropiedad'";
          $resultadoPiso = mysqli_query($database, $consultaPiso);

          if ($resultadoPiso && mysqli_num_rows($resultadoPiso) > 0) {
            $filaPiso = mysqli_fetch_assoc($resultadoPiso);


            $precioCompra = $filaPiso['precio'];
            $imagenPiso = $filaPiso['imagen_url'];

            $comprarPiso = "INSERT INTO pisos_comprados (usuario_comprador, Codigo_piso, Precio_final) 
                    VALUES ('$idUsuario','$idPropiedad', $precioCompra)";

            if (mysqli_query($database, $comprarPiso)) {
              $venderPiso = "DELETE FROM pisos WHERE Codigo_piso = $idPropiedad";
              mysqli_query($database, $venderPiso);

              if ($imagenPiso) {
                $rutaImagenPiso = "../seller/" . $imagenPiso;


                if (file_exists($rutaImagenPiso)) {
                  if (unlink($rutaImagenPiso)) {
                    echo "Ha adquirido el piso. Imagen eliminada correctamente.";
                  } else {
                    echo "Error al eliminar la imagen.";
                  }
                } else {
                  echo "No se ha podido completar la compra, la imagen del piso no existe.";
                }
              } else {
                echo "No se encontró una imagen para esta propiedad.";
              }
            } else {
              echo "Error al realizar la compra: " . mysqli_error($database);
            }
          }
        } elseif ($tipoPropiedad == 'local') {

          $consultaLocal = "SELECT * FROM locales WHERE Codigo_local = '$idPropiedad'";
          $resultadoLocal = mysqli_query($database, $consultaLocal);

          if ($resultadoLocal && mysqli_num_rows($resultadoLocal) > 0) {
            $filaLocal = mysqli_fetch_assoc($resultadoLocal);

            $precioCompra = $filaLocal['precio'];
            $imagenLocal = $filaLocal['imagen_url'];

            $comprarLocal = "INSERT INTO locales_comprados (usuario_comprador, Codigo_local, Precio_final) 
                     VALUES ('$idUsuario','$idPropiedad', $precioCompra)";

            if (mysqli_query($database, $comprarLocal)) {

              $venderLocal = "DELETE FROM locales WHERE Codigo_local = $idPropiedad";
              mysqli_query($database, $venderLocal);


              if ($imagenLocal) {
                $rutaImagenLocal = "../seller/" . $imagenLocal;

                if (file_exists($rutaImagenLocal)) {
                  if (unlink($rutaImagenLocal)) {
                    echo "Ha adquirido el local. Imagen eliminada correctamente.";
                  } else {
                    echo "Error al eliminar la imagen.";
                  }
                } else {
                  echo "No se ha podido completar la compra, la imagen del local no existe.";
                }
              } else {
                echo "No se encontró una imagen para este local.";
              }
            } else {
              echo "Error al realizar la compra: " . mysqli_error($database);
            }
          }

        }

        mysqli_close($database);
      }
    } else {
      echo "Error al intentar adquirir la propiedad.";
    }
    ?>

    <div class='row'>
      <a href='index-buyer.php'>Volver</a>
    </div>

  </div>
</body>

</html>