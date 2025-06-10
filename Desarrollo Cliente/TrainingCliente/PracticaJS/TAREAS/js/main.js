let listaTareas = document.getElementById("listaTareas");
let nuevaTarea = document.getElementById("nuevaTarea");

function addTarea() {
  if (nuevaTarea.value.length > 0) {
    // Usamos insertAdjacentHTML para agregar la nueva tarea sin borrar el contenido anterior
    listaTareas.insertAdjacentHTML("beforeend", crearTarea(nuevaTarea.value));

    Swal.fire({
      icon: "success",
      text: "Tarea Añadida",
    });

    // Limpiar el campo de entrada
    nuevaTarea.value = "";
  } else {
    Swal.fire({
      icon: "error",
      text: "Escriba una tarea",
    });
  }
}

function crearTarea(tarea) {
  // Esta es la estructura HTML que se agrega
  return `
    <li class="mt-1">
      ${tarea}
      <button onclick="eliminar(this)" class="btn btn-warning">Eliminar</button>
    </li>
  `;
}

// Función para eliminar la tarea
function eliminar(button) {
  // Elimina el 'li' que contiene el botón presionado
  button.parentElement.remove();
  Swal.fire({
    icon: "success",
    text: "Tarea Eliminada",
  });
}
