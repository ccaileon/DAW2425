/*
Ejercicio 2: Generador de Números Primos

**Objetivo:** Crear un programa que genere números primos hasta un número dado.

**Instrucciones:**

1. Solicita al usuario que ingrese un número en un input.
2. Genera y muestra todos los números primos menores o iguales a ese número en una lista.
*/

let numeroDado = Number(prompt("Introduce un número: "));
let restante = numeroDado;

function esPrimo(numeroDado) {
  if (numeroDado <= 1) {
    console.log("Este número no es primo y es demasiado pequeño.");
    return false;
  }
  for (let index = 2; index <= Math.sqrt(numeroDado); index++) {
    if (numeroDado % index === 0) {
      return false;
    }
  }
  return true;
}

let numPrimos = [];

for (let i = 2; i <= numeroDado; i++) {
  if (esPrimo(i)) {
    numPrimos.push(i);
  }
}

console.log(
  "Números primos hasta el número " +
    numeroDado +
    ": " +
    numPrimos.join(", ") +
    "."
);
