<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vender Propiedad</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="../../css/styles.css" rel="stylesheet">
</head>

<body>
  <header>
    <nav class="navbar navbar-light navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="index-seller.php">Inmobiliaria Costa del Sol</a>

        <div class="collapse navbar-collapse" id="navbarNav">
          <form class="d-flex me-auto" action="search-seller.php" method="POST">
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

            <button class="btn btn-primary" type="submit">Buscar mis propiedades</button>
          </form>

          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="add.php">Vender Propiedad</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
</header>

  <div class="container">
    <div>
      <h2>Vender Propiedad</h2>
      <form action="add2.php" method="POST" enctype="multipart/form-data">
          <select name="tipo-propiedad-add">
            <option value="default" selected disabled>- Tipo de propiedad -</option>
            <option value="piso">Piso</option>
            <option value="local">Local</option>
          </select>
        <input type="text" name="calle-add" placeholder="Calle" required><input type="number" name="numero-add"
          placeholder="Nº" required>
        <input type="number" name="cp-add" placeholder="C.P." required>
        <input type="number" name="piso-add" placeholder="Piso">
        <input type="number" name="puerta-add" placeholder="Puerta">
        <input type="number" name="metros-add" placeholder="m2">
       <select name="ciudad-add">
            <option value="default" selected disabled>- Ciudad -</option>
            <option value="malaga">Málaga</option>
            <option value="estepona">Estepona</option>
            <option value="marbella">Marbella</option>
            <option value="torremolinos">Torremolinos</option>
            <option value="fuengirola">Fuengirola</option>
            <option value="benalmadena">Benalmádena</option>
            <option value="ronda">Ronda</option>
            <option value="coín">Coín</option>
            <option value="antequera">Antequera</option>
            <option value="alhaurin_el_grande">Alhaurín el Grande</option>
          </select>
        <input type="number" name="precio-add" placeholder="Precio €">

        <label for="file">Subir imagen</label>
        <input type="file" name="imagen-add" accept="image/*">

        <input type="submit" value="Poner en Venta">
      </form>
    
    </div>
<div class='row'>
    <a href='index-seller.php'>Volver a Inicio</a>
  </div>
  </div>
</body>

</html>