/* 3. Crea un array con los siguientes valores:
```javascript
const ages = [19, 22, 19, 24, 20, 25, 26, 24, 25, 24]
```
Una vez tengas introducidos todos los valores realiza las siguientes tareas:
- Ordena el array y obten el valor máximo y mínimo
- Obtén la medida de edad */

const edadText = document.getElementById('edades');
const edadMayorText = document.getElementById('mayor');
const edadMenorText = document.getElementById('menor');


const edades = [19, 22, 19, 24, 20, 25, 26, 24, 25, 24];

edades.sort((a, b) => a - b);
console.log(edades.join(", "));
console.log("Edad más joven: " + edades[0]);
console.log("Edad más mayor " + edades[edades.length - 1])

let suma = edades.reduce(function (acumulador, valor) {
  return acumulador + valor;
}, 0);

edadText.textContent = edades.join(", ") + ".";
edadMayorText.textContent = edades[edades.length - 1];
edadMenorText.textContent = edades[0];