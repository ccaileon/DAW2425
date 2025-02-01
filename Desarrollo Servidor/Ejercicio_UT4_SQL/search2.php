<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resultado Búsqueda</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="styles.css" rel="stylesheet">
</head>

<body>
  <div class="container">
    <?php

    if ($_SERVER['REQUEST_METHOD'] === "POST") {

      $buscarMarca = $_POST["buscar-marca"];
      $buscarModelo = $_POST["buscar-modelo"];

      $database = mysqli_connect("127.0.0.1", "root", "", "concesionario") or die("No se ha podido conectar a la base de datos: " . mysqli_connect_error());

      if ($database) {
        $consulta = mysqli_query($database, "SELECT * FROM coches WHERE marca = '$buscarMarca' OR modelo = '$buscarModelo'") or die("Fallo en la consulta");

        if ($consulta) {
          $nfilas = mysqli_num_rows($consulta);


          if ($nfilas > 0) {
            echo "<table class='table table-striped'>";
            echo "<thead class='table-dark'>
            <tr>
              <th>Id</th>
              <th>Marca</th>
              <th>Modelo</th>
              <th>Año</th>
            </tr>
          </thead>";
            echo "<tbody>";
            for ($i = 0; $i < $nfilas; $i++) {
              $fila = mysqli_fetch_assoc($consulta);
              echo "<tr>";
              echo "<td>" . $fila["id"] . "</td>";
              echo "<td>" . $fila["marca"] . "</td>";
              echo "<td>" . $fila["modelo"] . "</td>";
              echo "<td>" . $fila["año"] . "</td>";
              echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";

          } else {
            echo "<p>No se han encontrado resultados.</p>";
          }

        }
        mysqli_close($database);
      }
    }
    ?>
    <div class="row">
      <a href='add1.php'>Volver</a>
    </div>
  </div>
</body>

</html>