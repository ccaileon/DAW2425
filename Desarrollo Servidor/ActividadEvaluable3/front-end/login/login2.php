<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GIT · Iniciar Sesión</title>
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
        <a class="navbar-brand" href="#">
          <img src="../../assets/public/icon.png" alt="GeekInTown" width="60" height="40">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Eventos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Noticias</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Sobre Nosotros</a>
            </li>

          </ul>

          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Python para novatos" aria-label="Search">
            <button class="btn btn-primary" type="submit">Buscar</button>
          </form>

          <?php if (isset($_SESSION['usuario'])): ?>
            <!-- Menú para usuarios logueados -->
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  Bienvenid@, <?= htmlspecialchars($_SESSION['usuario']) ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Acceder al foro</a>
                  <a class="dropdown-item" href="#">Mis datos</a>
                  <a class="dropdown-item" href="logout/logout.php">Cerrar sesión</a>
                </div>
              </li>
            </ul>
          <?php else: ?>
            <!-- Menú para visitantes no logueados -->
            <button class="btn btn-primary mx-2" onclick="">Iniciar Sesión</button>

          <?php endif; ?>

        </div>

      </div>
    </nav>

  </header>

  <?php

  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = $_POST["nombre"];
    $clave = $_POST["clave"];

    $correcto = false;
    $usuariosRegistrados = fopen("../../data/users/users.txt", "r");

    if ($usuariosRegistrados) {
      while (!feof($usuariosRegistrados)) {
        $linea = trim(fgets($usuariosRegistrados));
        if ($linea !== "") {
          list($usuario, $claveUsuario) = explode(":", $linea);
          if ($usuario === $nombre & $clave === $claveUsuario) {
            $correcto = true;
            break;
          }
        }
      }
      fclose($usuariosRegistrados);
    }

    if ($correcto) {
      session_start();
      $_SESSION['usuario'] = $nombre;
      header('Location: ../index.php');
      exit;
    } else {
      echo '
   <main class="flex-grow-1">
    <div class="container">
    <div class="container mt-5 mb-5">
  <h1>No has iniciado sesión</h1>
  <hr>
   <p class="mt-5">Alguno o ambos datos introducidos son erróneos. Vuelve a intentarlo.</p>
   <button class="btn btn-primary mt-4" onclick="location.href=\'login.php\'">Iniciar Sesión</button>
  </div>
  ';
    }

  }

  ?>
  </div>
  </main>

  <footer>

    <div class="container fluid">
      <div class="row">
        <div class="col"><img src="../../assets/public/icon.png" width="30%"></img>
          <h5 class="mt-3">Geek In Town, tu comunidad geek en España.</h5>
        </div>
        <div class="col">
          <h6>SITIO WEB</h6>
          <ul>
            <li class="li-cursor">Inicio</li>
            <li class="li-cursor">Eventos</li>
            <li class="li-cursor">Noticias</li>
            <li class="li-cursor">Sobre Nosotros</li>
          </ul>
        </div>
        <div class="col">
          <h6>SÍGUENOS</h6>
          <div class="row mt-3 enlace"><img src="../../assets/icons/instagram.png" class="icon-footer"" />Instagram</div>
            <div class=" row mt-2 enlace"><img src="../../assets/icons/facebook.png" class="icon-footer"" />Facebook</div>
            <div class=" row mt-2 enlace"><img src="../../assets/icons/Twitter.png" class="icon-footer"" />Twitter</div>
            <div class=" row mt-2 enlace"><img src="../../assets/icons/Youtube.png" class="icon-footer"" />Youtube</div>
         
          
        </div>
        <div class=" col">
            <h6>NEWSLETTER</h6>
            <p>Suscríbete a nuestra newsletter para estar al tanto de todas las noticias.
            <form><input type="email" class="form-control" placeholder="email@gmail.com">
              <input type="submit" class="btn btn-primary mt-2" value="Me suscribo">
            </form>
            </p>
          </div>
        </div>
      </div>

  </footer>
</body>

</html>