/*
### Ejercicio 1: Calculadora de Gastos de Viaje

**Objetivo:** Crear una calculadora que sume los gastos de alojamiento, alimentación y entretenimiento.

**Instrucciones:**

1. Solicita al usuario que ingrese los gastos estimados para cada categoría mediante inputs.
2. Calcula el coste total sumando todos los gastos.
3. Muestra el coste total al usuario.

**Ejemplo de entrada:**

- Gastos de alojamiento: 200€
- Gastos de alimentación: 150€
- Gastos de entretenimiento: 100€

**Salida esperada:** El coste total del viaje es 450€.
*/

let gastosAlojamiento = Number(
  prompt("Introduce los gastos estimados de alojamiento: ")
);
let gastosAlimentacion = Number(
  prompt("Introduce los gastos estimados de alimentación: ")
);
let gastosEntretenimiento = Number(
  prompt("Introduce los gastos estimados de entretenimiento: ")
);

let gastosTotales = gastosAlimentacion + gastosAlojamiento + gastosEntretenimiento;

alert('El coste total estimado para este viaje es de ' + gastosTotales + '€.');
