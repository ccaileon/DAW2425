<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro</title>
</head>

<body>
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

if($consultaEmail) {
      $nfilas = mysqli_num_rows($consultaEmail);
if ($nfilas > 0) {
  echo "<p>Ya existe una cuenta asociada a este correo electrónico</p>";
  echo "<div class='row'>
    <a href='login.php'>Iniciar Sesión</a>
  </div>";
  echo "<div class='row'>
    <a href='register.php'>Registrar otra cuenta</a>
  </div>";
} else {
      $añadirUsuario = mysqli_query($database, "INSERT INTO usuario (nombre, apellidos, correo, clave, tipo_usuario) VALUES ('$nombre', '$apellidos', '$email', '$clave', '$tipoUsuario')");
      echo "Registro completado. Ya puede iniciar sesión con su cuenta.";
    }
    
    mysqli_close($database);
  }
    }
  }
  ?>


</body>

</html>