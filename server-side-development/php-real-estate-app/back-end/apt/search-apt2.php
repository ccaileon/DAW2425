<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Buscar Propiedad</title>
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


  <?php

  if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $tipoPropiedad = $_POST["tipo-propiedad"];
    $ciudad = $_POST["ciudad"];
    $idUsuario = $_SESSION['usuario_id'];

    $database = mysqli_connect("127.0.0.1", "root", "", "inmobiliaria") or die("No se ha podido conectar a la base de datos: " . mysqli_connect_error());

    if ($database) {

      $ciudades_formateadas = [
        "malaga" => "Málaga",
        "estepona" => "Estepona",
        "marbella" => "Marbella",
        "torremolinos" => "Torremolinos",
        "fuengirola" => "Fuengirola",
        "benalmadena" => "Benalmádena",
        "ronda" => "Ronda",
        "coín" => "Coín",
        "antequera" => "Antequera",
        "alhaurin_el_gra" => "Alhaurín el Grande"
      ];

      function formatearCiudad($ciudad, $ciudades_formateadas)
      {
        return $ciudades_formateadas[strtolower($ciudad)] ?? $ciudad;
      }

      if ($tipoPropiedad == "piso") {
        $consulta = mysqli_query($database, "SELECT * FROM pisos WHERE ciudad = '$ciudad'") or die("Fallo en la consulta");

        if ($consulta) {
          $nfilas = mysqli_num_rows($consulta);


          if ($nfilas > 0) {
            for ($i = 0; $i < $nfilas; $i++) {
              $fila = mysqli_fetch_assoc($consulta);
              echo '<div class="card" style="width: 18rem;">';
              echo ' <img class="card-img-top" src="../../front-end/seller/' . $fila['imagen_url'] . '" alt="Card image cap">';
              echo '<div class="card-body">';
              echo '<h5 class="card-title">Piso de ' . $fila['metros'] . ' m2 en ' . formatearCiudad($fila['ciudad'], $ciudades_formateadas) . '</h5>';
              echo "<h6 class='card-text'>Ref.: {$fila['Codigo_piso']}.</h6>";
              echo "<p class='card-text'>Piso de {$fila['metros']} metros cuadrados en la ciudad de " .
                formatearCiudad($fila['ciudad'], $ciudades_formateadas) . ". <br>
      Dirección: {$fila['calle']}, {$fila['numero']}. {$fila['cp']}, " .
                formatearCiudad($fila['ciudad'], $ciudades_formateadas) . "<br>
      Precio: {$fila['precio']} €.</p>";
              echo '</div></div>';


            }

          } else {
            echo "<p>No se han encontrado resultados.</p>";
          }
        }
      } elseif ($tipoPropiedad == 'local') {
        $consulta = mysqli_query($database, "SELECT * FROM locales WHERE ciudad = '$ciudad'") or die("Fallo en la consulta");

        if ($consulta) {
          $nfilas = mysqli_num_rows($consulta);

          if ($nfilas > 0) {
            for ($i = 0; $i < $nfilas; $i++) {
              $fila = mysqli_fetch_assoc($consulta);
              echo '<div class="card" style="width: 18rem;">';
              echo ' <img class="card-img-top" src="../../front-end/seller/' . $fila['imagen_url'] . '" alt="Card image cap">';
              echo '<div class="card-body">';
              echo '<h5 class="card-title">Local de ' . $fila['metros'] . ' m2 en ' . formatearCiudad($fila['ciudad'], $ciudades_formateadas) . '</h5>';
              echo "<h6 class='card-text'>Ref.: {$fila['Codigo_local']}.</h6>";
              echo "<p class='card-text'>Local de {$fila['metros']} metros cuadrados en la ciudad de " .
                formatearCiudad($fila['ciudad'], $ciudades_formateadas) . ". <br>
      Dirección: {$fila['calle']}, {$fila['numero']}. {$fila['cp']}, " .
                formatearCiudad($fila['ciudad'], $ciudades_formateadas) . "<br>
      Precio: {$fila['precio']} €.</p>";
              echo '</div></div>';


            }

          } else {
            echo "<p>No se han encontrado resultados.</p>";
          }
        }
      }
      mysqli_close($database);
    }
  }
  ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>