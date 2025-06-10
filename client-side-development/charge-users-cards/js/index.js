/*
## Ejercicio 6:

Realiza una aplicación que simule la carga de los usuarios dentro del sistema. Para ello sigue los sugerentes pasos

- Usar **fetch** para hacer una llamada a una API pública de prueba, como `https://jsonplaceholder.typicode.com/users`.
- Mostrar un mensaje de "Cargando datos..." mientras se espera la respuesta de la API (simulando un tiempo de espera).
- Después de obtener los datos, mostrar una lista de usuarios en el navegador (nombre, email, y ciudad).
- Añadir un botón que, al pulsarlo, simule la carga de más datos después de 2 segundos (usando `setTimeout`).

// Info -> https://developer.mozilla.org/en-US/docs/Web/API/Fetch_API/Using_Fetch
*/

const mensaje = document.getElementById("mensaje-cargando");
const usuarios = document.getElementById("usuarios");
const btnCargar = document.getElementById("btn-cargar");

let listaUsuarios = [];
let json = [];
btnCargar.style.display = "none";

mensaje.innerHTML = "Cargando Usuarios...";

setTimeout(async function cargarUsuarios() {
  const url = "https://jsonplaceholder.typicode.com/users";
  try {
    const respuesta = await fetch(url);
    if (!respuesta.ok) {
      throw new Error(`Estado de respuesta: ${respuesta.status}`);
    }

    json = await respuesta.json();
    console.log(json);
    mensaje.style.display = "none";
  } catch (error) {
    console.error(error.message);
  }
}, 5000);

setTimeout(function datosUsuarios() {
  json.forEach((usuario) => {
    let datosUsuario = `<div class='card' style='width: 18rem;'><img class='card-img-top' src='./resources/user_image.png' alt='Card image cap'>  <div class='card-body'><h5 class='card-title'>${usuario.name}</h5><h6 class="card-subtitle mb-2 text-muted">Id Usuario: ${usuario.id}</h6><div class='card-body'><p class='card-text'>Usuario: ${usuario.username}<br> Empresa: ${usuario.company.name}<br> Email: ${usuario.email}<br> Ubicación: ${usuario.address.city}</p></div></div></div>`;

    listaUsuarios.push(datosUsuario);
  });

  usuarios.innerHTML = listaUsuarios.join("");
  btnCargar.style.display = "block";
}, 5500);

btnCargar.onclick = function cargarDatos() {
  mensaje.style.display = "block";
  setTimeout(
    () => {
      usuarios.innerHTML += listaUsuarios.join("");
      mensaje.style.display = "none";
    },

    2000
  );
};
