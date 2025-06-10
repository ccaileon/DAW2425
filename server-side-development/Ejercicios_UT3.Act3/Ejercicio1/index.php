<?php
// Color de fondo por defecto
$cookieColor = 'colorFondo';
$colorPredeterminado = '#ffffff';

// Comprobar si se ha enviado un color a través del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['escoge-color'])) {
  $colorFondo = $_POST['escoge-color'];
  setcookie($cookieColor, $colorFondo, time() + (3600));
} else {
  $colorFondo = isset($_COOKIE[$cookieColor]) ? ($_COOKIE[$cookieColor]) : $colorPredeterminado; // (condición ? valor_si_verdadero : valor_si_falso;) Si la cookie existe, usamos su valor, sino el color predeterminado
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Color de Fondo</title>
  <style>
    body {
      background-color:
        <?php echo $colorFondo; ?>
      ;
      font-family: Arial, sans-serif;
      text-align: center;
      padding: 20px;
    }

    .color-form {
      margin-top: 20px;
    }
  </style>
</head>

<body>
  <h1>Cambia el color de fondo</h1>
  <form method="POST" class="color-form">
    <label for="escoge-color">Selecciona un color:</label>
    <input type="color" id="escoge-color" name="escoge-color" value="<?php echo $colorFondo; ?>">
    <button type="submit">Cambiar</button>
  </form>
</body>

</html>