<?php
require '../database/config.php';
$mensaje = '';
$datos = '';

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
  if (isset($_POST['id']) && !empty($_POST['id'])) {
    $id = $_POST['id'];
  }

  try {

    $sql = "SELECT * FROM empleados WHERE Id = :id";
    $consulta = $conexion->prepare($sql);
    $consulta->bindParam(':id', $id, PDO::PARAM_INT);
    $consulta->execute();

    if ($consulta->rowCount() > 0) {

      $empleado = $consulta->fetch();
      $nombre = $empleado['Nombre'];
      $apellido = $empleado['Apellido'];
      $email = $empleado['Email'];
      $salario = $empleado['Salario'];

      $mensaje = "Datos del Empleado";
      $datos = "Nombre: " . $nombre . "<br>" .
        "Apellido: " . $apellido . "<br>" .
        "Correo Electrónico: " . $email . "<br>" .
        "Salario: " . $salario;

    } else {
      $mensaje = "No se encontró un empleado con ese ID";
    }
  } catch (PDOException $e) {
    $mensaje = "Error al eliminar el empleado: " . $e->getMessage();
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Buscar</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/style.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
  <header>
    <ul class="nav justify-content-center">
      <li class="nav-item">
        <a class="nav-link" aria-current="page" href="index.php">Inicio</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="add-employee.php">Añadir</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="search-employee.php">Buscar</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="list-employees.php">Listar</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="update-employee.php">Modificar</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="delete-employee.php">Eliminar</a>
      </li>
    </ul>
  </header>

  <div class="container">
    <h1>Buscar Empleado</h1>
    <form class="form" action="" method="POST">
      <input type="number" class="form-control" name="id" placeholder="ID Empleado">
      <input type="submit" class="btn btn-primary" value="Buscar">
    </form>
  </div>

  <?php
  if ($mensaje === "Datos del Empleado") {
    echo '<script>
            Swal.fire({
                title: "' . $mensaje . '",
                html: "' . $datos . '" 
            });
          </script>';
  } elseif (!empty($mensaje)) {
    echo '<script>
            Swal.fire({
                title: "' . $mensaje . '",
                icon: "error",
            });
          </script>';
  }
  ?>
</body>

</html>