<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar Sesión</title>
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
              <a class="nav-link" aria-current="page" href="register.php">Registro</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Iniciar Sesión</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <main class="flex-grow-1">
    <div class="container mt-5 mb-5">
     

    <?php 
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $user = $_POST["user"];
  $clave = $_POST["clave"];

  $usuario = $user;
  $claveCorrecta = false;
  $usuarioEncontrado = false;

  $archivo = "../data/userList.txt";

  $userList = fopen($archivo, "r");

  if($userList) {
    while(!feof($userList)) {
      $linea = trim(fgets($userList));
      if($linea !== "") {
        list($usuarioRegistrado, $claveUsuarioRegistrado) = explode(":", $linea);
        if ($usuario === $usuarioRegistrado) {
          $usuarioEncontrado = true;
          if($claveUsuarioRegistrado === $clave) {
            $claveCorrecta = true;
          }
          break;
        }
      }
    }
    fclose($userList);
  }

  if($usuarioEncontrado && $claveCorrecta) {
        echo '
    <div class="container mt-5 mb-5">
  <h1>Has iniciado sesión</h1>
  <hr>
   <p class="mt-5">Bienvenid@, ' . $user .'.</p>
   <button class="btn btn-primary mt-4" onclick="location.href=\'login.php\'">Volver</button>
  </div>
  ';
} elseif ($usuarioEncontrado && !$claveCorrecta) {
     echo '
    <div class="container mt-5 mb-5">
  <h1>No has iniciado sesión</h1>
  <hr>
   <p class="mt-5">La contraseña no es correcta.</p>
   <button class="btn btn-primary mt-4" onclick="location.href=\'login.php\'">Volver</button>
  </div>
  ';
  } else {
        echo '
    <div class="container mt-5 mb-5">
  <h1>No has iniciado sesión</h1>
  <hr>
   <p class="mt-5">El usuario no existe.</p>
   <button class="btn btn-primary mt-4" onclick="location.href=\'register.php\'">Registro</button>
  </div>
  ';
  }
}

?>
  



  </div>
  </main>
</body>
</html>