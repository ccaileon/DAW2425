//console.log(1) Prueba para ver si está funcionando el script

// Fuentes consultadas (No me funcionaba el obtener la puntuación y descubrí que era porque aunque el input fuera de tipo number, en js el document.getElementById lo pasaba a string)
// https://www.w3schools.com/jsref/prop_html_innerhtml.asp
// https://www.w3schools.com/jsref/jsref_parsefloat.asp
// https://stackoverflow.com/questions/13693580/how-to-make-a-document-getelementbyid-value-into-an-integer-variable-not-a-stri

function puntuar(estrellasId, puntuacionId) {
   
  const estrellas = document.getElementById(estrellasId);
  estrellas.innerHTML = ''; /* Vaciar el div de las estrellas antes de la función */
  let puntuacion = parseFloat(document.getElementById(puntuacionId).value); //Javascript lee el input como string, asi que debemos pasarlo a número con parseFloat (para que admita decimales)
  if (isNaN(puntuacion) || puntuacion === null || puntuacion > 5 || puntuacion < 0) { //Primero comprobamos que la puntuación sea correcta
    estrellas.innerHTML = '<center><i>Puntuación no válida</i></center>'; //Imprime un mensaje de aviso si no es válida
    return;
  }

  //Según el puntuaje, actualizamos el contenido del div con las imágenes correspondientes a la puntuación
  if (puntuacion === 0) {
    //console.log("prueba");
    estrellas.innerHTML = '<img src="imagenes/star-0.png"><img src="imagenes/star-0.png"><img src="imagenes/star-0.png"><img src="imagenes/star-0.png"><img src="imagenes/star-0.png">';
  } else if (puntuacion <= 0.4) {
    estrellas.innerHTML = '<img src="imagenes/star-1.png"><img src="imagenes/star-0.png"><img src="imagenes/star-0.png"><img src="imagenes/star-0.png"><img src="imagenes/star-0.png">';
  } else if (puntuacion <= 0.5) {
    estrellas.innerHTML = '<img src="imagenes/star-2.png"><img src="imagenes/star-0.png"><img src="imagenes/star-0.png"><img src="imagenes/star-0.png"><img src="imagenes/star-0.png">';
  } else if (puntuacion <= 0.9) {
    estrellas.innerHTML = '<img src="imagenes/star-3.png"><img src="imagenes/star-0.png"><img src="imagenes/star-0.png"><img src="imagenes/star-0.png"><img src="imagenes/star-0.png">';
  } else if (puntuacion <= 1) {
        estrellas.innerHTML = '<img src="imagenes/star-4.png"><img src="imagenes/star-0.png"><img src="imagenes/star-0.png"><img src="imagenes/star-0.png"><img src="imagenes/star-0.png">';
  } else if (puntuacion <= 1.4) {
        estrellas.innerHTML = '<img src="imagenes/star-4.png"><img src="imagenes/star-1.png"><img src="imagenes/star-0.png"><img src="imagenes/star-0.png"><img src="imagenes/star-0.png">';
  } else if (puntuacion === 1.5) {
    estrellas.innerHTML = '<img src="imagenes/star-4.png"><img src="imagenes/star-2.png"><img src="imagenes/star-0.png"><img src="imagenes/star-0.png"><img src="imagenes/star-0.png">';
  } else if (puntuacion <= 1.9) {
        estrellas.innerHTML = '<img src="imagenes/star-4.png"><img src="imagenes/star-3.png"><img src="imagenes/star-0.png"><img src="imagenes/star-0.png"><img src="imagenes/star-0.png">';
  } else if (puntuacion === 2) {
        estrellas.innerHTML = '<img src="imagenes/star-4.png"><img src="imagenes/star-4.png"><img src="imagenes/star-0.png"><img src="imagenes/star-0.png"><img src="imagenes/star-0.png">';
  } else if (puntuacion <= 2.4) {
        estrellas.innerHTML = '<img src="imagenes/star-4.png"><img src="imagenes/star-4.png"><img src="imagenes/star-1.png"><img src="imagenes/star-0.png"><img src="imagenes/star-0.png">';
  } else if (puntuacion === 2.5) {
    estrellas.innerHTML = '<img src="imagenes/star-4.png"><img src="imagenes/star-4.png"><img src="imagenes/star-2.png"><img src="imagenes/star-0.png"><img src="imagenes/star-0.png">';
  } else if (puntuacion <= 2.9) {
        estrellas.innerHTML = '<img src="imagenes/star-4.png"><img src="imagenes/star-4.png"><img src="imagenes/star-3.png"><img src="imagenes/star-0.png"><img src="imagenes/star-0.png">';
  } else if (puntuacion === 3) {
        estrellas.innerHTML = '<img src="imagenes/star-4.png"><img src="imagenes/star-4.png"><img src="imagenes/star-4.png"><img src="imagenes/star-0.png"><img src="imagenes/star-0.png">';
  } else if (puntuacion <= 3.4) {
        estrellas.innerHTML = '<img src="imagenes/star-4.png"><img src="imagenes/star-4.png"><img src="imagenes/star-4.png"><img src="imagenes/star-1.png"><img src="imagenes/star-0.png">';
  } else if (puntuacion === 3.5) {
        estrellas.innerHTML = '<img src="imagenes/star-4.png"><img src="imagenes/star-4.png"><img src="imagenes/star-4.png"><img src="imagenes/star-2.png"><img src="imagenes/star-0.png">';
  } else if (puntuacion <= 3.9) {
        estrellas.innerHTML = '<img src="imagenes/star-4.png"><img src="imagenes/star-4.png"><img src="imagenes/star-4.png"><img src="imagenes/star-3.png"><img src="imagenes/star-0.png">';
  } else if (puntuacion === 4) {
        estrellas.innerHTML = '<img src="imagenes/star-4.png"><img src="imagenes/star-4.png"><img src="imagenes/star-4.png"><img src="imagenes/star-4.png"><img src="imagenes/star-0.png">';
  } else if (puntuacion <= 4.4) {
        estrellas.innerHTML = '<img src="imagenes/star-4.png"><img src="imagenes/star-4.png"><img src="imagenes/star-4.png"><img src="imagenes/star-4.png"><img src="imagenes/star-1.png">';
  } else if (puntuacion === 4.5) {
        estrellas.innerHTML = '<img src="imagenes/star-4.png"><img src="imagenes/star-4.png"><img src="imagenes/star-4.png"><img src="imagenes/star-4.png"><img src="imagenes/star-2.png">';
  } else if (puntuacion <= 4.9) {
        estrellas.innerHTML = '<img src="imagenes/star-4.png"><img src="imagenes/star-4.png"><img src="imagenes/star-4.png"><img src="imagenes/star-4.png"><img src="imagenes/star-3.png">';
  } else if (puntuacion === 5) {
        estrellas.innerHTML = '<img src="imagenes/star-4.png"><img src="imagenes/star-4.png"><img src="imagenes/star-4.png"><img src="imagenes/star-4.png"><img src="imagenes/star-4.png">';
  }
}