<?php session_start(); ?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GIT · Inicio</title>
  <link rel="shortcut icon" href="../assets/public/favicon.png" type="png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/styles.css">
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
          <img src="../assets/public/icon.png" alt="GeekInTown" width="60" height="40" class="mb-1">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="eventos/tablaEventos.php">Eventos</a>
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
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Acceder al foro</a>
                  <a class="dropdown-item" href="#">Mis datos</a>
                  <a class="dropdown-item" href="logout/logout.php">Cerrar sesión</a>
                </div>
              </li>
            </ul>
          <?php else: ?>
            <!-- Menú para visitantes no logueados -->
            <button class="btn btn-primary mx-2" onclick="location.href='login/login.php'">Iniciar Sesión</button>

          <?php endif; ?>

        </div>

      </div>
    </nav>

  </header>

  <main class="flex-grow-1">
    <div class="container mt-5 mb-5">
      <div class="d-flex align-items-center">
        <img src="../assets/icons/programmer.png" width="80" class="me-2">
        <h1 class="mt-2 mb-0 mx-3">Geek In Town, tu plataforma geek.</h1>
      </div>


      <hr>
      <div class="row mt-5">
        <div class="col-4 d-flex flex-column">
          <img src="../assets/images/geek_portada.jpg" width="420rem" class="mt-5 mb-5" />

        </div>

        <div class="col-7 d-flex flex-column mt-5 mb-5 mx-5">
          <h2>¿Qué hacemos en Geek In Town?</h2>
          <h5 class="mt-3">Una comunidad para aprender y colaborar</h5>
          <p class="mt-2">En Geek In Town, organizamos <b>eventos tecnológicos</b> en diferentes ciudades de España,
            creando espacios
            donde aprender, compartir y conectar. Nuestra comunidad geek genera <b>tutoriales de desarrollo web</b>
            para
            que puedas formarte a tu ritmo y desde casa. <br><br>Además, te ofrecemos la oportunidad de participar en
            <b>proyectos colaborativos</b> que enriquecerán tu experiencia y te permitirán construir un portfolio
            profesional real. ¿Tienes ideas propias? También puedes <b>organizar y publicar tus propios eventos</b> en
            nuestro tablón, y así compartir tus conocimientos con otros apasionados de la tecnología.<br><br>
            Y, si deseas formarte de forma profesional, te ofrecemos nuestro <b>curso de Desarrollador Full-Stack</b>,
            el
            más completo y actualizado en España, mediante el cual accederás a nuestra bolsa de trabajo.
          </p>

        </div>
      </div>
    </div>

    <div class="container-fluid dark-container mt-5 mb-5">
      <h1 class="text-center">Nuestra Comunidad Geek</h1>
      <h6 class="text-center mt-4">Únete y participa en la comunidad de tecnología más grande de toda España</h6>
      <hr>
      <div class="row mt-5 mb-5 g-4">
        <div class="col-12 col-sm-6 col-lg-3 d-flex">
          <div class="card flex-fill d-flex flex-column">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">Eventos Nacionales</h5>
              <p class="card-text">Organizamos eventos tecnológicos en toda España.</p>
              <button class="btn btn-primary mt-auto">Ver Eventos</button>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-3 d-flex">
          <div class="card flex-fill d-flex flex-column">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">Tutoriales Web</h5>
              <p class="card-text">Aprende desarrollo web con los tutoriales realizados por nuestra comunidad geek.</p>
              <button class="btn btn-primary mt-auto">Acceso a Tutoriales</button>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-3 d-flex">
          <div class="card flex-fill d-flex flex-column">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">Proyectos Colaborativos</h5>
              <p class="card-text">Participa en proyectos comunitarios que te ayudarán a crear tu portfolio profesional.
              </p>
              <button class="btn btn-primary mt-auto">Buscar proyecto</button>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-3 d-flex">
          <div class="card flex-fill d-flex flex-column">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">Organiza tus Eventos</h5>
              <p class="card-text">Organiza y publica tus propios eventos en nuestro tablón.</p>
              <button class="btn btn-primary mt-auto">Crear Evento</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container mt-5 mb-5">
      <div class="row mt-5">
        <div class="col-4 d-flex flex-column">
          <img src="../assets/images/IMAGEN1.jpg" width="420rem" class="mt-5 mb-5" />
        </div>

        <div class="col-7 d-flex flex-column mt-5 mb-5 mx-5">
          <h2>Pero... ¿Qué es un geek?</h2>
          <h5 class="mt-3">Convierte tu pasión en tu trabajo</h5>
          <p class="mt-2">
            El término <i>geek</i> se utiliza para describir a personas apasionadas por la <b>tecnología y la
              informática</b>.
            Geek In Town cuenta con una comunidad de colaboradores sin ánimo de lucro, unidos por una pasión compartida.
          </p>

          <div class="mt-3">
            <button class="btn btn-primary w-auto" onclick="">Unirme a la Comunidad</button>
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid banner-inicio">
      <div class="col-6 banner-inicio-texto">
        <h1>Conviértete en Desarrollador Full-Stack</h1>
        <h4>El programa formativo Nº1 en España</h4>
        <hr>
        <h6>En Geek In Town te ofrecemos nuestro programa formativo para que te conviertas en el Desarrollador
          Full-Stack
          que siempre has querido ser.</h6>
        <h6>Contamos con docentes altamente capacitados y con un largo recorrido en el mundo de la informática.</h6>
        <button class="btn btn-primary mt-2" onclick="">Solicitar Información</button>
      </div>
    </div>
    <div class="container mt-5 mb-5">
      <div class="d-flex align-items-center">
        <img src="../assets/icons/idea.png" width="60" class="me-2">
        <h1 class="mt-2 mb-0 mx-3">Curso Desarrollador Full-Stack</h1>
      </div>
      <hr>
      <h2 class="mt-5">¿Por qué escogernos?</h2>

      <div class="row text-center">
        <div class="col d-flex flex-column align-items-center justify-content-start mt-5 h-100">
          <img src="../assets/icons/computer.png" width="100px" />
          <h4 class="mt-3">Contenido Actualizado</h4>
          <p class="mt-auto">Revisamos nuestro temario anualmente, para asegurarnos de que te ofrecemos una formación
            actualizada.</p>
        </div>

        <div class="col d-flex flex-column align-items-center justify-content-start mt-5 h-100">
          <img src="../assets/icons/teacher.png" width="100px" />
          <h4 class="mt-3">Profesores Competentes</h4>
          <p class="mt-auto">Todo nuestro profesorado tiene un mínimo de 10 años de experiencia en el sector y ha
            trabajado para empresas importantes.</p>
        </div>

        <div class="col d-flex flex-column align-items-center justify-content-start mt-5 h-100">
          <img src="../assets/icons/timetable.png" width="100px" />
          <h4 class="mt-3">Flexibilidad Horaria</h4>
          <p class="mt-auto">Estudia y aprende a tu propio ritmo, con posibilidad de presentarte a la convocatoria de
            examen cuando te sientas preparado.</p>
        </div>

        <div class="col d-flex flex-column align-items-center justify-content-start mt-5 h-100">
          <img src="../assets/icons/suitcase.png" width="100px" />
          <h4 class="mt-3">Bolsa de Empleo</h4>
          <p class="mt-auto">Contamos con un gran catálogo de empresas colaboradoras en las que no solo podrás realizar
            tus prácticas, sino acceder a la bolsa de empleo.</p>
        </div>
      </div>


      <h2 class="mt-5">Preguntas Frecuentes</h2>
      <div class="accordion mt-5" id="accordionExample">
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
              aria-expanded="true" aria-controls="collapseOne">
              ¿Qué aprenderé en el curso de Desarrollador Full-Stack de Geek In Town?
            </button>
          </h2>
          <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <strong>Aprenderás a trabajar y realizar proyectos como se hace en el mundo laboral real.</strong> Así
              de fácil, y así de sencillo. Queremos enseñarte herramientas y tecnologías que <i>realmente</i>
              necesitan y buscan las empresas. Entre estas tecnologías, lenguajes y frameworks se incluyen HTML, CSS,
              Java, Javascript, Python, React, Angular, Vue, Express, Node.js, PHP, y diferentes BBDDs.
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
              data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              ¿Qué duración tiene el curso?
            </button>
          </h2>
          <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <strong>El acceso al contenido del curso es vitalicio.</strong> ¿Qué significa esto? Podrás acceder a
              los contenidos y materiales del curso de por vida, por lo que puedes aprender a tu ritmo. La obtención
              del certificado final se obtendrá mediante la realización de un examen presencial en nuestra sede en
              Madrid, para el cuál se convocan convocatorias anuales. El curso incluye la presentación a dos
              convocatorias, sin embargo, es posible presentarse a convocatorias extra, pagando la tasa de examen.
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
              data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              ¿Cómo se desarrollan las clases?
            </button>
          </h2>
          <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <strong>Las clases se desarrollan en modalidad online, a través de Microsoft Teams.</strong> Todas las
              clases quedan grabadas en caso de que no puedas asistir, o para su posterior consulta.
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
              data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
              ¿Ofrecéis facilidades de pago?
            </button>
          </h2>
          <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <strong>Sí.</strong> Ofrecemos la opción de pagar a plazos tu curso. Ponte en contacto con nosotros y
              nuestros asesores te informarán de todo el proceso.
            </div>
          </div>
        </div>

        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
              data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
              ¿Qué beneficio obtengo al realizar este curso con Geek In Town?
            </button>
          </h2>
          <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <strong>Geek In Town ofrece a todos sus alumnos el acceso a una gran bolsa de empleo con empresas
                colaboradoras.</strong> Además, también ofrecemos la opción de formación dual, mediante la cual
              podrás realizar el curso y hacer tus prácticas al mismo tiempo en una de nuestras empresas
              colaboradoras. El 92% de los alumnos de Geek In Town encuentran trabajo en menos de 6 meses
              posteriores a la obtención del título.
            </div>
          </div>
        </div>


      </div>




    </div>
  </main>








  <footer>
    <div class="container fluid">
      <div class="row">
        <div class="col"><img src="../assets/public/icon.png" width="30%"></img>
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
          <div class="row mt-3 enlace"><img src="../assets/icons/instagram.png" class="icon-footer"" />Instagram</div>
            <div class=" row mt-2 enlace"><img src="../assets/icons/facebook.png" class="icon-footer"" />Facebook</div>
            <div class=" row mt-2 enlace"><img src="../assets/icons/Twitter.png" class="icon-footer"" />Twitter</div>
            <div class=" row mt-2 enlace"><img src="../assets/icons/Youtube.png" class="icon-footer"" />Youtube</div>
         
          
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