/*
4. Tomando el ejercicio del tema anterior de las cartas, crea funciones que
realicen la siguiente funcionalidad:
- sacarCarta: la cual no admitirá nada por parámetros y sacará una carta de la
baraja
- obtenerInformacion: la cual admitirá por parámetros una carta y sacará por
consola el valor de dicha carta
*/

let palos = ["C", "D", "P", "T"];
let numeros = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, "J", "Q", "K"];
let baraja = [];
let carta = "";

palos.forEach((element) => {
  for (let index = 0; index < numeros.length; index++) {
    carta = numeros[index] + element;
    baraja.push(carta);
  }
});

baraja = _.shuffle(baraja);

console.log(baraja);

let intervalo = setInterval(() => {
  sacarBaraja(baraja);
}, 5000);

function sacarBaraja(baraja) {
  if (baraja.length > 0) {
      let carta = baraja.shift();
      console.log(carta);
      console.log("Palo: " + carta.slice(-1));

      if (carta.slice(0, -1) < 11) {
        console.log("Valor: " + carta.slice(0, -1));
      } else {
        switch (carta.slice(0, -1)) {
          case "J":
            console.log("Valor: " + 11);
            break;
          case "Q":
            console.log("Valor: " + 12);

          default:
            console.log("Valor: " + 13);
            break;
        }
      }
    } else {
    clearInterval(intervalo); // Detener el intervalo si ya no hay cartas
    console.log("Se han sacado todas las cartas.");
  }
}

function sacarCarta() {
  carta = baraja.pop();
  console.log("Ha salido la carta " + carta);
}

function obtenerInformacion(carta) {
  valorCarta = carta.slice(0, -1);

  if (valorCarta < 11) {
    console.log("El valor de " + carta + " es de " + valorCarta);
  } else {
    switch (valorCarta) {
      case "J":
        console.log("Valor: " + 11);
        break;
      case "Q":
        console.log("Valor: " + 12);

      default:
        console.log("Valor: " + 13);
        break;
    }
  }
}
