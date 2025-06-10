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

      $consultaPiso = mysqli_query($database, "SELECT * FROM pisos") or die("Fallo en la consulta");

      if ($consultaPiso) {
        $nfilas = mysqli_num_rows($consultaPiso);

        if ($nfilas > 0) {

          echo "<h2>Pisos Disponibles</h2>";

          for ($i = 0; $i < $nfilas; $i++) {
            $fila = mysqli_fetch_assoc($consultaPiso);
            echo '<div class="card" style="width: 18rem;">';
            echo ' <img class="card-img-top" src="../seller/' . $fila['imagen_url'] . '" alt="La imagen no se ha podido cargar">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">Piso de ' . $fila['metros'] . ' m2 en ' . formatearCiudad($fila['ciudad'], $ciudades_formateadas) . '</h5>';
            echo "<h6 class='card-text'>Ref.: {$fila['Codigo_piso']}.</h6>";
            echo "<p class='card-text'>Piso de {$fila['metros']} metros cuadrados en la ciudad de " .
              formatearCiudad($fila['ciudad'], $ciudades_formateadas) . ". <br>
      Dirección: {$fila['calle']}, {$fila['numero']}. {$fila['cp']}, " .
              formatearCiudad($fila['ciudad'], $ciudades_formateadas) . "<br>
      Precio: {$fila['precio']}€</p>";
            echo '<a href="buy.php?id=' . $fila['Codigo_piso'] . '&tipo=piso" class="btn btn-primary">Comprar Propiedad</a>';
            echo '</div></div>';

          }

        }
      }


      $consultaLocal = mysqli_query($database, "SELECT * FROM locales") or die("Fallo en la consulta");

      if ($consultaLocal) {
        $nfilas = mysqli_num_rows($consultaLocal);


        if ($nfilas > 0) {

          echo "<h2>Locales Disponibles</h2>";

          for ($i = 0; $i < $nfilas; $i++) {
            $fila = mysqli_fetch_assoc($consultaLocal);
            echo '<div class="card" style="width: 18rem;">';
            echo ' <img class="card-img-top" src="../seller/' . $fila['imagen_url'] . '" alt="La imagen no se ha podido cargar">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">Local de ' . $fila['metros'] . ' m2 en ' . formatearCiudad($fila['ciudad'], $ciudades_formateadas) . '</h5>';
            echo "<h6 class='card-text'>Ref.: {$fila['Codigo_local']}.</h6>";
            echo "<p class='card-text'>Local de {$fila['metros']} metros cuadrados en la ciudad de " .
              formatearCiudad($fila['ciudad'], $ciudades_formateadas) . ". <br>
     Dirección: {$fila['calle']}, {$fila['numero']}. {$fila['cp']}, " .
              formatearCiudad($fila['ciudad'], $ciudades_formateadas) . "<br>
     Precio: {$fila['precio']}€</p>";
            echo '<a href="buy.php?id=' . $fila['Codigo_local'] . '&tipo=local" class="btn btn-primary">Comprar Propiedad</a>';
            echo '</div></div>';

          }

        }
      }


      if (mysqli_num_rows($consultaLocal) == 0 && mysqli_num_rows($consultaPiso) == 0) {
        echo "No se ha encontrado ninguna propiedad en venta.";
      }
      mysqli_close($database);

    }




    ?>

  </div>
</body>

</html>