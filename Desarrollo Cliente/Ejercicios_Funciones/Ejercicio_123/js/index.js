let numero1 = Number(prompt("Introduce el primer número:"));
let numero2 = Number(prompt("Introduce el segundo número:"));
if (numero2 == "") {
  numero2 = 0;
}

try {
  sumar(numero1, numero2);
  restar(numero1, numero2);
  multiplicar(numero1, numero2);
  dividir(numero1, numero2);
} catch (error) {
  alert("Error: " + error.message);
}
function sumar(numero1, numero2) {
  validarParametros(numero1, numero2);
  let resultado = numero1 + numero2;
  alert("La suma de " + numero1 + " y " + numero2 + " es igual a " + resultado);
}

function restar(numero1, numero2) {
  validarParametros(numero1, numero2);
  let resultado = numero1 - numero2;
  alert(
    "La resta de " + numero1 + " y " + numero2 + " es igual a " + resultado
  );
}

function multiplicar(numero1, numero2) {
  validarParametros(numero1, numero2);
  let resultado = numero1 * numero2;
  alert(
    "La multiplicación de " +
      numero1 +
      " y " +
      numero2 +
      " es igual a " +
      resultado
  );
}

function dividir(numero1, numero2) {
  validarParametros(numero1, numero2);
  let resultado = numero1 / numero2;
  alert(
    "La división de " + numero1 + " y " + numero2 + " es igual a " + resultado
  );
}

function validarParametros(numero1, numero2) {
  if (arguments.length !== 2) {
    throw new Error("Se deben pasar exactamente dos parámetros a la función.");
  }
  if (isNaN(numero1) || isNaN(numero2)) {
    throw new Error("Ambos parámetros deben ser números.");
  }
}
