import { Equipo } from "/js/utils/Equipo.js";
import { Jugador } from "/js/utils/Jugador.js";

let barsa = new Equipo("FC Barcelona", [], 150000000);
let madrid = new Equipo("Real Madrid", [], 200000000);
let atleti = new Equipo("Atlético de Madrid", [], 100500000);

barsa.ficharJugador(new Jugador("Marcelo Díaz", "Delantero", 15000000));
barsa.ficharJugador(new Jugador("Carlos Sánchez", "Defensa", 12000000));
barsa.ficharJugador(new Jugador("Luis Hernández", "Centrocampista", 20000000));
barsa.ficharJugador(new Jugador("Javier Pérez", "Portero", 35000000));
barsa.ficharJugador(new Jugador("David Gómez", "Lateral Derecho", 11000000));

madrid.ficharJugador(new Jugador("Juan Martínez", "Delantero", 3000000));
madrid.ficharJugador(new Jugador("José García", "Centrocampista", 5000000));
madrid.ficharJugador(new Jugador("Fernando Torres", "Defensa", 55000000));
madrid.ficharJugador(new Jugador("Manuel Ruiz", "Portero", 23000000));
madrid.ficharJugador(
  new Jugador("Antonio López", "Lateral Izquierdo", 1000000)
);

atleti.ficharJugador(
  new Jugador("Pedro Rodríguez", "Centrocampista", 15000000)
);
atleti.ficharJugador(new Jugador("Ricardo Ramírez", "Delantero", 5000000));
atleti.ficharJugador(new Jugador("Sergio Morales", "Defensa", 6000000));
atleti.ficharJugador(new Jugador("Carlos Fernández", "Portero", 12000000));
atleti.ficharJugador(new Jugador("Raúl Castro", "Lateral Derecho", 36000000));

//Jugador más caro del barsa
let jugadorMasCaroBarsa = barsa.plantilla[0];
barsa.plantilla.forEach((jugador) => {
  if (jugador.valor > jugadorMasCaroBarsa.valor) {
    jugadorMasCaroBarsa = jugador;
  }
});
console.log(
  "El jugador más caro del FC Barcelona es " +
    jugadorMasCaroBarsa.nombre +
    ", con un valor de " +
    jugadorMasCaroBarsa.valor +
    "."
);

//Jugador más caro del madrid
let jugadorMasCaroMadrid = madrid.plantilla[0];
madrid.plantilla.forEach((jugador) => {
  if (jugador.valor > jugadorMasCaroMadrid.valor) {
    jugadorMasCaroMadrid = jugador;
  }
});
console.log(
  "El jugador más caro del Real Madrid es " +
    jugadorMasCaroMadrid.nombre +
    ", con un valor de " +
    jugadorMasCaroMadrid.valor +
    "."
);

//Jugador más caro del atleti
let jugadorMasCaroAtleti = atleti.plantilla[0];
atleti.plantilla.forEach((jugador) => {
  if (jugador.valor > jugadorMasCaroAtleti.valor) {
    jugadorMasCaroAtleti = jugador;
  }
});
console.log(
  "El jugador más caro del Atlético de Madrid es " +
    jugadorMasCaroAtleti.nombre +
    ", con un valor de " +
    jugadorMasCaroAtleti.valor +
    "."
);
