<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Coche Añadido</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="styles.css" rel="stylesheet">
</head>

<body>
  <div class="container">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $marca = $_POST["marca"];
      $modelo = $_POST["modelo"];
      $year = (int) $_POST["year"];



      $database = mysqli_connect("127.0.0.1", "root", "", "concesionario");

      if (!$database) {
        die("No se ha podido conectar con la base de datos: " . mysqli_connect_error());
      } else {

        $añadirCoche = mysqli_query($database, "INSERT INTO coches (marca, modelo, `año`) VALUES ('$marca', '$modelo', '$year')");

        echo "<p>Coche añadido a la base de datos correctamente.</p>";
      }

      mysqli_close($database);


    }
    ?>
    <div class="row"><a href='add1.php'>Volver</a></div>
  </div>
</body>

</html>