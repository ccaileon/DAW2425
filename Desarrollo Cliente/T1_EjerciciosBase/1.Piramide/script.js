//https://wiki.selfhtml.org/wiki/JavaScript/DOM/Event/DOMContentLoaded (Solucionar problema de que ejecute la función antes de que cargue el HTML)
//Uncaught TypeError: Cannot set properties of null (setting 'innerHTML')

document.addEventListener('DOMContentLoaded', function() { 


let numeroFilas = null;
let ladrillo = '+';
let piramide1 = document.getElementById('piramide1'); // Div piramide izquierda
let piramide2 = document.getElementById('piramide2'); // Div piramide derecha
let resultado = ''; // Variable que almacenará la pirámide con la que actualizaremos el div
while (numeroFilas === null) {
  numeroFilas = prompt('Introduce el número de filas para la pirámide:')
  if (numeroFilas <= 0) {
    console.log('Introduce un número válido');
    numeroFilas = null;
  };
  for (let i = 0; i < numeroFilas; i++) {
    console.log(ladrillo); // Mostramos el "ladrillo (+)" en consola
    resultado += ladrillo + "<br>"; // Se almacena la estructura de la pirámide para actualizar luego el div (no se actualiza aqui porque detiene el for)
    ladrillo = ladrillo + '+'; // Añadimos un ladrillo más en cada vuelta
 
  }
}
//console.log(resultado); test
  piramide2.innerHTML = resultado; // Actualizamos el div con el contenido de resultado, que contiene la estructura de la pirámide
piramide1.innerHTML = resultado;
  });