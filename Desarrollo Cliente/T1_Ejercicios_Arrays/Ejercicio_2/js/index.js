/* 2. Crear un array vacío, luego generar 20 números al azar y guardarlos en un array.
Una vez generados realiza las siguientes acciones:
- Muestra por consola los pares
- Muestra por cosola todos los numeros
- Muestra el número máximo
- Muestra el número mínimo
- Muestra la media
*/

//Variables para actualizar el HTML
const parrafoNumerosArray = document.getElementById("numerosArray");
const parrafoNumerosPares = document.getElementById("numerosPares");
const parrafoNumeroMaximo = document.getElementById("numeroMaximo");
const parrafoNumeroMinimo = document.getElementById("numeroMinimo");
const parrafoMedia = document.getElementById("media");

// Crear array de 20 números aleatorios
const numeros = [];
for (let index = 0; index < 20; index++) {
  numeros[index] = Math.floor(Math.random() * 100);
}
console.log("Números en el array:" + numeros);
console.log("FIN");

// Filtrar el array
let i = 0;
let numeroGrande = numeros[0];
let numeroPeque = numeros[0];
let suma = 0;
let numerosPares = [];
while (i < numeros.length) {
  if (numeros[i] % 2 == 0) {
    console.log(numeros[i]);
    numerosPares.push(numeros[i]);
  }
  console.log(numeros[i]);
  suma = suma + numeros[i];
  if (numeros[i] > numeroGrande) {
    numeroGrande = numeros[i];
  }
  if (numeros[i] < numeroPeque) {
    numeroPeque = numeros[i];
  }
  i++;
}
console.log("El número más grande es " + numeroGrande);
console.log("El número más pequeño es " + numeroPeque);
let media = suma / numeros.length;
console.log("La media es " + media);

parrafoNumerosArray.textContent = numeros.join(", ");
parrafoNumerosPares.textContent = numerosPares.join(", ");
parrafoNumeroMaximo.textContent = numeroGrande;
parrafoNumeroMinimo.textContent = numeroPeque;
parrafoMedia.textContent = media;
