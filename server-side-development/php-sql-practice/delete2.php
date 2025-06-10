<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Borrar Coche</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="styles.css" rel="stylesheet">
</head>

<body>
  <div class="container">
    <?php
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
      $idBorrar = $_POST["id-borrar"];
      #echo "<p>$idBorrar</p>";
      $database = mysqli_connect("127.0.0.1", "root", "", "concesionario") or die("No se ha podido conectar a la base de datos");

      if ($database) {
        $consulta = mysqli_query($database, "DELETE FROM coches WHERE id = '$idBorrar'") or die("Fallo en la consulta");


        if (mysqli_affected_rows($database) > 0) {
          echo "<p>Se ha eliminado el coche con id $idBorrar correctamente.</p>";
        } else {
          echo "<p>No se han encontrado coches con el número de id $idBorrar.</p>";
        }
      }
      mysqli_close($database);

    }
    ?>
    <div class="row">
      <a href='add1.php'>Volver</a>
    </div>
  </div>
</body>

</html>