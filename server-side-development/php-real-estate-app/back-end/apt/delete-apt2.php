<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Eliminar Propiedad</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="../../css/styles.css" rel="stylesheet">
</head>

<body>
  <header>
    <nav class="navbar navbar-light navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="../index-adm.php">Inmobiliaria Costa del Sol</a>



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

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
      $idPropiedad = $_POST["id-delete"];
      $tipoPropiedad = $_POST["tipo-propiedad-delete"];

      $server = "127.0.0.1";
      $user = "root";
      $password = "";

      $database = mysqli_connect("$server", "$user", "$password", "inmobiliaria") or die("No se ha podido conectar a la base de datos: " . mysqli_connect_error());

      if ($database) {
        if ($tipoPropiedad == "piso") {
          $searchPiso = mysqli_query($database, "SELECT * FROM pisos WHERE Codigo_piso = '$idPropiedad'");

          if ($searchPiso) {

            $nfilas = mysqli_num_rows($searchPiso);

            if ($nfilas > 0) {

              $filaPiso = mysqli_fetch_assoc($searchPiso);
              $imagenPiso = $filaPiso['imagen_url'];


              if (file_exists("../../front-end/seller/" . $imagenPiso)) {
                unlink("../../front-end/seller/" . $imagenPiso);
              }

              $deletePiso = "DELETE FROM pisos WHERE Codigo_piso = '$idPropiedad'";
              if (mysqli_query($database, $deletePiso)) {
                echo "Se ha eliminado la propiedad correctamente.";
              } else {
                echo "Error al eliminar la propiedad: " . mysqli_error($database);
              }
            } else {
              echo "No se ha encontrado la propiedad con id $idPropiedad.";
            }
          }
        } else {
          $searchLocal = mysqli_query($database, "SELECT * FROM locales WHERE Codigo_local = '$idPropiedad'");

          if ($searchLocal) {

            $nfilas = mysqli_num_rows($searchLocal);

            if ($nfilas > 0) {

              $filaLocal = mysqli_fetch_assoc($searchLocal);
              $imagenLocal = $filaLocal['imagen_url'];


              if (file_exists("../../front-end/seller/" . $imagenLocal)) {
                unlink("../../front-end/seller/" . $imagenLocal);
              }

              $deleteLocal = "DELETE FROM locales WHERE Codigo_local = '$idPropiedad'";
              if (mysqli_query($database, $deleteLocal)) {
                echo "Se ha eliminado la propiedad correctamente.";
              } else {
                echo "Error al eliminar la propiedad: " . mysqli_error($database);
              }
            } else {
              echo "No se ha encontrado la propiedad con id $idPropiedad.";
            }
          }
        }

        echo "<div class='row'>
    <a href='../index-adm.php'>Volver</a>
  </div>";

        mysqli_close($database);
      } else {
        echo "Error al eliminar la propiedad.";
      }
    }

    ?>
  </div>
</body>

</html>