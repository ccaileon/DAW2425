<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio 1</title>
  <style>
    html,
    body {
      height: 100%;
      /* Altura de la pantalla */
      margin: 0;
      /* Margen */
      display: flex;
      /* Permite mover los elementos libremente */
      flex-direction: column;
      /* Posicona los elementos uno sobre otro */
      background-color: black;
      /* Color de fondo */
      justify-content: center;
      /* Alinea los elementos horizontalmente al centro */
      align-items: center;
      /* Alinea los elementos verticalmente al centro */
      font-family: 'Courier New', Courier, monospace;
      /* Tipo de fuente */
      color: aliceblue;
      /* Color del texto */
      position: relative;
    }

    .texto,
    .asterisco {
      font-size: 30px;
      /* Tamaño de la fuente */
      display: block;
      /* Elemento bloque */
    }

    .texto:hover {
      color: blueviolet;
      /* Color del texto al pasar el ratón por encima */
    }

    .asterisco:hover {
      cursor: pointer;
      /* Efecto para el ratón cuando lo posicionamos encima de un asterisco */
    }

    .texto {
      margin-top: 50px;
      /* Margen superior */
      position: fixed;
      /* Mantener una posición fija*/
      margin-bottom: 580px;
      /* Margen inferor */
      padding-bottom: 10px;
      /* Relleno inferior */
    }

    .asterisco {
      display: block;
      /* Elemento bloque */
    }
  </style>
</head>

<body>
  <?php
  // Generamos un ancho y un alto aleatorio entre 5 y 15
  $ancho = rand(5, 15);
  $alto = rand(5, 15);


  echo "<div class='texto'>"; // Creamos un div para poder dar estilo y posicionar el texto
  echo "Alto: $alto <br>";
  echo "Ancho: $ancho <br>";

  echo "<br></div>"; // Cerramos div del texto
  // Bucle for que toma en cuenta el alto y el ancho aleatoriamente generado para imprimir los asteriscos
  for ($i = 0; $i < $alto; $i++) { // Por cada columna, imprime el número de filas almacenado en la variable "ancho"
    // Generamos colores aleatorios para dar estilo visual a los asteriscos:
    $rojo = rand(0, 255);
    $verde = rand(0, 255);
    $azul = rand(0, 255);
    $color = "rgb($rojo, $verde, $azul)"; // Almacenamos los colores generados en una variable
    echo "<div class='asterisco' style='color: $color;'>"; // Abrimos div para dar estilo y posicionar los asteriscos
    for ($j = 0; $j < $ancho; $j++) {
      echo "* "; // Imprimimos asterisco
    }
    echo "<br>"; // Salto de linea
  
  }
  echo "</div>"; // Cerramos el div
  






  ?>
</body>

</html>