<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vender Propiedad</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="../../css/styles.css" rel="stylesheet">
</head>

<body>
  <header>
    <nav class="navbar navbar-light navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="index-seller.php">Inmobiliaria Costa del Sol</a>

        <div class="collapse navbar-collapse" id="navbarNav">
          <form class="d-flex me-auto" action="search-seller.php" method="POST">
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

            <button class="btn btn-primary" type="submit">Buscar mis propiedades</button>
          </form>

          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="add.php">Vender Propiedad</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

</body>

</html>

<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (!isset($_SESSION["usuario_id"])) {
    die("Debes iniciar sesión para publicar un piso.");
  }

  $server = "127.0.0.1";
  $user = "root";
  $password = "";

  $database = mysqli_connect($server, $user, $password, "inmobiliaria") or die("No se ha podido conectar con la base de datos. Error de conexión: " . mysqli_connect_error());


  $calle = $_POST["calle-add"];
  $numero = $_POST["numero-add"];
  $cp = $_POST["cp-add"];
  $piso = $_POST["piso-add"];
  $puerta = $_POST["puerta-add"];
  $metros = $_POST["metros-add"];
  $ciudad = $_POST["ciudad-add"];
  $precio = $_POST["precio-add"];
  $tipoPropiedad = $_POST["tipo-propiedad-add"];
  $imagen = $_FILES["imagen-add"];
  $idUsuario = $_SESSION["usuario_id"];

  $rutaImagen = "";

  if (isset($imagen) && $imagen["error"] == 0) {
    $nombreFichero = $imagen["name"];
    $rutaImagen = "uploads/" . basename($nombreFichero);

    if (move_uploaded_file($imagen["tmp_name"], $rutaImagen)) {
      echo "Imagen subida con éxito. ";
    } else {
      echo "Error al subir la imagen. ";
    }

  }


  if ($database) {
    if ($tipoPropiedad === "piso") {
      $addPiso = mysqli_query($database, "INSERT INTO pisos (calle, numero, piso, puerta, cp, metros, ciudad, precio, imagen_url, usuario_id) VALUES ('$calle', '$numero', '$piso', '$puerta', '$cp', '$metros', '$ciudad', '$precio', '$rutaImagen', '$idUsuario')");

      if ($addPiso) {
        echo "Propiedad agregada correctamente.";
      } else {
        echo "Error al insertar la propiedad: " . mysqli_error($database);
      }
    } elseif ($tipoPropiedad === "local") {
      $addLocal = mysqli_query($database, "INSERT INTO locales (calle, numero, piso, puerta, cp, metros, ciudad, precio, imagen_url, usuario_id) VALUES ('$calle', '$numero', '$piso', '$puerta', '$cp', '$metros', '$ciudad', '$precio', '$rutaImagen', '$idUsuario')");

      if ($addLocal) {
        echo "Propiedad agregada correctamente.";
        $consulta = "SELECT tipo_usuario FROM usuarios WHERE id = '$usuario_id'";
        $resultado = mysqli_query($database, $consulta);
        if ($mysqli_num_rows($resultado) > 0) {
          $datosUsuario = mysqli_fetch_assoc($resultado);
          $tipoUsuario = $datosUsuario['tipo_usuario'];
          if ($tipoUsuario == "vendedor") {
            echo "<div class='row'>
    <a href='seller/index-seller.php'>Volver a Inicio</a>
  </div>";
          } elseif ($tipoUsuario == "comprador") {
            echo "<div class='row'>
    <a href='../buyer/index-buyer.php'>Volver a Inicio</a>
  </div>";
          }
        }
      } else {
        echo "Error al insertar la propiedad: " . mysqli_error($database);
      }
    }
  }

  mysqli_close($database);
}





?>