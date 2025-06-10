<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/style.css">

</head>

<body>
  <header>
  <ul class="nav justify-content-center">
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
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
      <a class="nav-link" href="update-employee.php">Modificar</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="delete-employee.php">Eliminar</a>
    </li>
  </ul>
</header>

<div class="container index">
<h1>Panel de Control</h1>
<p>Bienvenido, Admin.</p>
<p>Hoy es <span id="fechaActual"></span></p>
<button class="btn btn-primary">Ver estadísticas</button>
<button class="btn btn-primary">Consultar emails</button>
</div>

<div class="container index">
  <h1>Tareas Pendientes</h1>
  <p>No tiene tareas pendientes.</p>
  <button class="btn btn-primary">Añadir Tarea</button>
</div>
<script>
    const fechaActual = new Date();
    // Array con los nombres de los días de la semana
    const diasSemana = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
    // Array con los nombres de los meses
    const meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
    const diaSemana = diasSemana[fechaActual.getDay()];
    const diaDelMes = fechaActual.getDate();
    const mes = meses[fechaActual.getMonth()];
    const anio = fechaActual.getFullYear();
    // Formatear fecha
    const fechaFormateada = `${diaSemana}, ${diaDelMes} de ${mes} del ${anio}`;
    document.getElementById("fechaActual").textContent = fechaFormateada;
  </script>
</body>

</html>