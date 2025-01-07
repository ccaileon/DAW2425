/*
Ejercicio 3: Conversor de Temperatura

**Objetivo:** Crear un conversor de temperaturas entre Celsius y Fahrenheit.

**Instrucciones:**

1. Solicita al usuario que ingrese una temperatura en Celsius en un input.
2. Convierte la temperatura a Fahrenheit y muéstrala.
3. Solicita al usuario que ingrese una temperatura en Fahrenheit.
4. Convierte la temperatura a Celsius y muéstrala.
*/

let celsius = Number(prompt("Introduce una temperatura en Celsius: "));
alert(celsius + "°C en Fahrenheit son " + ((celsius * 9) / 5 + 32) + "°F.");

let fahrenheit = Number(prompt("Introduce una temperatura en Fahrenheit: "));
alert(fahrenheit + "°F en Celsius son " + (fahrenheit - 32) * (5 / 9) + "°C.");
