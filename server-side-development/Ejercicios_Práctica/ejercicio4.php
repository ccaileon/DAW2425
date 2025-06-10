<?php
//  Realiza un programa que nos diga cuántos dígitos tiene un número aleatorio entre (0 y 9999). 
// Mostrar el número y la cantidad de dígitos.
// https://www.w3schools.com/php/func_string_strlen.asp
// https://stackoverflow.com/questions/42220138/how-does-strlen-works-with-numbers


$num_random = rand(0, 9999); //Generamos el número aleatorio
$num_longitud = strlen((string) $num_random); // Strlen solo funciona con strings, asi que pasamos el número a string para calcular su longitud

if ($num_longitud <= 1) { //Imprime un mensaje si el número tiene un único dígito (0-9), y otro si tiene varios digitos
    echo "<p>El número aleatorio generado es $num_random, que tiene $num_longitud único digito.</p>\n";
} else {
    echo "<p>El número aleatorio generado es $num_random, que tiene $num_longitud digitos.</p>\n";
}



?>