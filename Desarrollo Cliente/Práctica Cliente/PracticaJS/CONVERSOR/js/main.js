let euros = document.getElementById("euros");
let celcius = document.getElementById("celsius");

function calcularGrados() {
  let gradosCelsius = parseFloat(celsius.value);
  let conversionFahrenheit = ((gradosCelsius * 9) / 5 + 32).toFixed(2);
  Swal.fire({
    title: "Conversión a Celsius",
    text: `${gradosCelsius} grados Celsius corresponden a ${conversionFahrenheit} grados Fahrenheit.`,
  });
}

function calcularDolares() {
  let totalEuros =  parseFloat(euros.value);
  console.log(totalEuros);
  let conversionDolares = (totalEuros * 1.12).toFixed(2);
  Swal.fire({
    title: "Conversión euros a dolares",
    text: `${totalEuros}€ corresponde en la actualidad a $${conversionDolares}.`,
  })
}