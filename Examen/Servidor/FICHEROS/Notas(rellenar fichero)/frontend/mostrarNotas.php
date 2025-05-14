<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mostrar Notas</title>
  <link rel="shortcut icon" href="../../assets/public/favicon.png" type="png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  <link rel="stylesheet" href="../../css/styles.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
    crossorigin="anonymous"></script>
</head>

<body>
  <header>
    <!-- Menu  -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary menu">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="agregarNota.php">Agregar Alumno</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="mostrarNotas.php">Mostrar Notas</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <main class="flex-grow-1">

    <div class="container mt-5 mb-5">
      <h1>Mostrar Listado de Alumnos</h1>
      <hr>
      <?php

      $ficheroNotas = fopen("../data/ficheroNotas.txt", "r");
      if ($ficheroNotas) {
  
    while (!feof($ficheroNotas)) {
      $linea = trim(fgets($ficheroNotas));
      if ($linea!== "") {
        list($alumno, $nota) = explode(":", $linea);
        
        echo "$alumno: $nota <br>";
      }
    }
    fclose($ficheroNotas);
      }

      echo '
    <div class="container mt-5 mb-5">
   <button class="btn btn-primary mt-4" onclick="location.href=\'agregarNota.php\'">Volver</button>
  </div>
  ';

      ?>
    </div>


  </main>
</body>

</html>