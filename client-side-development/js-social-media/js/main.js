let tweet = document.getElementById('tweet');
let mensajes = document.getElementById('mensajes');
let contador = document.getElementById('contador');
let longitud;

function enviar() {
  longitud = tweet.value.length;

  if (longitud < 1)  {
    Swal.fire({
      icon: "error",
      title: "Escribe un mensaje"
    });
  } else {
mensajes.innerHTML += carta(tweet.value);
Swal.fire({
  icon: "success",
  title: "Tweet publicado",
});
  }
}

function carta(contenido) {
  return `
  <div class="card mt-1">
  <div class="card-body">
    ${contenido}
  </div>
</div>
  `;
}

tweet.addEventListener('input', function() {
  longitud = tweet.value.length;
  contador.textContent = `${longitud}/255 caracteres;`
});




