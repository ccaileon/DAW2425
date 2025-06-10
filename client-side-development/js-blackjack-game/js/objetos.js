class carta {
  // Atributos
  valor;
  imagen;
  // Constructor
  constructor(representacion) {
    this.imagen = `/utils/cartas/${representacion}.png`;
    this.valor = representacion.substring(0, representacion.length - 1);
    switch (this.valor) {
      case "J":
      case "Q":
      case "K":
        this.valor = 11;
        break;
      default:
        this.valor = Number(this.valor);
        break;
    }
  }
}
