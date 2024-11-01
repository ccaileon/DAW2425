<?php
//  Muestra los números múltiplos de 5 de un bucle de 0 a 100 utilizando while.
// https://www.php.net/manual/en/language.types.array.php
// https://www.w3schools.com/php/php_arrays_add.asp

echo "<h1>Los 100 primeros multiplos de 5</h1>\n";

$i = 0; // Condición para el while
$lista = array();
$contador = 0;
while ($i <= 100) {
    array_push($lista, 5 * $i);
    $contador++;

    if ($contador >= 21) {
        echo $lista[$i] . ", " . "\n <br>"; //Para que haya un salto de linea cada 21 números
        $contador = 0;
    } else if ($i < 100) {
        echo $lista[$i] . ", ";
    } else {
        echo $lista[$i] . ". "; //Para que el último número lo muestre con un punto final en vez de coma
    }
    $i++;
}


