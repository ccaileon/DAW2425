/* 1. Dado el array = [1,2,3,4,5,6,7,8,9,10]
- Iterar por todos los elementos dentro de un array utilizando while y mostrarlos
en pantalla.
- Iterar por todos los elementos dentro de un array utilizando for y mostrarlos en
pantalla.
- Iterar por todos los elementos dentro de un array utilizando .forEach y
mostrarlos en pantalla.
- Mostrar todos los elementos dentro de un array sumándole uno a cada uno.
- Calcular la media de todos los elementos del array */

let parrafoWhile = document.getElementById("while");
let parrafoFor = document.getElementById("for");
let parrafoForEach = document.getElementById("foreach");

const numeros = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
console.log("Mostrando elementos utilizando while: ");
let i = 0;
let suma = 0;
while (i < numeros.length) {
  console.log(numeros[i]);
  suma = suma + numeros[i];
  if (i < numeros.length - 1) {
    parrafoWhile.textContent += numeros[i] + ", ";
  } else {
    parrafoWhile.textContent += numeros[i] + ".";
  }
  i++;
}

console.log("Mostrando elementos utilizando for: ");
for (let index = 0; index < numeros.length; index++) {
  console.log(numeros[index]);
  if (index < numeros.length - 1) {
    parrafoFor.textContent += numeros[index] + ", ";
  } else {
    parrafoFor.textContent += numeros[index] + ".";
  }
}

console.log("Mostrando elementos utilizando foreach: ");
numeros.forEach((element) => {
  console.log(element);
  if (element != numeros[numeros.length - 1]) {
    parrafoForEach.textContent += element + ", ";
  } else {
    parrafoForEach.textContent += element + ".";
  }
});

console.log(
  "Mostrar todos los elementos dentro de un array sumándole uno a cada uno: "
);
for (let j = 0; j < numeros.length; j++) {
  console.log(numeros[i] + 1);
}

console.log("Calcular la media de todos los elementos del array: ");
let media = suma / numeros.length;
console.log(media);
