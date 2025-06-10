<?php
$nombreUsuario = 'nombre-usuario'; # Nombre de la cookie (nombre-usuario es como la cookie será guardada en el navegador)

$cookieExiste = isset($_COOKIE[$nombreUsuario]); # Verificamos si la cookie ya existe (configurada: true, sino false)

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['introducir-usuario'])) { # Verificamos si se ha enviado el formulario que contiene el dato de la cookie
  $userInput = $_POST['introducir-usuario']; # Almacenamos el valor de la cookie en una variable
  setcookie($nombreUsuario, $userInput, time() + (3 * 30 * 24 * 60 * 60), "/"); # Establecemos la cookie y la duración de almacenamiento de la cookie (3 meses)

  # Borrar los contactos de agenda.txt al reiniciar la cookie (puesto que la agenda sería de otra persona)
  $ficheroAgenda = "agenda.txt";
  if (file_exists($ficheroAgenda)) {
    file_put_contents($ficheroAgenda, ""); # Vaciar el contenido del archivo
  }

  header('Location: ' . $_SERVER['PHP_SELF']); # Recargamos la página (hasta que la página no recarga, no se aplica la cookie). Evita que se reenvie el formulario y se escriba la cookie varias veces
  exit; # Detener la ejecución del código después de la recarga
}

# -- Comprobar el enlace (comprueba si el enlace contiene la palabra "mostrar" o "agregar", para mostrar en la web el contenido solicitado por el usuario) --
$mostrarContactos = isset($_GET['mostrar']);
$mostrarFormulario = isset($_GET['agregar']);

# -- Creación de contactos --
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn-add'])) {
  $nombreContacto = $_POST['nombre'] ?? ''; # Asignamos el valor del campo "nombre" del formulario a la variable. En caso de que no esté definido (puesto que algunos campos del formulario no son obligatorios) asignamos una cadena vacía 
  $apellidosContacto = $_POST['apellidos'] ?? '';
  $telefonoContacto = $_POST['telefono'] ?? '';
  $emailContacto = $_POST['email'] ?? '';
  $direccionContacto = $_POST['direccion'] ?? '';

  if (!empty($nombreContacto) && !empty($apellidosContacto) && !empty($telefonoContacto)) { # Si las variables obligatorias del formulario no están vacías
    $contacto = "$nombreContacto,$apellidosContacto,$telefonoContacto,$emailContacto,$direccionContacto" . PHP_EOL; # Creamos una cadena con los datos del contacto, separados por comas. PHP_EOL agrega una línea al final. 

    $ficheroAgenda = "agenda.txt"; # Definimos el nombre del fichero donde se almacenarán los contactos (en este caso, agenda.txt);
    if (file_put_contents($ficheroAgenda, $contacto, FILE_APPEND)) {
      echo "Contacto guardado exitosamente."; # Si el contacto se guarda con éxito, mostramos un mensaje en la web
    } else {
      echo "No se pudo guardar el contacto."; # Si el contacto no se ha podido guardar, muestra un mensaje de error
    }
  } else {
    echo "Faltan datos obligatorios."; # Si alguno de los campos requeridos está vacío, muestra un mensaje de error informativo
  }
}

