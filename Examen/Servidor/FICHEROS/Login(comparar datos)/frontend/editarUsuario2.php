<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $usuarioBuscado = $_POST["user"];
  $nuevoDato = $_POST["nuevoDato"];
  $archivo = "../data/userList.txt";

// Abrir archivo para lectura
$userList = fopen("$archivo", 'r');
$lineas = [];

if ($userList) {
  while (!feof($userList)) {
    $linea = trim(fgets($userList));
    if ($linea !== "") {
      list($usuarioRegistrado, $claveUsuarioRegistrado) = explode(":", $linea);

      if ($usuarioBuscado === $usuarioRegistrado) {
        // Reemplazar el nombre de usuario
        $usuarioRegistrado = $nuevoDato;
      }

      // Volver a juntar la línea modificada o no
      $lineas[] = $usuarioRegistrado . ":" . $claveUsuarioRegistrado;
    }
  }
  fclose($userList);

  // Escribir de nuevo el archivo con las líneas modificadas
  file_put_contents("$archivo", implode("\n", $lineas) . "\n");

    echo '
    <div class="container mt-5 mb-5">
  <h1>Modificación Completada</h1>
  <hr>
   <p class="mt-5">Los datos han sido modificados correctamente.</p>
   <button class="btn btn-primary mt-4" onclick="location.href=\'editarUsuario.php\'">Volver</button>
  </div>
  ';
}
}
?>