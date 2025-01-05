export class Jugador {
  constructor(nombre, posicion, valor) {
    if (typeof nombre !== "string") {
      throw new Error("El nombre debe ser de tipo string");
    }
    this.nombre = nombre;

    if (typeof posicion !== "string") {
      throw new Error("La posición debe ser de tipo string");
    }
    this.posicion = posicion;

    if (typeof valor !== "number") {
      throw new Error("El valor del jugador debe ser un número");
    }
    this.valor = valor;
  }
}
