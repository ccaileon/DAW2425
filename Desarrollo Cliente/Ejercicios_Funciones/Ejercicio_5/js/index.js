/*
5. Realiza un programa que permita introducir al usuario cual es el valor de la
casa que se va a comprar. Para ello el programa nada más iniciar pedirá:
- Precio de la casa que se va a comprar
- Dinero que le va a pedir al banco
- Número de años en los que lo va a devolver
- % de interes que se le va a aplicar
Una vez introducidos todos estos datos, y mediantes funciones se deberá mostrar la
tabla de amortización que tendrá el pago de la hipoteca. Por ejemplo para unos
datos introducidos de;
- Valor de la casa 450000€
- Dinero pedido al banco: 200000€
- Años a pagar: 15
- Intereses aplicados: 1,5%
*/

let precio = Number(prompt("Precio de la casa que se va a comprar: "));
let dinero = Number(prompt("Dinero que le va a pedir al banco: "));
let tiempo = Number(prompt("Número de años en los que lo va a devolver: "));
let interes = Number(prompt("% de interes que se le va a aplicar: "));

pagoMensual(tiempo, interes, dinero);

function pagoMensual(tiempo, interes, dinero) {
  let numeroMeses = tiempo * 12;
  let interesesMensuales = (interes * dinero) / numeroMeses;
  let totalPrestamo = dinero + interes * dinero;
  let cuotaMensual = totalPrestamo / numeroMeses;

  console.log(
    "Vas a pagar una cantidad de " +
      totalPrestamo +
      " ya con intereses incluidos, en " +
      numeroMeses +
      " mensualidades, con un importe mensual de " +
      cuotaMensual +
      "."
  );
  let mes = 1;
  while (totalPrestamo > 0) {
    if (mes < numeroMeses) {
      totalPrestamo = totalPrestamo - cuotaMensual;
      console.log(
        "Pago correspondiente al mes " +
          mes +
          " con una cantidad restante de " +
          totalPrestamo
      );
      mes++;
    } else {
      let restante = totalPrestamo;
      totalPrestamo = 0;
      console.log(
        "Pago FINAL correspondiente al mes " +
          mes +
          " con una cantidad restante de " +
          totalPrestamo
      );
      break;
    }
    if (totalPrestamo < 1e-6) {
      break;
    }
  }
}
