export class Coche {
  constructor(
    public marca: string,
    public modelo: string,
    public cv: number,
    public cc: number,
    public tipoMotor: "híbrido" | "eléctrico",
    public matricula: string,
    public precio: number
  ) {}
}


