<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listado Propiedades</title>
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
    $server = "127.0.0.1";
    $user = "root";
    $password = "";

    $database = mysqli_connect("$server", "$user", "$password", "inmobiliaria") or die("No se ha podido conectar a la base de datos: " . mysqli_connect_error());

    if ($database) {

      $listPisos = mysqli_query($database, "SELECT * FROM pisos");

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

      if ($listPisos) {

        $nfilas = mysqli_num_rows($listPisos);
        echo "<h2>Listado Pisos</h2>";
        if ($nfilas > 0) {

          echo "<table class='table table-striped'>";
          echo "<thead class='table-dark'>
        <tr>
        <th>Ref.</th>
        <th>Id Propietario</th>
        <th>Calle</th>
        <th>Número</th>
        <th>Piso</th>
        <th>Puerta</th>
        <th>C.P.</th>
        <th>Metros</th>
        <th>Ciudad</th>
        <th>Precio €</th>
      
        </tr>
        </thead>";
          echo "<tbody>";
          for ($i = 0; $i < $nfilas; $i++) {
            $fila = mysqli_fetch_assoc($listPisos);
            echo "<tr>";
            echo "<td>" . $fila["Codigo_piso"] . "</td>";
            echo "<td>" . $fila["usuario_id"] . "</td>";
            echo "<td>" . $fila["calle"] . "</td>";
            echo "<td>" . $fila["numero"] . "</td>";
            echo "<td>" . $fila["piso"] . "</td>";
            echo "<td>" . $fila["puerta"] . "</td>";
            echo "<td>" . $fila["cp"] . "</td>";
            echo "<td>" . $fila["metros"] . "</td>";
            echo "<td>" . formatearCiudad($fila["ciudad"], $ciudades_formateadas) . "</td>";
            echo "<td>" . $fila["precio"] . "</td>";
            echo "</tr>";
          }
        } else {
          echo "No se han encontrado pisos en venta.";
        }
        echo "</tbody>";
        echo "</table>";

      }

      $listLocales = mysqli_query($database, "SELECT * FROM locales");

      if ($listLocales) {

        $nfilas = mysqli_num_rows($listLocales);
        echo "<h2>Listado Locales</h2>";
        if ($nfilas > 0) {

          echo "<table class='table table-striped'>";
          echo "<thead class='table-dark'>
        <tr>
        <th>Ref.</th>
        <th>Id Propietario</th>
        <th>Calle</th>
        <th>Número</th>
        <th>Piso</th>
        <th>Puerta</th>
        <th>C.P.</th>
        <th>Metros</th>
        <th>Ciudad</th>
        <th>Precio €</th>
      
        </tr>
        </thead>";
          echo "<tbody>";

          for ($i = 0; $i < $nfilas; $i++) {
            $fila = mysqli_fetch_assoc($listLocales);
            echo "<tr>";
            echo "<td>" . $fila["Codigo_local"] . "</td>";
            echo "<td>" . $fila["usuario_id"] . "</td>";
            echo "<td>" . $fila["calle"] . "</td>";
            echo "<td>" . $fila["numero"] . "</td>";
            echo "<td>" . $fila["piso"] . "</td>";
            echo "<td>" . $fila["puerta"] . "</td>";
            echo "<td>" . $fila["cp"] . "</td>";
            echo "<td>" . $fila["metros"] . "</td>";
            echo "<td>" . formatearCiudad($fila["ciudad"], $ciudades_formateadas) . "</td>";
            echo "<td>" . $fila["precio"] . "</td>";
            echo "</tr>";
          }
        } else {
          echo "No se han encontrado locales en venta.";
        }
        echo "</tbody>";
        echo "</table>";
        mysqli_close($database);

      }
    } else {
      echo "Error al listar las propiedades.";
    }

    echo "<div class='row'>
    <a href='../index-adm.php'>Volver</a>
  </div>";



    ?>
  </div>
</body>

</html>