# -- Búsqueda de contactos --
$resultadoBusqueda = []; # Array para almacenar el resultado de la búsqueda (en este caso, los usuarios que coincidan en nombre)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn-buscar'])) {
  $buscarContacto = trim($_POST['buscar-nombre']); # Almacena el nombre del contacto a buscar, eliminando espacios
  $ficheroAgenda = 'agenda.txt'; # Definimos de nuevo el fichero donde se almacenan y se buscará el contacto

  if (!empty($buscarContacto) && file_exists($ficheroAgenda)) { # Verificamos que se haya introducido un nombre y que el fichero exista antes de proceder la búsqueda
    $contactos = file($ficheroAgenda, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES); # Lee todos los contactos del fichero "agenda.txt", ignorando las líneas vacías
    foreach ($contactos as $contacto) { # Iteración por todos los contactos para encontrar coincidencias
      list($nombreContacto, $apellidosContacto, $telefonoContacto, $emailContacto, $direccionContacto) = explode(',', $contacto); # Se divide la información de cada contacto según el tipo de dato (cada dato separado por una coma)

      if (stripos($nombreContacto, $buscarContacto) !== false) { # Busca entre el nombre de todos los contactos, si alguno coincide con el input de búsqueda del usuario (stripos ignora mayúsculas y minúsculas)
        $resultadoBusqueda[] = "$nombreContacto $apellidosContacto - $telefonoContacto - $emailContacto - $direccionContacto"; # Los contactos que coincidan, se añaden al array $resultadoBusqueda con todos sus datos
      }
    } # Cierre del bucle foreach
  }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agenda Personal</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <main>
    <div class="cabecera">
      <?php if (!$cookieExiste): # Si la cookie no existe, mostraremos el formulario para que el usuario introduzca su nombre ?>
        <h1>Agenda Personal</h1>
        <h3>¿A quién pertenece esta agenda?</h3>
        <form method="POST">
          <input type="text" name="introducir-usuario" placeholder="Tu nombre" required>
          <input type="submit" value="Aceptar">
        </form>
      <?php else: # Si existe una cookie previamente almacenada, mostrará una cabecera personalizada con el nombre almacenado en la cookie ?>
        <h1>Agenda Personal de <?php echo htmlspecialchars($_COOKIE[$nombreUsuario]); ?></h1>
        <!-- Enlaces ("botones") para cambiar lo que muestra la página (modifica el enlace, ver línea 14 y 15) -->
        <a href="?mostrar=true">Mostrar Contactos</a>
        <a href="?agregar=true">Agregar Contacto</a>
      <?php endif; ?>
    </div>

    <?php if ($mostrarFormulario): # Si el enlace contiene la palabra "agregar", la variable $mostrarFormulario es true (ver líneas 21 y 88) ?>
      <div class="addContacto">
        <form method="POST"> <!-- Formulario para registrar un nuevo contacto -->
          <input type="text" name="nombre" placeholder="Nombre *" required>
          <input type="text" name="apellidos" placeholder="Apellidos *" required>
          <input type="number" name="telefono" placeholder="Teléfono *" required>
          <input type="email" name="email" placeholder="Correo Electrónico">
          <input type="text" name="direccion" placeholder="Dirección">
          <input type="submit" name="btn-add" value="Añadir">
        </form>
      </div>
    <?php endif; ?>

    <?php if ($mostrarContactos):  # Si el enlace contiene la palabra "mostrar", la variable $mostrarContactos es true (ver líneas 21 y 88) ?>
     
      <?php
      $ficheroAgenda = "agenda.txt";
      if (file_exists($ficheroAgenda)): # Si el fichero "agenda.txt" existe, entonces:
        $contactos = file($ficheroAgenda, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        if (!empty($contactos)): # Si la lista de contactos no está vacía, la web mostrará el siguiente contenido (tabla con la lista de contactos almacenados en el fichero "agenda.txt") ?>
          <h3>Contactos Guardados:</h3>
          <!-- Tabla para mostrar la agenda de contactos -->
          <table border="1" style="border-collapse: collapse; width: 100%">
            <!-- Cabecera de la tabla -->
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Dirección</th>
              </tr>
            </thead>
            <!-- Cuerpo de la tabla -->
            <tbody>
              <?php foreach ($contactos as $contacto): # Por cada contacto, extraeremos sus datos individualmente, demarcados por una coma que los separa
                        list($nombreContacto, $apellidosContacto, $telefonoContacto, $emailContacto, $direccionContacto) = explode(',', $contacto); ?>
                <?php # -- TEST echo "$nombreContacto $apellidosContacto - $telefonoContacto - $emailContacto - $direccionContacto"; ?>
                <tr> <!-- Añadir cada contacto a un row de la tabla -->
                  <td><?php echo htmlspecialchars($nombreContacto); ?></td>
                  <td><?php echo htmlspecialchars($apellidosContacto); ?></td>
                  <td><?php echo htmlspecialchars($telefonoContacto); ?></td>
                  <td><?php echo htmlspecialchars($emailContacto); ?></td>
                  <td><?php echo htmlspecialchars($direccionContacto); ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          
          <!-- Cierre de tabla -->
            <!-- Formulario para buscar un contacto, introduciendo su nombre -->
      <h3>Buscar Contacto:</h3>
      <form method="POST">
        <input type="text" name="buscar-nombre" placeholder="Nombre del contacto" required>
        <input type="submit" name="btn-buscar" value="Buscar">
      </form>
        <?php else: # Si la lista está vacía, mostrará un mensaje indicándolo ?>
          <p>No hay contactos guardados.</p>
        <?php endif; ?>
      <?php else: # Si no encuentra el fichero, devuelve un mensaje indicándolo ?>
        <p>No se encontró el archivo de contactos.</p>
      <?php endif; ?>

    

      <?php if (!empty($resultadoBusqueda)):  # Si el resultado de la búsqueda (línea 40) no está vacío, procede a mostrar las coincidencias en una lista ?>
        <h4>Resultados de la búsqueda:</h4>
        <ul>
          <?php foreach ($resultadoBusqueda as $resultado): # Por cada resultado previamente almacenado, imprime sus datos ?>
            <li><?php echo $resultado; ?></li>
          <?php endforeach; ?>
        </ul>
      <?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn-buscar'])):  # Mensaje cuando no se encuentran coincidencias ?>
        <p>No se encontraron contactos con ese nombre.</p>
      <?php endif; ?>
    <?php endif; ?>
  </main>
</body>

</html>