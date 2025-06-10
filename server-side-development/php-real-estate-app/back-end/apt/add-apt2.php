<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Añadir Propiedad</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="../../css/styles.css" rel="stylesheet">
</head>

<body>
  <header>
    <nav class="navbar navbar-light navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="#">Inmobiliaria Costa del Sol</a>



        <div class="collapse navbar-collapse" id="navbarNav">

          <form class="d-flex me-auto" action="search-apt2.php" method="POST">
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


          <ul class="navbar-nav">

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownUsuarios" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                Usuarios
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownUsuarios">
                <li><a class="dropdown-item" href="../user/add-user.php">Registrar Usuario</a></li>
                <li><a class="dropdown-item" href="../user/delete-user.php">Eliminar Usuario</a></li>
                <li><a class="dropdown-item" href="../user/search-user.php">Buscar Usuario</a></li>
                <li><a class="dropdown-item" href="../user/edit-user.php">Modificar Usuario</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="../user/list-user.php">Listar Usuarios</a></li>
              </ul>
            </li>


            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPropiedades" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                Propiedades
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownPropiedades">
                <li><a class="dropdown-item" href="add-apt.php">Registrar Propiedad</a></li>
                <li><a class="dropdown-item" href="delete-apt.php">Eliminar Propiedad</a></li>
                <li><a class="dropdown-item" href="edit-apt.php">Modificar Propiedad</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="list-apt.php">Listar Propiedades</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../front-end/logout.php">Cerrar Sesión</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <div class="container">
    <?php
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
      $idUsuario = $_POST["usuario-id"];
      $imagen = $_FILES["imagen-add"];



      $rutaImagen = "";

      if (isset($imagen) && $imagen["error"] == 0) {
        $nombreFichero = $imagen["name"];
        $rutaImagen = "uploads/" . basename($nombreFichero);

        if (move_uploaded_file($imagen["tmp_name"], "../../front-end/seller/" . $rutaImagen)) {
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
          }
        } else {
          echo "Error al insertar la propiedad: " . mysqli_error($database);
        }
      }
      mysqli_close($database);
    }


    ?>
    <div class='row'>
      <a href='../index-adm.php'>Volver a Inicio</a>
    </div>
  </div>
</body>

</html>