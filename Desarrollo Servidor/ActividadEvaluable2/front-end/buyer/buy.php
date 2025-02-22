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
      </div>
    </nav>
</header>



  <div class="container">

    <?php
    session_start();

    if (isset($_GET['id']) && isset($_SESSION['usuario_id'])) {
      $idPropiedad = $_GET['id'];
      $idUsuario = $_SESSION['usuario_id'];

      $database = mysqli_connect("127.0.0.1", "root", "", "inmobiliaria") or die("No se ha podido conectar a la base de datos: " . mysqli_connect_error());

      if ($database) {

        $consultaPiso = "SELECT * FROM pisos WHERE Codigo_piso = '$idPropiedad'";
        $consultaLocal = "SELECT * FROM locales WHERE Codigo_local = '$idPropiedad'";


        $resultadoPiso = mysqli_query($database, $consultaPiso);
        $resultadoLocal = mysqli_query($database, $consultaLocal);

        if ($resultadoPiso && mysqli_num_rows($resultadoPiso) > 0) {
          $fila = mysqli_fetch_assoc($resultadoPiso);
          $precioCompra = $fila['precio'];

          $comprarPiso = "INSERT INTO sqlPisosComprados (usuario_comprador, Codigo_piso, Precio_final) VALUES ('$idUsuario','$idPropiedad', $precioCompra)";

          if ($comprarPiso) {
            $venderPiso = "DELETE FROM pisos WHERE Codigo_piso = $idPropiedad";
            $filaPiso = mysqli_fetch_assoc($resultadoPiso);
            $imagenPiso = $filaPiso['imagen_url'];
            if (file_exists("../seller/" . $imagenPiso)) {
              unlink("../seller/" . $imagenPiso);
              echo "Ha adquirido la propiedad.";
            } else {
              echo "No se ha podido completar la compra.";
            }
          } else {
            echo "Error al comprar el piso, no se ha podido ejecutar la acción.";
          }
        }

      } elseif ($resultadoLocal && mysqli_num_rows($resultadoLocal) > 0) {
        $fila = mysqli_fetch_assoc($resultadoLocal);
        $precioCompra = $fila['precio'];
        $comprarLocal = "INSERT INTO sqlLocalesComprados (usuario_comprador, Codigo_piso, Precio_final) VALUES ('$idUsuario','$idPropiedad', $precioCompra)";

        if ($comprarPiso) {
          $venderLocal = "DELETE FROM locales WHERE Codigo_local = $idPropiedad";
          $filaLocal = mysqli_fetch_assoc($resultadoLocal);
          $imagenLocal = $filaLocal['imagen_url'];
          if (file_exists("../seller/" . $imagenLocal)) {
            unlink("../seller/" . $imagenLocal);
            echo "Ha adquirido la propiedad.";
          } else {
            echo "No se ha podido completar la compra.";
          }
        } else {
          echo "Error al comprar el local, no se ha podido ejecutar la acción.";
        }
      }

      mysqli_close($database);
    } else {
      echo "Error al intentar adquirir la propiedad.";
    }
    ?>



    <div class='row'>
      <a href='index-seller.php'>Volver</a>
    </div>

  </div>