<?php session_start(); ?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GIT · Eventos</title>
  <link rel="shortcut icon" href="../assets/public/favicon.png" type="png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  <link rel="stylesheet" href="../../css/styles.css">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
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
          <img src="../../assets/public/icon.png" alt="GeekInTown" width="60" height="40" class="mb-1">
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
              <a class="nav-link active" href="#">Eventos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Noticias</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Sobre Nosotros</a>
            </li>

          </ul>

          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="¿Cómo centrar un div?" aria-label="Search">
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
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
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
      <div class="d-flex align-items-center">
        <img src="../../assets/icons/networking.png" width="80" class="me-2">
        <h1 class="mt-2 mb-0 mx-3">Eventos Tecnológicos en España</h1>
      </div>

      <hr>
      <div class="row mt-5">
        <div class="col-4 d-flex flex-column">
          <img src="../../assets/images/convention1.jpg" width="420rem" class="mt-5 mb-5" />

        </div>

        <div class="col-7 d-flex flex-column mt-5 mb-5 mx-5">
          <h2>Geek In Town en tu ciudad</h2>
          <h5 class="mt-3">Celebra tus aficiones con geeks como tú</h5>
          <p class="mt-2">En Geek In Town organizamos eventos en diferentes ciudades de España movidos por una pasión
            que compartimos con todos nuestros geeks: <b>la tecnología.</b>
            Además, nuestros geeks pueden organizar libremente eventos en sus ciudades y compartirlos en nuestro tablón
            de eventos.
          </p>
          <div class="mt-3">
            <a href="#tabla" class="btn btn-primary w-auto">Ir al Tablón de Eventos</a>
          </div>

        </div>
      </div>
    </div>

    <div class="container-fluid dark-container mt-5 mb-5">
      <h1 class="text-center">¿Qué encontrarás en nuestros eventos?</h1>
      <h6 class="text-center mt-4">Charlas, talleres y experiencias reales diseñadas para impulsar tu desarrollo
        profesional</h6>
      <hr>
      <div class="row mt-5 mb-5 g-4">
        <div class="col-12 col-sm-6 col-lg-3 d-flex">
          <div class="card flex-fill d-flex flex-column">
            <div class="card-body d-flex flex-column">
              <img src="../../assets/images/aprendizaje.jpg" />
              <h5 class="card-title mt-3">Charlas y Talleres</h5>
              <p class="card-text">Asiste a charlas y talleres con profesionales del sector que están marcando
                tendencia.</p>

            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-3 d-flex">
          <div class="card flex-fill d-flex flex-column">
            <div class="card-body d-flex flex-column">
              <img src="../../assets/images/networking.avif" />
              <h5 class="card-title mt-3">Networking Geek</h5>
              <p class="card-text">Conecta con otros apasionados de la tecnología, comparte ideas y crea oportunidades.
              </p>

            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-3 d-flex">
          <div class="card flex-fill d-flex flex-column">
            <div class="card-body d-flex flex-column">
              <img src="../../assets/images/tecnologia.jpg" />
              <h5 class="card-title mt-3">Tecnología que Inspira</h5>
              <p class="card-text">Vive demostraciones en vivo, lanzamientos y experiencias con lo último en innovación.
              </p>

            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-3 d-flex">
          <div class="card flex-fill d-flex flex-column">
            <div class="card-body d-flex flex-column">
              <img src="../../assets/images/aprende.jpg" />
              <h5 class="card-title mt-3">Aprende Haciendo</h5>
              <p class="card-text">Participa en workshops, retos y proyectos colaborativos diseñados para potenciar tus
                habilidades.</p>

            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container mt-5 mb-5">
      <div class="d-flex align-items-center">
        <img src="../../assets/icons/calendario.png" width="50" class="me-2">
        <h1 class="mt-2 mb-0 mx-3">Tablón de Eventos</h1>
      </div>
      <hr>
      <?php
      include_once("../../data/database/conexion.php");

      $sql = "SELECT * FROM eventos";
      $resultado = mysqli_query($database, $sql);
      ?>
      <div class="container mt-5">
        <h2 class="mb-4">Listado de Eventos</h2>
        <?php if (isset($_SESSION['usuario'])): ?>
          <div class="text-end mb-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#crearEventoModal">
              <i class="bi bi-plus-circle"></i> Crear Evento
            </button>
          </div>

          <!-- Modal crear evento -->
          <div class="modal fade" id="crearEventoModal" tabindex="-1" aria-labelledby="crearEventoModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <form action="crearEvento.php" method="POST">
                  <div class="modal-header">
                    <h5 class="modal-title" id="crearEventoModalLabel">Crear Nuevo Evento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                  </div>
                  <div class="modal-body">
                    <div class="mb-3">
                      <label for="nombre" class="form-label">Nombre del Evento</label>
                      <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="mb-3">
                      <label for="fecha" class="form-label">Fecha</label>
                      <input type="date" class="form-control" id="fecha" name="fecha" required>
                    </div>
                    <div class="mb-3">
                      <label for="ubicacion" class="form-label">Ubicación</label>
                      <input type="text" class="form-control" id="ubicacion" name="ubicacion" required>
                    </div>
                    <div class="mb-3">
                      <label for="capacidad" class="form-label">Capacidad</label>
                      <input type="number" class="form-control" id="capacidad" name="capacidad" required>
                    </div>
                    <div class="mb-3">
                      <label for="descripcion" class="form-label">Descripción del Evento</label>
                      <textarea class="form-control" id="descripcion" name="descripcion" rows="4" maxlength="300"
                        placeholder="Escribe la descripción del evento..."></textarea>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar Evento</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <!-- Modal editar evento -->
          <div class="modal fade" id="editarEventoModal" tabindex="-1" aria-labelledby="editarEventoModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <form action="editarEvento.php" method="POST">
                  <input type="hidden" name="id" id="edit-id">
                  <div class="modal-header">
                    <h5 class="modal-title" id="editarEventoModalLabel">Editar Evento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                  </div>
                  <div class="modal-body">
                    <div class="mb-3">
                      <label for="edit-nombre" class="form-label">Nombre del Evento</label>
                      <input type="text" class="form-control" id="edit-nombre" name="nombre" required>
                    </div>
                    <div class="mb-3">
                      <label for="edit-fecha" class="form-label">Fecha</label>
                      <input type="date" class="form-control" id="edit-fecha" name="fecha" required>
                    </div>
                    <div class="mb-3">
                      <label for="edit-ubicacion" class="form-label">Ubicación</label>
                      <input type="text" class="form-control" id="edit-ubicacion" name="ubicacion" required>
                    </div>
                    <div class="mb-3">
                      <label for="edit-capacidad" class="form-label">Capacidad</label>
                      <input type="number" class="form-control" id="edit-capacidad" name="capacidad" required>
                    </div>
                    <div class="mb-3">
                      <label for="edit-descripcion" class="form-label">Descripción del Evento</label>
                      <textarea class="form-control" id="edit-descripcion" name="descripcion" rows="4"
                        maxlength="300"></textarea>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

        <?php endif; ?>
        <div class="table-responsive">
          <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark text-center" id="tabla">
              <tr>
                <th>Nombre</th>
                <th style="white-space: nowrap; min-width: 120px;">Fecha</th>
                <th>Capacidad</th>
                <th>Ubicación</th>
                <th>Descripción</th>
                <?php if (isset($_SESSION['usuario'])): ?>
                  <th>Acciones</th>
                <?php endif; ?>
              </tr>
            </thead>
            <tbody>
              <?php while ($fila = mysqli_fetch_assoc($resultado)): ?>
                <tr>
                  <td><?= htmlspecialchars($fila['nombre']) ?></td>
                  <td><?= htmlspecialchars($fila['fecha']) ?></td>
                  <td><?= htmlspecialchars($fila['capacidad']) ?></td>
                  <td><?= htmlspecialchars($fila['lugar']) ?></td>
                  <td><?= htmlspecialchars($fila['descripcion']) ?></td>
                  <?php if (isset($_SESSION['usuario'])): ?>
                    <td class="text-center">
                      <!-- Botón para editar el evento, devuelve todos los datos del evento mediante su id, para que el modal esté prerellenado -->
                      <a href="#" class="btn btn-primary-editar mt-3 mb-3" data-bs-toggle="modal"
                        data-bs-target="#editarEventoModal" data-id="<?= $fila['id'] ?>"
                        data-nombre="<?= htmlspecialchars($fila['nombre']) ?>" data-fecha="<?= $fila['fecha'] ?>"
                        data-lugar="<?= htmlspecialchars($fila['lugar']) ?>"
                        data-descripcion="<?= htmlspecialchars($fila['descripcion']) ?>"
                        data-capacidad="<?= $fila['capacidad'] ?>">
                        Editar
                      </a>
                      <a href="eliminarEvento.php?id=<?= $fila['id'] ?>" class="btn btn-primary-eliminar mt-1 mb-3"
                        onclick="return confirm('¿Estás seguro de que quieres eliminar este evento?')">Eliminar</a>
                    </td>
                  <?php endif; ?>
                </tr>
              <?php endwhile; ?>
            </tbody>
          </table>
          
        </div>
      </div>


    </div>

    <div class="container-fluid banner-eventos">
      <div class="col-6 banner-eventos-texto">
        <h1>Acercamos la Tecnología</h1>
        <h4>Charlas y Talleres Gratuitos en Colegios e Institutos</h4>
        <hr>
        <h6>Llevamos la tecnología a las aulas con actividades pensadas para inspirar a las nuevas generaciones.
          Ofrecemos sesiones totalmente gratuitas donde exploramos programación, robótica, inteligencia artificial y
          mucho más, de forma práctica, divertida y adaptada a cada edad.
        </h6><br>
        <h6>Nuestro objetivo: encender esa chispa en futuros inventores, programadoras, diseñadores de videojuegos... en
          definitiva, los pequeños geeks del mañana.</h6><br>
        <h6>
          ¿Tu centro educativo quiere formar parte? ¡Escríbenos y organizamos una visita!</h6>
        <button class="btn btn-primary mt-2" onclick="">Solicitar Información</button>
      </div>
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


  <script>
    const editarEventoModal = document.getElementById('editarEventoModal');

    editarEventoModal.addEventListener('show.bs.modal', function (event) {
      const button = event.relatedTarget;
      // Prerellenar el modal con los datos del evento
      document.getElementById('edit-id').value = button.getAttribute('data-id');
      document.getElementById('edit-nombre').value = button.getAttribute('data-nombre');
      document.getElementById('edit-fecha').value = button.getAttribute('data-fecha');
      document.getElementById('edit-ubicacion').value = button.getAttribute('data-lugar');
      document.getElementById('edit-capacidad').value = button.getAttribute('data-capacidad');
      document.getElementById('edit-descripcion').value = button.getAttribute('data-descripcion');
    });
  </script>
</body>

</html>