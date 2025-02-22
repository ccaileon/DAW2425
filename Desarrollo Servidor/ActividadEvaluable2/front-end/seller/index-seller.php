<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panel Vendedor</title>
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


  <?php
  $idUsuario = $_SESSION['usuario_id'];

  $database = mysqli_connect("127.0.0.1", "root", "", "inmobiliaria") or die("No se ha podido conectar a la base de datos: " . mysqli_connect_error());

  if ($database) {


    $consultaPiso = mysqli_query($database, "SELECT * FROM pisos WHERE usuario_id = '$idUsuario'") or die("Fallo en la consulta");

    if ($consultaPiso) {
      $nfilas = mysqli_num_rows($consultaPiso);

      if ($nfilas > 0) {

        echo "<h2>Tus pisos en venta</h2>";

        for ($i = 0; $i < $nfilas; $i++) {
          $fila = mysqli_fetch_assoc($consultaPiso);
          echo '<div class="card" style="width: 18rem;">';
          echo ' <img class="card-img-top" src="seller/' . $fila['imagen_url'] . '" alt="Card image cap">';
          echo '<div class="card-body">';
          echo '<h5 class="card-title">Piso de ' . $fila['metros'] . ' m2 en ' . $fila['ciudad'] . '</h5>';
          echo "<h6 class='card-text'>Ref.: {$fila['Codigo_piso']}.</h6>";
          echo "<p class='card-text'>Piso de {$fila['metros']} metros cuadrados en la ciudad de {$fila['ciudad']}. <br>
      Dirección: {$fila['calle']}, {$fila['numero']}. {$fila['cp']}, {$fila['ciudad']}<br>
      Precio: {$fila['precio']}€</p></div>";
          echo '<a href="delete-seller.php?id=' . $fila['Codigo_piso'] . '" class="btn btn-danger">Eliminar Propiedad</a>';

          echo '</div>';
        }

      }
    }


    $consultaLocal = mysqli_query($database, "SELECT * FROM locales WHERE usuario_id = '$idUsuario'") or die("Fallo en la consulta");

    if ($consultaLocal) {
      $nfilas = mysqli_num_rows($consultaLocal);


      if ($nfilas > 0) {

        echo "<h2>Tus locales en venta</h2>";

        for ($i = 0; $i < $nfilas; $i++) {
          $fila = mysqli_fetch_assoc($consultaLocal);
          echo '<div class="card" style="width: 18rem;">';
          echo ' <img class="card-img-top" src="seller/' . $fila['imagen_url'] . '" alt="Card image cap">';
          echo '<div class="card-body">';
          echo '<h5 class="card-title">Piso de ' . $fila['metros'] . ' m2 en ' . $fila['ciudad'] . '</h5>';
          echo "<h6 class='card-text'>Ref.: {$fila['Codigo_locales']}.</h6>";
          echo "<p class='card-text'>Piso de {$fila['metros']} metros cuadrados en la ciudad de {$fila['ciudad']}. <br>
      Dirección: {$fila['calle']}, {$fila['numero']}. {$fila['cp']}, {$fila['ciudad']}<br>
      Precio: {$fila['precio']}€. Ref: {$fila['Codigo_local']}.</p></div>";
          echo '<a href="delete-seller.php?id=' . $fila['Codigo_piso'] . '" class="btn btn-danger">Eliminar Propiedad</a>';


        }

      }
    }


    if (mysqli_num_rows($consultaLocal) == 0 && mysqli_num_rows($consultaPiso) == 0) {
      echo "No tienes ninguna propiedad en venta.";
    }
    mysqli_close($database);

  }




  ?>


</body>

</html>