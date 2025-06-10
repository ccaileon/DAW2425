<?php
// Escribe un programa que muestre en dos columnas:  Numero - cuadrado del numero de 10 números aleatorios entre 5 y 20.
// https://www.w3schools.com/php/func_array_in_array.asp
// https://www.w3schools.com/php/php_looping_continue.asp

$num_lista = array(); // Definimos el array que almacenará los números salidos
$cuadrado; // Variable para calcular el cuadrado del número
$contador = 0; // Contador para el while

//Tabla
echo "<table border = 1px>";
echo "<tr><th>Número</th><th>Cuadrado del número</th></tr>";

while ($contador < 10) {
    $num_aleatorio = rand(5, 20); // Generamos un número aleatorio entre 5 y 20
    if (in_array($num_aleatorio, $num_lista)) {//Filtramos los números para que no haya repetidos
        continue; // Si el número ya está en el array de números salidos, interrumpe esta iteración y continua con la siguiente
    }
    // El número no ha salido previamente, el ciclo del while continua:
    $num_lista[] = $num_aleatorio; //Añadimos el número al array para que no vuelva a salir
    $cuadrado = $num_aleatorio * $num_aleatorio; //Calcula el cuadrado
    echo "<tr><td>$num_aleatorio</td><td>$cuadrado</td></tr>"; //Genera las celdas con los datos del número aleatorio y su cuadrado
    $contador++; // Suma +1 al contador, que se detendrá cuando llegue a 10.
}


?>