<?php
require '../database/config.php';
try {

  $sql = "SELECT * FROM empleados";
  $consulta = $conexion->prepare($sql);
  $consulta->execute();

  if ($consulta->rowCount() > 0) {

    $datos = "<table class='table table-bordered table-striped table-hover table-dark'>
        <thead>
          <tr>
          <th scope='col'>ID</th>
            <th scope='col'>Nombre</th>
            <th scope='col'>Apellido</th>
            <th scope='col'>Correo Electrónico</th>
            <th scope='col'>Salario</th>
          </tr>
        </thead>
        <tbody>";

    while ($empleado = $consulta->fetch()) {
      $datos .= "<tr>
                    <td>" . $empleado['Id'] . "</td>
                    <td>" . $empleado['Nombre'] . "</td>
                    <td>" . $empleado['Apellido'] . "</td>
                    <td>" . $empleado['Email'] . "</td>
                    <td>" . $empleado['Salario'] . "</td>
                   </tr>";
    }

    $datos .= "</tbody></table>";

  } else {
    $mensaje = "No se encontraron empleados";
  }
} catch (PDOException $e) {
  $mensaje = "Error al listar los empleados: " . $e->getMessage();
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listado</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/style.css">
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
        <a class="nav-link active" href="list-employees.php">Listar</a>
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
    <h1>Listado de Empleados</h1>
    <?php if (!empty($datos)) {
      echo $datos;
    } elseif (!empty($mensaje)) {
      echo "<div class='alert alert-warning'>$mensaje</div>";
    } ?>
  </div>
</body>

</html>