<?php

//  Muestra los números del 320 al 160, contando de 20 en 20 utilizando un bucle for.

echo "<h1>Números del 320 al 160, restando de 20 en 20:</h1>\n";

$numInicio = 320;
$numFinal = 160;
for ($i = $numInicio; $i >= $numFinal; $i -= 20) {
    if ($i == $numFinal) { //Para que el último número se imprima con un punto final
        echo $i . ". ";
        break; //Para interrumpir el codigo y que no imprima dos veces el número 160

    }
    echo $i . ", ";
}


?>