<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agregar Nota</title>
  <link rel="shortcut icon" href="../../assets/public/favicon.png" type="png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  <link rel="stylesheet" href="../../css/styles.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
    crossorigin="anonymous"></script>
</head>

<body>
  <main class="flex-grow-1">

    <div class="container mt-5 mb-5">
      <h1>Registrar Alumno y Nota</h1>
      <hr>
     <?php 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $nombre = $_POST["nombre"];
  $nota = $_POST["nota"];
}

     $ficheroNotas = fopen("../data/ficheroNotas.txt", "a");
     if ($ficheroNotas) {
      fwrite($ficheroNotas, $nombre . ":" . $nota . PHP_EOL);
      fclose($ficheroNotas);
     }

     echo '
    <div class="container mt-5 mb-5">
  <h1>Alumno registrado correctamente</h1>

   <button class="btn btn-primary mt-4" onclick="location.href=\'agregarNota.php\'">Volver</button>
  </div>
  ';

     ?>
    </div>


  </main>
</body>
</html>