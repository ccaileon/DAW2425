/* Realiza una aplicación para poder mostrar todos los datos de clasificaciones de las ligas de fútbol. Para ello sigue los siguientes pasos: 

- En un select, carga los nombre de todas las ligas de fútbol disponibles en este enlace:  https://www.thesportsdb.com/api/v1/json/3/all_leagues.php
- Una vez cargado das las ligas, crea otro select donde se carguen las temporadas disponibles de dicha liga. Para poder hacer esta carga puedes hacerlo tras cambiar la selección del select anterior. Para eso puedes utilizar el siguiente enlace:, indicando el id de la liga a descansar: https://www.thesportsdb.com/api/v2/json/list/seasons/4328
- Por último, y tras pulsar un botón de filtro, carga en una tabla la clasificación de la liga y temporada seleccionadas en el select anterior. Para ello utiliza el siguiente enlace, teniendo en cuenta que hay que indicar el id y seasson que se quiera: https://www.thesportsdb.com/api/v1/json/3/lookuptable.php?l=4328&s=2020-2021

*/

// Nodos
const nodoSelectLiga = document.getElementById("div-liga");
const nodoSelectSeason = document.getElementById("div-season");
const btnFiltrar = document.getElementById("btn-filtrar");
const nodoTabla = document.getElementById("tabla");

let url = "https://www.thesportsdb.com/api/v1/json/3/all_leagues.php";

// Datos liga
async function obtenerDatos(url) {
  let respuesta = await fetch(url);
  let json = await respuesta.json();
  let ligas = json.leagues;

  let htmlSelect =
    "<select class='form-select' name='liga' id='select-liga'><option selected>- Selecciona una liga -</option>";
  ligas.forEach((liga) => {
    htmlSelect +=
      "<option value ='" + liga.idLeague + "'>" + liga.strLeague + "</option>";
  });
  htmlSelect += "</select>";
  nodoSelectLiga.innerHTML = htmlSelect; // Actualizar DOM
}

//Datos Temporadas
let urlSeasons =
  "https://www.thesportsdb.com/api/v1/json/3/search_all_seasons.php?id=4328";
async function obtenerSeasons(urlSeasons) {
  let respuesta = await fetch(urlSeasons);
  let json = await respuesta.json();
  let season = json.seasons;
  //let listaSeasons = season.map(season => season.strSeason);

  let htmlSelect =
    "<select class='form-select' name='season' id='select-season'><option selected>- Selecciona una temporada -</option>";
  season.forEach((season) => {
    htmlSelect +=
      "<option value='" +
      season.strSeason +
      "'>" +
      season.strSeason +
      "</option>";
  });
  htmlSelect += "</select>";
  nodoSelectSeason.innerHTML = htmlSelect;
}

//Datos Clasificación
let urlClasificacion =
  "https://www.thesportsdb.com/api/v1/json/3/lookuptable.php?l=";
async function obtenerClasificacion(
  urlClasificacion,
  selectLiga,
  selectSeason
) {
  console.log(selectLiga);
  urlClasificacion += selectLiga + "&s=" + selectSeason;
  let respuesta;
  let json;
  try {
    respuesta = await fetch(urlClasificacion);
    json = await respuesta.json();
  } catch (error) {
    nodoTabla.innerHTML =
      "<h3 class='h3'>No hay datos para esta liga y año</h3>";
    return;
  }

  let clasificacion = json.table;
  console.log(clasificacion);
  let htmlTabla =
    "<table class='table table-success table-striped-columns'><thead><tr><td style='visibility: hidden;'></td><th>Ranking</th><th>Partidos Ganados</th><th>Goles a favor</th><th>Goles en contra</th></thead><tbody>";
  clasificacion.forEach((element) => {
    htmlTabla += "<tr>";
    htmlTabla += `<th>${element.strTeam}</th><td>${element.intRank}</td><td>${element.intWin}</td><td>${element.intGoalsFor}</td><td>${element.intGoalsAgainst}</td>`;
    htmlTabla += "</tr>";
  });
  htmlTabla += "</tbody></table>";
  nodoTabla.innerHTML = htmlTabla;
}

btnFiltrar.addEventListener("click", function () {
  let selectLiga = document.getElementById("select-liga").value;
  let selectSeason = document.getElementById("select-season").value;

  obtenerClasificacion(urlClasificacion, selectLiga, selectSeason);
});

obtenerDatos(url);
obtenerSeasons(urlSeasons);
