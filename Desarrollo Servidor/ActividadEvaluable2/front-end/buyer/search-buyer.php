<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resultado Búsqueda</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="../css/styles.css" rel="stylesheet">
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

    if ($_SERVER['REQUEST_METHOD'] === "POST") {

      $tipoPropiedad = $_POST["tipo-propiedad"];
      $ciudad = $_POST["ciudad"];


      $database = mysqli_connect("127.0.0.1", "root", "", "inmobiliaria") or die("No se ha podido conectar a la base de datos: " . mysqli_connect_error());

      if ($database) {

        if ($tipoPropiedad == "piso") {
          $consulta = mysqli_query($database, "SELECT * FROM pisos WHERE ciudad = '$ciudad'") or die("Fallo en la consulta");

          if ($consulta) {
            $nfilas = mysqli_num_rows($consulta);


            if ($nfilas > 0) {
              for ($i = 0; $i < $nfilas; $i++) {
                $fila = mysqli_fetch_assoc($consulta);
                echo '<div class="card" style="width: 18rem;">';
                echo ' <img class="card-img-top" src="../seller/' . $fila['imagen_url'] . '" alt="La imagen no se ha podido cargar">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">Piso de ' . $fila['metros'] . ' m2 en ' . $fila['ciudad'] . '</h5>';
                echo "<h6 class='card-text'>Ref.: {$fila['Codigo_piso']}.</h6>";
                echo "<p class='card-text'>Piso de {$fila['metros']} metros cuadrados en la ciudad de {$fila['ciudad']}. <br>
      Dirección: {$fila['calle']}, {$fila['numero']}. {$fila['cp']}, {$fila['ciudad']}<br>
      Precio: {$fila['precio']} €.</p>";
                echo '<a href="buy.php?id=' . $fila['Codigo_piso'] . '" class="btn btn-primary">Comprar Propiedad</a>';

                echo '</div>';
              }

            } else {
              echo "<p>No se han encontrado resultados.</p>";
            }
          }
        } elseif ($tipoPropiedad == 'local') {
          $consulta = mysqli_query($database, "SELECT * FROM locales WHERE ciudad = '$ciudad' AND usuario_id = '$idUsuario'") or die("Fallo en la consulta");

          if ($consulta) {
            $nfilas = mysqli_num_rows($consulta);


            if ($nfilas > 0) {
              for ($i = 0; $i < $nfilas; $i++) {
                $fila = mysqli_fetch_assoc($consulta);
                echo '<div class="card" style="width: 18rem;">';
                echo ' <img class="card-img-top" src="../seller/' . $fila['imagen_url'] . '" alt="La imagen no se ha podido cargar">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">Piso de ' . $fila['metros'] . ' m2 en ' . $fila['ciudad'] . '</h5>';
                echo "<h6 class='card-text'>Ref.: {$fila['Codigo_piso']}.</h6>";
                echo "<p class='card-text'>Piso de {$fila['metros']} metros cuadrados en la ciudad de {$fila['ciudad']}. <br>
      Dirección: {$fila['calle']}, {$fila['numero']}. {$fila['cp']}, {$fila['ciudad']}<br>
      Precio: {$fila['precio']} €.</p>";
                echo '<a href="buy.php?id=' . $fila['Codigo_piso'] . '" class="btn btn-primary">Comprar Propiedad</a>';
                echo '</div>';

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

  </div>

  <div class="row">
    <a href='index-buyer.php'>Volver</a>
  </div>
</body>

</html>