/* 
4. Crea un array vacío llamado baraja de tipo string. Mete de golpe todas las
cartas de la baraja francesa con el siguiente formato:
```javascript
1C,2C,3C,4C....,JC,QC,KC
1D,2D,3D,4D....,JD,QD,KD
1R,2R,3R,4R....,JR,QR,KR
1P,2P,3P,4P....,JP,QP,KP
```
Una vez creado el array baraja las cartas para que se desordenen. Puedes utilizar
alguna librería externa como por ejemplo underscore

Después, ve sacando por consola cartas de la
baraja cada 5 segundos. Hay que tener en cuenta que cuando una carta sale, se tiene que
quitar del mazo para que no pueda volver a salir. Una vez salga la baraja tendrás
que poner el siguiente mensaje:
```javascript
Carta KC
Valor: 13
Palo: C
Carta 7T
Valor: 7
```

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

setInterval(sacarBaraja(baraja), 1000);

function sacarBaraja(baraja) {
  for (let i = 0; i < baraja.length; i++) {
    console.log(baraja[i]);
    console.log("Palo: " + baraja[i].slice(-1));
    if (baraja[i].slice(0, -1) < 11) {
      console.log("Valor: " + baraja[i].slice(0, -1));
    } else {
      switch (baraja[i].slice(0, -1)) {
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
}
