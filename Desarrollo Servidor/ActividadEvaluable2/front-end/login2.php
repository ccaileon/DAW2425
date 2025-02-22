<?php
session_start();

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar Sesión</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="../css/styles.css" rel="stylesheet">
</head>

<body>
  <?php
 

  if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $loginEmail = $_POST["login-email"];
    $loginPass = $_POST["login-pass"];

    $server = "127.0.0.1";
    $user = "root";
    $password = "";

    $database = mysqli_connect($server, $user, $password, "inmobiliaria") or die("Nos e ha podido conectar con la base de datos");

    if ($database) {

      $consultaEmail = mysqli_query($database, "SELECT * FROM usuario WHERE correo = '$loginEmail'") or die("Fallo en la consulta");

      if ($consultaEmail) {
        $nfilas = mysqli_num_rows($consultaEmail);
        $fila = mysqli_fetch_assoc($consultaEmail);
        if ($nfilas > 0) {

          # $fila = mysqli_fetch_assoc($consultaEmail);
          if ($fila["clave"] != $loginPass) {
            echo "<p>La contraseña introducida no es correcta.</p>";
          }
        } else {
          echo "No existe una cuenta registrada a ese correo electrónico";
          echo "<div class='row'>
    <a href='register.php'>Registro</a>
  </div>";
        }


        if (isset($fila["tipo_usuario"])) {

          $_SESSION["usuario_id"] = $fila["usuario_id"];
          $_SESSION["nombre"] = $fila["nombre"];
          $_SESSION["tipo_usuario"] = $fila["tipo_usuario"];

          echo "Bienvenido, " . $_SESSION["nombre"];



          if ($fila["tipo_usuario"] === 'comprador') {
            echo "<div class='row'>
    <a href='buyer/index-buyer.php'>Volver a Inicio</a>
  </div>";
          } elseif ($fila["tipo_usuario"] === 'vendedor') {
            echo "<div class='row'>
    <a href='seller/index-seller.php'>Volver a Inicio</a>
  </div>";
          } elseif ($fila["tipo_usuario"] === 'admin') {
            echo "<div class='row'>
    <a href='../back-end/index-adm.php'>Acceder al panel de control</a>
  </div>";
          }
        }
      }

      $_SESSION["usuario_id"] = $fila["usuario_id"];
      $_SESSION["nombre"] = $fila["nombre"];


    }

    mysqli_close($database);
  }


  ?>

</body>

</html>