export class Equipo {
  constructor(nombre, plantilla, presupuesto) {
    if (typeof nombre != "string") {
      throw new Error("El nombre debe ser una cadena de texto");
    }
    this.nombre = nombre;

    if (!Array.isArray(plantilla)) {
      throw new Error("La plantilla debe ser un array");
    }
    this.plantilla = plantilla;

    if (typeof presupuesto !== "number") {
      throw new Error("El presupuesto debe ser un número");
    }
    this.presupuesto = presupuesto;
  }

  ficharJugador(Jugador) {
    this.plantilla.push(Jugador);
  }

  listarPlantilla() {
    plantilla.forEach(jugador => {
      console.log(jugador);
    });
  }
}
