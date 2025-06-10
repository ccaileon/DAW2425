// -- Botón para comenzar la partida --
let btnComenzar = document.querySelector("#btn-comenzar");
btnComenzar.addEventListener("click", comenzarPartida);

function comenzarPartida() {
  let audio = document.getElementById("audio"); // -- Audio para las cartas --
  // -- Comienzo de la partida --
  btnComenzar.style.display = "none"; // Oculta el botón de comenzar partida cuando la partida ya ha empezado
  titulo.style.display = "none"; // Oculta el título de bienvenida
  // -- Puntuaciones se inician a cero --

  // -- Nombre de jugador, si el jugador no escoge ningún nombre, usa el nombre por defecto --
  let tituloJugador = document.getElementById("tituloJugador");
  let nombreJugador = prompt("Introduce tu nombre:"); // Pedimos el nombre al jugador
  if (nombreJugador !== null && nombreJugador !== "") {
    tituloJugador.innerText = `Cartas de ${nombreJugador}`;
  }
  // -- Generar la baraja --
  let baraja = []; // Iniciamos la baraja
  let palos = ["C", "T", "D", "P"];
  for (let index = 0; index < palos.length; index++) {
    for (let i = 1; i <= 13; i++) {
      switch (i) {
        case 11:
          baraja.push(new carta("J" + palos[index]));
          break;
        case 12:
          baraja.push(new carta("Q" + palos[index]));
          break;
        case 13:
          baraja.push(new carta("K" + palos[index]));
          break;
        default:
          baraja.push(new carta(i + palos[index]));
          break;
      }
    }
  }
  baraja = _.shuffle(baraja); // Barajamos

  // -- Variables de la Banca --
  let puntuacionBanca = 0;
  let cartaSacada;
  // -- JUGADA BANCA --
  let cartasBanca = document.getElementById("cartasBanca");
  let puntosBanca = document.getElementById("puntosBanca");
  banca.style.display = "block";
  let intervalo = setInterval(() => {
    if (puntuacionBanca < 17) {
      cartaSacada = baraja.pop();
      puntuacionBanca += cartaSacada.valor;
      audio.play();
      cartasBanca.innerHTML += `<img src="${cartaSacada.imagen}">`; // Actualiza el div para mostrar las cartas
      puntosBanca.innerText = `Puntos Banca: ${puntuacionBanca}`;
    } else {
      clearInterval(intervalo);
    }
    if (puntuacionBanca > 21) {
      // Si la banca se excede y tiene más de 21 puntos, gana el jugador sin tener que jugar
      plantar();
    } else if (puntuacionBanca >= 17) {
      // Muestra la interfaz del usuario si la partida continua
      jugador.style.display = "block";
      botonesJugador.style.display = "block";
    }
  }, 2000);

  // -- Botones Jugador --
  let btnPedir = document.querySelector("#btn-pedir");
  let btnPlantar = document.querySelector("#btn-plantar");
  btnPedir.addEventListener("click", pedirJugador);
  btnPlantar.addEventListener("click", plantar);
  // -- Variables Jugador --
  let puntuacionJugador = 0;
  let cartaSacadaJugador;
  // -- JUGADA JUGADOR --
  function pedirJugador() {
    let cartasJugador = document.getElementById("cartasJugador");
    let puntosJugador = document.getElementById("puntosJugador");
    // Repartir cartas al jugador cuando pulsa el botón
    if (puntuacionJugador < 21) {
      // Si el jugador tiene menos de 21 puntos, puede pedir una carta
      cartaSacadaJugador = baraja.pop();
      puntuacionJugador += cartaSacadaJugador.valor;
      audio.play();
      cartasJugador.innerHTML += `<img src="${cartaSacadaJugador.imagen}">`; // Muestra la imagen de la carta
      puntosJugador.innerText = `Puntos Jugador: ${puntuacionJugador}`; // Muestra la puntuación
      if (puntuacionJugador > 21) {
        // Si el jugador se pasa de 21, pierde automaticamente
        plantar();
      }
    }
  }

  // -- Plantarse (calcula el ganador y muestra el resultado)--
  function plantar() {
    let resultado = document.getElementById("resultado");
    botonesJugador.style.display = "none";
    if (puntuacionBanca > 21) {
      resultado.innerText = "¡Ganaste!";
    } else if (puntuacionJugador > 21) {
      resultado.innerText = "¡Perdiste!";
    } else if (puntuacionJugador > puntuacionBanca) {
      resultado.innerText = "¡Ganaste!";
    } else if (puntuacionBanca > puntuacionJugador) {
      resultado.innerText = "¡Perdiste!";
    } else {
      resultado.innerText = "¡Empate!";
    }
    resultado.style.display = "block"; // Muestra el texto del resultado
  }
}
