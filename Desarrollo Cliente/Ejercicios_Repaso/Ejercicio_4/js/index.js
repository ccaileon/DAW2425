/*
### Ejercicio 4: Lista de Tareas

**Objetivo:** Crear una lista de tareas donde el usuario pueda agregar y eliminar tareas.

**Instrucciones:**

1. Crea una interfaz con un campo de texto y un botón para agregar tareas.
2. Muestra las tareas en una lista.
3. Permite al usuario eliminar tareas de la lista.
*/

const btnNueva = document.getElementById("btn-nueva");
const btnBorrar = document.getElementById("btn-borrar");
const lista = document.getElementById("lista");
const nuevaTarea = document.getElementById("nuevaTarea");
const numTarea = document.getElementById("numTarea");

let listaTareas = [];

btnNueva.onclick = function () {
  if (nuevaTarea.value.trim() === "") {
    Swal.fire({
      icon: "error",
      tittle: "¡Huy!",
      text: "Debes escribir una tarea",
    });
    return;
  }

  listaTareas.push("<li>" + nuevaTarea.value + "</li>");
  lista.innerHTML = listaTareas.join("");
  console.log(listaTareas);
  nuevaTarea.value = "";

  Swal.fire({
    icon: "success",
    tittle: "Tarea añadida",
    text: "Tarea añadida",
    showConfirmButton: false,
    timer: 1500,
  });
};

btnBorrar.onclick = function () {
  if (numTarea.value.trim() === "") {
    Swal.fire({
      icon: "error",
      tittle: "¡Huy!",
      text: "Debes escribir el número de la tarea que quieres borrar.",
    });
    return;
  }

  if (numTarea.value > listaTareas.length || parseInt(numTarea.value) === 0) {
    Swal.fire({
      icon: "error",
      tittle: "¡Huy!",
      text: "No existe una tarea con ese número.",
    });
    return;
  }
  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: "btn btn-success",
      cancelButton: "btn btn-danger",
    },
    buttonsStyling: false,
  });
  swalWithBootstrapButtons
    .fire({
      title: "Se va a borrar la tarea " + numTarea.value,
      text: "¿Estás seguro? Este cambio es irreversible.",
      icon: "warning",
      showCancelButton: true,
      confirmButtonText: "Borrar",
      cancelButtonText: "Cancelar",
      reverseButtons: true,
    })
    .then((result) => {
      if (result.isConfirmed) {
        let indiceBorrar = parseInt(numTarea.value) - 1;
        listaTareas.splice(indiceBorrar, 1);
        lista.innerHTML = listaTareas.join("");
        numTarea.value = "";

        swalWithBootstrapButtons.fire({
          title: "Tarea Borrada",
          text: "La tarea se ha eliminado.",
          icon: "success",
        });
      } else if (result.dismiss === Swal.DismissReason.cancel) {
        swalWithBootstrapButtons.fire({
          title: "Cancelado",
          text: "No se ha borrado ninguna tarea.",
          icon: "error",
        });
      }
    });

  console.log(swalWithBootstrapButtons);
};
