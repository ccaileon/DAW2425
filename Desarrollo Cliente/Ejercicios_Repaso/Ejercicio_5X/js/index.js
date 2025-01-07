/*
### Ejercicio 5: X

Objetivo: Crea una app que simule el funcionamiento de la red social x mediante la publicación de tweets en el timeline. 

Instrucciones: 

1. El usuario introducirá el título del tweet y su temática en inputs diferentes
2. Se mostrará un span con el número de letras que se escribe en el tweet
3. Tras darle al botón de publicar, se creará una carta en el TL y se borrarán los campos
4. En el caso de intentar publicar algo sin datos en los inpus, saltará una alerta (utiliza sweetAlerts)
5. En la parte central, diseña un sistema de filtros, para poder buscar tweets por categorias
*/
// -- Tweet --
const tituloTweet = document.getElementById("tweet-titulo");
const contenidoTweet = document.getElementById("tweet");
const maxLength = document.getElementById("max-characters");
// -- Botones --
const btnEnviar = document.getElementById("btn-enviar");
// -- Timeline --
const timeline = document.getElementById("timeline");
const filtro = document.getElementById("filtrar-categoria");

let longitud = contenidoTweet.value.length;

// -- Almacenamiento por categoría de Tweets --
let tweetTodos = [];
let tweetPolitica = [];
let tweetHumor = [];
let tweetNoticias = [];
let tweetSocial = [];

btnEnviar.onclick = function () {
  // -- Valor de la categoría se comprueba al hacer click en el botón de Enviar --
  const categoriaTweet = document.querySelector(
    'input[name="categoria"]:checked'
  );

  if (tituloTweet.value.trim() === "" || contenidoTweet.value.trim() === "") {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Debes escribir un título y un tweet",
    });
    return;
  }

  let tweetNuevo =
    "<div class='card' style='width: 18rem';><h5 class='card-tittle'><div class='card-body'>" +
    tituloTweet.value +
    "</h5>" +
    "<p class='card-text'>" +
    contenidoTweet.value +
    "</p></div></div>";

  timeline.innerHTML += tweetNuevo;
  tweetTodos.push(tweetNuevo);

  console.log(categoriaTweet.value);
  switch (categoriaTweet.value) {
    case "Política":
      tweetPolitica.push(tweetNuevo);
      break;
    case "Humor":
      tweetHumor.push(tweetNuevo);
      break;
    case "Noticias":
      tweetNoticias.push(tweetNuevo);
      break;
    case "Social":
      tweetSocial.push(tweetNuevo);
      break;
  }

  console.log("Tweets de política: ", tweetPolitica);
  console.log("Tweets de humor: ", tweetHumor);
  console.log("Tweets de noticias: ", tweetNoticias);
  console.log("Tweets sociales: ", tweetSocial);
  tituloTweet.value = "";
  contenidoTweet.value = "";
  maxLength.style.visibility = "hidden";
};

filtro.onchange = function () {
  // -- Valor del filtro al pulsar el botón --

  switch (filtro.value) {
    case "politica":
      if (tweetPolitica.length > 0) {
        timeline.innerHTML = tweetPolitica.join("");
      } else {
        timeline.innerHTML =
          "<h3 style='color: white;'>No se han encontrado tweets en esta categoría</h3>";
      }
      break;
    case "humor":
      if (tweetHumor.length > 0) {
        timeline.innerHTML = tweetHumor.join("");
      } else {
        timeline.innerHTML =
          "<h3 style='color: white;'>No se han encontrado tweets en esta categoría</h3>";
      }

      break;
    case "noticias":
      if (tweetNoticias.length > 0) {
        timeline.innerHTML = tweetNoticias.join("");
      } else {
        timeline.innerHTML =
          "<h3 style='color: white;'>No se han encontrado tweets en esta categoría</h3>";
      }

      break;
    case "social":
      if (tweetSocial.length > 0) {
        timeline.innerHTML = tweetSocial.join("");
      } else {
        timeline.innerHTML =
          "<h3 style='color: white;'>No se han encontrado tweets en esta categoría</h3>";
      }

      break;
    case "todos":
      if (tweetTodos.length > 0) {
        timeline.innerHTML = tweetTodos.join("");
      } else {
        timeline.innerHTML =
          "<h3 style='color: white;'>No se han encontrado tweets en esta categoría</h3>";
      }

    default:
      if (tweetTodos.length > 0) {
        timeline.innerHTML = tweetTodos.join("");
      } else {
        timeline.innerHTML =
          "<h3 style='color: white;'>No se han encontrado tweets en esta categoría</h3>";
      }
      break;
  }
};

contenidoTweet.oninput = function () {
  maxLength.style.display = "block";
  longitud = contenidoTweet.value.length;
  console.log(longitud);
  maxLength.innerText = longitud;

  if (longitud < 170) {
    maxLength.style.color = "green";
  } else if (longitud < 220) {
    maxLength.style.color = "orange";
  } else {
    maxLength.style.color = "red";
  }
};
