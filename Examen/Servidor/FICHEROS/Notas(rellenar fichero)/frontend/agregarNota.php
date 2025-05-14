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
      <h1>Registrar Alumno y Nota</h1>
      <hr>
      <form class="row g-3" action="agregarNota2.php" method="POST">
        <div class="col-md-6">
          <label for="inputNombreAlumno" class="form-label">Nombre del alumno *</label>
          <input type="text" class="form-control" id="inputNombreAlumno" name="nombre" required>
        </div>
        <div class="col-md-6">
          <label for="inputNota" class="form-label">Nota*</label>
          <input type="number" class="form-control" id="inputNota" name="nota" required>
        </div>
        <div class="col-12">
          <button type="submit" class="btn btn-primary">Agregar Alumno</button>
        </div>
      </form>
    </div>


  </main>

</body>

</html>