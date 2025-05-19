let historial = document.getElementById("historial");
let operaciones = [];

function addResultado(value) {
  document.getElementById("resultado").value += value;
}

function borrar() {
  document.getElementById("resultado").value = "";
}

function resolver() {
  const input = document.getElementById("resultado").value;
  const calcularResultado = eval(input);
  document.getElementById("resultado").value = calcularResultado;
  operaciones.push(`${input} = ${calcularResultado}`);
  historial.innerHTML = operaciones.join('<hr><br>');
}
