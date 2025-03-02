<?php
require '../database/config.php';
$mensaje = '';

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
  if (
    isset($_POST['id'], $_POST['nombre'], $_POST['apellido'], $_POST['email'], $_POST['salario']) &&
    !empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['email']) && !empty($_POST['salario'])
  ) {

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $salario = $_POST['salario'];

    try {
      $sqlCheck = "SELECT * FROM empleados WHERE Id = :id";
      $consultaCheck = $conexion->prepare($sqlCheck);
      $consultaCheck->bindParam(':id', $id, PDO::PARAM_INT);
      $consultaCheck->execute();

      if ($consultaCheck->rowCount() > 0) {
       
        $sql = "UPDATE empleados SET Nombre = :nombre, Apellido = :apellido, Email = :email, Salario = :salario WHERE Id = :id";
        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(':nombre', $nombre);
        $consulta->bindParam(':apellido', $apellido);
        $consulta->bindParam(':email', $email);
        $consulta->bindParam(':salario', $salario);
        $consulta->bindParam(':id', $id, PDO::PARAM_INT);

        $consulta->execute();

        if ($consulta->rowCount() > 0) {
          $mensaje = 'Empleado modificado con éxito';
        } else {
          $mensaje = 'No se encontraron cambios o el empleado ya tiene esos valores';
        }
      } else {
        $mensaje = 'Empleado no encontrado con ese ID';
      }

    } catch (PDOException $e) {
      $mensaje = 'Error al modificar el empleado: ' . $e->getMessage();
    }
  } else {
    $mensaje = 'Por favor complete todos los campos del formulario.';
  }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modificar</title>
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
        <a class="nav-link" href="search-employee.php">Buscar</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="list-employees.php">Listar</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="update-employee.php">Modificar</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="delete-employee.php">Eliminar</a>
      </li>
    </ul>
  </header>


  <div class="container">
    <h1>Modificar Empleado</h1>
    <form class="form" action="" method="POST">
      <input type="number" class="form-control" name="id" placeholder="Id Empleado">
      <h3>Datos a modificar:</h3>
      <input type="text" class="form-control" name="nombre" placeholder="Nombre">
      <input type="apellidos" class="form-control" name="apellido" placeholder="Apellido">
      <input type="email" class="form-control" name="email" placeholder="Correo Electrónico">
      <input type="number" class="form-control" name="salario" placeholder="Salario">
      <input type="submit" class="btn btn-primary" value="Modificar">
    </form>
  </div>



  <?php
  if ($mensaje === "Empleado modificado con éxito") {
    echo '<script>
            Swal.fire({
                title: "' . $mensaje . '",
                icon: "success",
                showConfirmButton: false,
  timer: 1500
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