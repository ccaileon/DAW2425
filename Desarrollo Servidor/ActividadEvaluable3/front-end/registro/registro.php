<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GIT · Registro</title>
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
              <a class="nav-link" aria-current="page" href="../index.php">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../eventos/tablaEventos.php">Eventos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Noticias</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Sobre Nosotros</a>
            </li>

          </ul>

          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="CSS Flexbox vs Grid" aria-label="Search">
            <button class="btn btn-primary" type="submit">Buscar</button>
          </form>


          <?php if (isset($_SESSION['usuario'])): ?>
            <!-- Menú para usuarios logueados -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  Bienvenid@, <?= htmlspecialchars($_SESSION['usuario']) ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Acceder al foro</a>
                  <a class="dropdown-item" href="#">Mis datos</a>
                  <a class="dropdown-item" href="../logout/logout.php">Cerrar sesión</a>
                </div>
              </li>
            </ul>
          <?php else: ?>
            <!-- Menú para visitantes no logueados -->
            <button class="btn btn-primary mx-2" onclick="location.href='../login/login.php'">Iniciar Sesión</button>

          <?php endif; ?>

        </div>

      </div>
    </nav>

  </header>

  <main class="flex-grow-1">
    <div class="container mt-5 mb-5">
      <h1>Formulario de Registro</h1>
      <hr>
      <form class="row g-3" action="registro2.php" method="POST">
        <div class="col-md-6">
          <label for="inputNombreUsuario" class="form-label">Nombre de Usuario *</label>
          <input type="text" class="form-control" id="inputNombreUsuario" name="nombre" required>
        </div>
        <div class="col-md-6">
          <label for="inputPassword" class="form-label">Contraseña *</label>
          <input type="password" class="form-control" id="inputPassword" name="clave" required>
        </div>
        <div class="col-12">
          <label for="inputEmail" class="form-label">Email *</label>
          <input type="email" class="form-control" id="inputEmail" placeholder="example@gmail.com" name="email"
            required>
        </div>
        <div class="col-md-6">
          <label for="inputCiudad" class="form-label">Ciudad</label>
          <input type="text" class="form-control" id="inputCiudad" name="ciudad">
        </div>
        <div class="col-md-4">
          <label for="inputProvincia" class="form-label">Provincia</label>
          <select id="inputProvincia" class="form-select" name="provincia">
            <option selected disabled>- Selecciona -</option>
            <option>Álava</option>
            <option>Albacete</option>
            <option>Alicante</option>
            <option>Almería</option>
            <option>Asturias</option>
            <option>Ávila</option>
            <option>Badajoz</option>
            <option>Barcelona</option>
            <option>Burgos</option>
            <option>Cáceres</option>
            <option>Cádiz</option>
            <option>Castellón</option>
            <option>Ceuta</option>
            <option>Ciudad Real</option>
            <option>Córdoba</option>
            <option>Cuenca</option>
            <option>Girona</option>
            <option>Granada</option>
            <option>Guadalajara</option>
            <option>Guipúzcoa</option>
            <option>Huelva</option>
            <option>Huesca</option>
            <option>Illes Balears</option>
            <option>Jaén</option>
            <option>La Coruña</option>
            <option>La Rioja</option>
            <option>Las Palmas</option>
            <option>León</option>
            <option>Lérida</option>
            <option>Lugo</option>
            <option>Madrid</option>
            <option>Málaga</option>
            <option>Melilla</option>
            <option>Murcia</option>
            <option>Navarra</option>
            <option>Ourense</option>
            <option>Palencia</option>
            <option>Pontevedra</option>
            <option>Salamanca</option>
            <option>Santa Cruz de Tenerife</option>
            <option>Segovia</option>
            <option>Sevilla</option>
            <option>Soria</option>
            <option>Tarragona</option>
            <option>Teruel</option>
            <option>Toledo</option>
            <option>Valencia</option>
            <option>Valladolid</option>
            <option>Vizcaya</option>
            <option>Zamora</option>
            <option>Zaragoza</option>
          </select>
        </div>
        <div class="col-md-2">
          <label for="inputZip" class="form-label">C.P.</label>
          <input type="text" class="form-control" id="inputZip" name="cp">
        </div>
<div class="col-12">
  <div class="form-check">
    <input class="form-check-input" type="checkbox" id="newsletterCheck">
    <label class="form-check-label" for="newsletterCheck">
      Quiero suscribirme a la newsletter de Geek In Town.
    </label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="checkbox" id="eventosCheck">
    <label class="form-check-label" for="eventosCheck">
      Quiero recibir notificaciones de eventos en mi ciudad.
    </label>
  </div>
</div>


        <div class="col-12">
          <button type="submit" class="btn btn-primary">Registrarme</button>
        </div>
      </form>
    </div>
  </main>
  <?php



  ?>
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