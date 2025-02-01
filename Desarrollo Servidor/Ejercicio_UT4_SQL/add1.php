<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Añadir Coche</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="styles.css" rel="stylesheet">
</head>

<body>
  <div class="container">
    <h1>Registro de Coches</h1>
    <form action="add2.php" method="POST">
      <input name="marca" type="text" placeholder="Marca" required>
      <input name="modelo" type="text" placeholder="Modelo" required>
      <input name="year" type="number" placeholder="Año" required>
      <input type="submit" value="Registrar">

    </form>
    <div class="row">
      <div class="col">
        <a href="list.php">Consultar listado</a>
      </div>
      <div class="col">
        <a href="search1.php">Buscar Coche</a>
      </div>
      <div class="col">
        <a href="delete1.php">Borrar Coche</a>
      </div>
    </div>
  </div>
  </div>
</body>

</html>