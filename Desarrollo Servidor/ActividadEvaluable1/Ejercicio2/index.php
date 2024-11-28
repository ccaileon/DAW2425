<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio 2</title>
  <style>
    body {
      background-image: url('recursos/Fondo.avif');
      justify-content: center;
      align-items: center;
      margin-top: 5%;
      text-align: center;
      color: white;
      font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
      text-shadow: 2px 2px 4px black;
    }

    .jugador1 {
      text-align: center;
      justify-content: left;
      margin-right: 530px;

    }

    .jugador2 {
      text-align: center;
      position: relative;
      justify-content: right;
      margin-top: -395px;
      margin-left: 530px;


    }

    .tablaPuntuaciones {
      position: relative;
      justify-content: center;
      justify-items: center;
      margin-top: -410px;
      text-shadow: none;
    }

    table {
      border-collapse: collapse;
      background-color: #20441a;
      color: white;
      border: 5px;
    }

    th {
      background-color: #122610;
      padding: 5px;
      color: #ff3535;
    }

    td {
      padding: 5px;
    }



    img {
      width: 40px;
      height: 40px;
      border-radius: 15%;
    }

    .resultado {
      margin-top: 20px;
    }

    input[type="submit"] {
      background-color: #20441a;
      color: white;
      border: 3px solid white;
      border-radius: 20px;
      padding: 20px;
      font-size: large;
      cursor: pointer;
      font-weight: bold;

    }

    input[type="submit"]:hover {
      background-color: #122610;
      color: #ff3535;
    }
  </style>
  <!-- Fuentes externas consultadas -->
  <!-- https://developer.mozilla.org/en-US/docs/Web/HTML/Element/audio (añadir el audio de los dados cada vez que se tiran)-->


</head>

<body>
  <form method="POST">
    <input type="submit" name="jugar" value="Jugar Partida">
  </form>
  <?php

  $rutaAudio = "recursos/audio.mp3";
  echo "<audio autoplay src='$rutaAudio'></audio>";
  $jugador1 = [];
  $jugador2 = [];
  echo "<div class='jugador1'><h1>Jugador 1: </h1>";
  tiradaDados($jugador1);
  echo "</div>";
  echo "<div class='jugador2'><h1>Jugador 2:</h1>";
  tiradaDados($jugador2);
  echo "</div>";
  $puntuacionJugador1 = array_sum($jugador1);
  $puntuacionJugador2 = array_sum($jugador2);

  echo "<div class='resultado'><br>¡Fin de la partida!";

  if ($puntuacionJugador1 > $puntuacionJugador2) {
    echo "<p>El <b>jugador 1</b> ha ganado esta partida con un total de $puntuacionJugador1 puntos. Puntos del jugador 2: $puntuacionJugador2</p>";
  } elseif ($puntuacionJugador1 < $puntuacionJugador2) {
    echo "<p>El <b>jugador 2</b> ha ganado esta partida con un total de $puntuacionJugador2 puntos. Puntos del jugador 1: $puntuacionJugador1</p>";
  } else {
    echo "<p>¡La partida ha finalizado en <b>empate</b>! Ambos jugadores han obtenido $puntuacionJugador1 puntos.</p>";
  }
  echo "</div>";

  tablaPuntuaciones($jugador1, $jugador2);

  function tiradaDados(array &$jugador)
  {



    $dados = [
      $dado1 = "<img src='recursos/dados/1.jpg' width=100 height=100>\n",
      $dado2 = "<img src='recursos/dados/2.jpg' width=100 height=100>\n",
      $dado3 = "<img src='recursos/dados/3.jpg' width=100 height=100>\n",
      $dado4 = "<img src='recursos/dados/4.jpg' width=100 height=100>\n",
      $dado5 = "<img src='recursos/dados/5.jpg' width=100 height=100>\n",
      $dado6 = "<img src='recursos/dados/6.jpg' width=100 height=100>\n",
    ];


    for ($i = 0; $i < 5; $i++) {
      $puntuacion = 0;
      $numeroRonda = $i + 1;
      echo "Ronda $numeroRonda: <br>";
      for ($j = 0; $j < 6; $j++) { //Loop que se repite 6 veces para las 6 tiradas
        $tirada = rand(1, 6); //Genera número aleatorio entre el 1 y el 6 
        $puntuacion += $tirada; //Añade los puntos de la tirada al array del jugador
        echo $dados[$tirada - 1];

      }
      $jugador[$i] = $puntuacion; //Devuelve la puntuación del jugador
      echo "<br>";
    }

  }

  function tablaPuntuaciones(array $jugador1, array $jugador2)
  {
    echo "<div class = 'tablaPuntuaciones'><table border = 1><tr><th colspan = 2>Puntuaciones</th></tr><tr><td>Jugador 1</td><td>Jugador 2</td></tr>";
    for ($i = 0; $i < count($jugador1); $i++) {

      echo "<tr><td>$jugador1[$i]</td><td>$jugador2[$i]</td></tr>";

    }

    $rondasJugador1 = 0;
    $rondasJugador2 = 0;
    echo "<tr><th colspan = 2>Rondas Ganadas</th></tr><tr><td>Jugador 1</td><td>Jugador 2</td></tr>";
    for ($j = 0; $j < count($jugador1); $j++) {
      if ($jugador1[$j] > $jugador2[$j]) {
        $rondasJugador1 += 1;

      } elseif ($jugador1[$j] < $jugador2[$j]) {
        $rondasJugador2 += 1;
      }
    }
    echo "<tr><td>$rondasJugador1</td><td>$rondasJugador2</td></tr>";
    echo "</table></div>";

  }

  ?>

</body>

</html>