/*
### Ejercicio 5: Calculadora de Descuentos

**Objetivo:** Crear una calculadora que determine el precio final de un producto después de aplicar un descuento.

**Instrucciones:**

1. Solicita al usuario que ingrese el precio original del producto mediante input.
2. Solicita al usuario que ingrese el porcentaje de descuento mediante input.
3. Calcula el precio final después de aplicar el descuento mediante input.
4. Muestra el precio final al usuario en un parrafo.

**Ejemplo de entrada:**

- Precio original: 100€
- Porcentaje de descuento: 20%

**Salida esperada:** El precio final después del descuento es 80€.
*/
let precioOriginal = "";
let descuento = "";

async function precioDescuento() {
  // Precio original
  const obtenerPrecio = await Swal.fire({
    title: "Precio original del producto",
    input: "text",
    inputAttributes: {
      autocapitalize: "off",
    },
    showCancelButton: true,
    confirmButtonText: "Calcular",
    showLoaderOnConfirm: true,
  });
  if (obtenerPrecio.isConfirmed && obtenerPrecio.value.trim() !== "") {
    const precio = parseFloat(obtenerPrecio.value);

    if (!isNaN(precio)) {
      precioOriginal = precio;
    }
  } else {
    Swal.fire({
      title: "Error",
      text: "Por favor, ingresa un precio válido.",
      icon: "error",
      confirmButtonText: "Aceptar",
    });
    return;
  }

  // Descuento
  const obtenerDescuento = await Swal.fire({
    title: "Descuento del producto",
    input: "text",
    inputAttributes: {
      autocapitalize: "off",
    },
    showCancelButton: true,
    confirmButtonText: "Calcular",
    showLoaderOnConfirm: true,
  });

  if (obtenerDescuento.isConfirmed && obtenerDescuento.value.trim() !== "") {
    const porcentajeDescuento = parseFloat(obtenerDescuento.value);

    if (!isNaN(porcentajeDescuento)) {
      descuento = porcentajeDescuento;
    }
  } else {
    Swal.fire({
      title: "Error",
      text: "Por favor, ingresa un descuento válido.",
      icon: "error",
      confirmButtonText: "Aceptar",
    });
    return;
  }
  calcularDescuento(precioOriginal, descuento);
}

function calcularDescuento(precioOriginal, descuento) {
  let precioFinal = precioOriginal - (precioOriginal * descuento) / 100;
  Swal.fire(
    "El precio con descuento de " +
      descuento +
      "% aplicado es de " +
      precioFinal +
      "€."
  );
}

precioDescuento();
