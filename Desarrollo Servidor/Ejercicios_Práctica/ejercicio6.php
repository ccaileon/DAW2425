<?php
// Un programa que genere 2 tiradas de 3 dados(simulando 2 jugadores). 
// Muestre las dos tiradas y me diga cual tiene mayor puntuación(sumando las tiradas)
// https://www.w3schools.com/php/php_switch.asp
// https://www.php.net/manual/es/functions.user-defined.php

//Igualo los jugadores a sus puntuaciones, llamando al mismo tiempo a la función
print ("<h1>Jugador 1:</h1>");
$jugador1 = tiradaDados();
print ("<h1>Jugador 2:</h1>");
$jugador2 = tiradaDados();

print "<br>";
print ("¡Fin de la partida!");
if ($jugador1 > $jugador2) {
    print ("<p>El <b>jugador 1</b> ha ganado esta partida con un total de $jugador1 puntos. Puntos del jugador 2: $jugador2</p>");
} elseif ($jugador1 < $jugador2) {
    print ("<p>El <b>jugador 2</b> ha ganado esta partida con un total de $jugador2 puntos. Puntos del jugador 1: $jugador1</p>");
} else {
    print ("<p>¡La partida ha finalizado en <b>empate</b>! Ambos jugadores han obtenido $jugador1 puntos.</p>");
}


// Probando con funciones
function tiradaDados()
{
    $dado1 = "<img src='dados/1.jpg' width=100 height=100>\n";
    $dado2 = "<img src='dados/2.jpg' width=100 height=100>\n";
    $dado3 = "<img src='dados/3.jpg' width=100 height=100>\n";
    $dado4 = "<img src='dados/4.jpg' width=100 height=100>\n";
    $dado5 = "<img src='dados/5.jpg' width=100 height=100>\n";
    $dado6 = "<img src='dados/6.jpg' width=100 height=100>\n";

    $puntuacion = 0;
    for ($i = 0; $i < 3; $i++) { //Loop que se repite 3 veces para las tres tiradas
        $tirada = rand(1, 6); //Genera número aleatorio entre el 1 y el 6 
        $puntuacion += $tirada; //Añade los puntos de la tirada a la puntuación acumulada
        switch ($tirada) { //Muestra la imagen correspondiente al dado salido
            case 1:
                print $dado1;
                break;
            case 2:
                print $dado2;
                break;
            case 3:
                print $dado3;
                break;
            case 4:
                print $dado4;
                break;
            case 5:
                print $dado5;
                break;
            default:
                print $dado6;
                break;
        }
    }
    return $puntuacion; //Devuelve la puntuación del jugador
}





/*Primer intento sin uso de funciones (funciona, pero lo he movido al fondo del código)
$dado1 = "<img src='dados/1.jpg' width=100 height=100>\n";
$dado2 = "<img src='dados/2.jpg' width=100 height=100>\n";
$dado3 = "<img src='dados/3.jpg' width=100 height=100>\n";
$dado4 = "<img src='dados/4.jpg' width=100 height=100>\n";
$dado5 = "<img src='dados/5.jpg' width=100 height=100>\n";
$dado6 = "<img src='dados/6.jpg' width=100 height=100>\n";

$tirada;
$jugador1 = 0;
$jugador2 = 0;

print ("<h1>Jugador 1:</h1>");
for ($i = 0; $i < 3; $i++) {
    $tirada = rand(1, 6);
    $jugador1 += $tirada;
    switch ($tirada) {
        case 1:
            echo $dado1;
            break;
        case 2:
            print $dado2;
            break;
        case 3:
            print $dado3;
            break;
        case 4:
            print $dado4;
            break;
        case 5:
            print $dado5;
            break;
        default:
            print $dado6;
            break;
    }
}
print ("<h1>Jugador 2:</h1>");
for ($i = 0; $i < 3; $i++) {
    $tirada = rand(1, 6);
    $jugador2 += $tirada;
    switch ($tirada) {
        case 1:
            echo $dado1;
            break;
        case 2:
            print $dado2;
            break;
        case 3:
            print $dado3;
            break;
        case 4:
            print $dado4;
            break;
        case 5:
            print $dado5;
            break;
        default:
            print $dado6;
            break;
    }
            
}
*/