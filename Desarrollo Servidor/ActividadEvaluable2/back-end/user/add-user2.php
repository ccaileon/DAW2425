<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Añadir Usuario</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="../../css/styles.css" rel="stylesheet">

</head>

<body>
  <header>
    <nav class="navbar navbar-light navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="#">Inmobiliaria Costa del Sol</a>

       

        <div class="collapse navbar-collapse" id="navbarNav">
   
          <form class="d-flex me-auto" action="../apt/search-apt2.php" method="POST">
            <select class="form-select me-2" name="tipo-propiedad" required>
              <option value="" selected disabled>- Tipo de propiedad -</option>
              <option value="piso">Piso</option>
              <option value="local">Local</option>
            </select>

            <select class="form-select me-2" name="ciudad" required>
              <option value="" selected disabled>- Ciudad -</option>
              <option value="Málaga">Málaga</option>
              <option value="Estepona">Estepona</option>
              <option value="Marbella">Marbella</option>
              <option value="Torremolinos">Torremolinos</option>
              <option value="Fuengirola">Fuengirola</option>
              <option value="Benalmádena">Benalmádena</option>
              <option value="Ronda">Ronda</option>
              <option value="Coín">Coín</option>
              <option value="Antequera">Antequera</option>
              <option value="Alhaurin el grande">Alhaurín el Grande</option>
            </select>

            <button class="btn btn-primary" type="submit">Buscar</button>
          </form>

       
          <ul class="navbar-nav">
          
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownUsuarios" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                Usuarios
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownUsuarios">
                <li><a class="dropdown-item" href="add-user.php">Registrar Usuario</a></li>
                <li><a class="dropdown-item" href="delete-user.php">Eliminar Usuario</a></li>
                <li><a class="dropdown-item" href="search-user.php">Buscar Usuario</a></li>
                <li><a class="dropdown-item" href="edit-user.php">Modificar Usuario</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="list-user.php">Listar Usuarios</a></li>
              </ul>
            </li>

          
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPropiedades" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                Propiedades
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownPropiedades">
                <li><a class="dropdown-item" href="../apt/add-apt.php">Registrar Propiedad</a></li>
                <li><a class="dropdown-item" href="../apt/delete-apt.php">Eliminar Propiedad</a></li>
                <li><a class="dropdown-item" href="../apt/edit-apt.php">Modificar Propiedad</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="../apt/list-apt.php">Listar Propiedades</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>


  <div class="container">
    <h1>Formulario de registro</h1>
    <form action="add-user2.php" method="POST">
      <label for="tipo-usuario">Tipo de usuario: </label>
      <input type="radio" id="comprador" value="comprador" name="tipo-usuario" required>
      <label for="comprador">Comprador</label>
      <input type="radio" id="vendedor" value="vendedor" name="tipo-usuario">
      <label for="vendedor">Vendedor</label>
      <input type="radio" id="admin" value="admin" name="tipo-usuario">
      <label for="vendedor">Administrador</label>
      <input type="text" name="nombre" placeholder="Nombre" required>
      <input type="text" name="apellidos" placeholder="Apellidos" required>
      <input type="email" name="email" placeholder="Correo Electrónico" required>
      <input type="password" name="pass" placeholder="Clave de Acceso" required>
      <input type="submit" value="Registrar Usuario">
    </form>
  </div>


  <?php

  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $email = $_POST["email"];
    $clave = $_POST["pass"];
    $tipoUsuario = $_POST["tipo-usuario"];

    $server = "127.0.0.1";
    $user = "root";
    $password = "";

    $database = mysqli_connect($server, $user, $password, "inmobiliaria") or die("No se ha podido conectar con la base de datos");

    if ($database) {

      $consultaEmail = mysqli_query($database, "SELECT * FROM usuario WHERE correo = '$email'") or die("Fallo en la consulta");

      if ($consultaEmail) {
        $nfilas = mysqli_num_rows($consultaEmail);
        if ($nfilas > 0) {
          echo "<p>Ya existe una cuenta asociada a este correo electrónico</p>";

          echo "<div class='row'>
    <a href='register.php'>Registrar otra cuenta</a>
  </div>";
        } else {
          $añadirUsuario = mysqli_query($database, "INSERT INTO usuario (nombre, apellidos, correo, clave, tipo_usuario) VALUES ('$nombre', '$apellidos', '$email', '$clave', '$tipoUsuario')");
          echo "Se ha registrado al usuario. Ya puede iniciar sesión.";
        }

        mysqli_close($database);
      }
    }
  }
  ?>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>