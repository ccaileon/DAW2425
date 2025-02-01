<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Buscar Coche</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="styles.css" rel="stylesheet">
</head>

<body>
  <div class="container">
    <h1>Buscar Coche</h1>

    <form action="search2.php" method="POST">

      <input type="text" name="buscar-marca" placeholder="Buscar por marca">
      <input type="text" name="buscar-modelo" placeholder="Buscar por modelo">
      <input type="submit" value="Buscar">

    </form>
    <div class="row">
      <a href='add1.php'>Volver</a>
    </div>
  </div>
</body>

</html>