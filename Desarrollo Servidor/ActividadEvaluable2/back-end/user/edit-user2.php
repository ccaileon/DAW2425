<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modificar Usuario</title>
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <?php
  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $idUser = $_POST["id-edit-user"];
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $email = $_POST["email"];
    $clave = $_POST["pass"];
    $tipoUsuario = $_POST["tipo-usuario"];

    $server = "127.0.0.1";
    $user = "root";
    $password = "";

    $database = mysqli_connect("$server", "$user", "$password", "inmobiliaria") or die("No se ha podido conectar a la base de datos: " . mysqli_connect_error());

    if ($database) {

      $searchUser = mysqli_query($database, "SELECT * FROM usuario WHERE usuario_id = '$idUser'");

      if ($searchUser) {

        $nfilas = mysqli_num_rows($searchUser);

        if ($nfilas > 0) {
          $modifyUser = "UPDATE usuario SET nombre = '$nombre', apellidos = '$apellidos', correo = '$email', clave = '$clave', tipo_usuario = '$tipoUsuario' WHERE usuario_id = '$idUser'";

          if (mysqli_query($database, $modifyUser)) {
            echo "Se han modificado los datos correctamente.";
          } else {
            echo "Error al modificar los datos: " . mysqli_error($database);
          }
        } else {
          echo "No se ha encontrado al usuario con id $idUser.";
        }
      }

      echo "<div class='row'>
    <a href='../index-adm.php'>Volver</a>
  </div>";

      mysqli_close($database);
    } else {
      echo "Error al modificar el usuario.";
    }
  }
  ?>
</body>

</html>