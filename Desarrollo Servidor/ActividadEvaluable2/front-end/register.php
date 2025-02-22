<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="../css/styles.css" rel="stylesheet">
</head>
<body>
        <header>
    <nav class="navbar navbar-light navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="index.php">Inmobiliaria Costa del Sol</a>

        <div class="collapse navbar-collapse" id="navbarNav">

          <form class="d-flex me-auto" action="search.php" method="POST">
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

          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="login.php">Iniciar Sesión</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="register.php">Registrarse</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
</header>

  <div class="container">
    <h1>Formulario de registro</h1>
    <form action="register2.php" method="POST">
      <label for="tipo-usuario">Usted es: </label>
      <input type="radio" id="comprador" value="comprador" name="tipo-usuario" required>
      <label for="comprador">Comprador</label>
           <input type="radio" id="vendedor" value="vendedor" name="tipo-usuario">
           <label for="vendedor">Vendedor</label>
      <input type="text" name="nombre" placeholder="Nombre" required>
       <input type="text" name="apellidos" placeholder="Apellidos" required>
        <input type="email" name="email" placeholder="Correo Electrónico" required>
        <input type="password" name="pass" placeholder="Clave de Acceso" required>
<input type="submit" value="Registrarme">
    </form>
  </div>
</body>
</html>