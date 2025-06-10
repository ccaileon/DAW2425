<?php

// Muestra la tabla de multiplicar de un número generado de manera aleatoria entre 1 y 10. 
// El resultado en formato <table>
// https://www.w3schools.com/html/html_tables.asp



$num = rand(1, 10); //Generamos número aleatorio entre 1 y 10
$resultado; //Declaramos variable resultado
echo "<table border = 1px>"; //Creamos la tabla y le ponemos un borde
echo "<tr><th colspan = '2'>Tabla de multiplicar del número $num</th></tr>"; //Cabecera de la tabla
echo "<tr><th>Multiplicación</th><th>Resultado</th></tr>"; //Cabecera secundaria

for ($i = 0; $i <= 10; $i++) { //Fori para hacer la multiplicación y añadir los números a la tabla
    $resultado = $num * $i; //Almacenamos el resultado

    echo "<tr><td>$num x $i</td><td>$resultado</td></tr>"; //Añadimos la multiplicación y el resultado a la tabla en columnas diferentes

}
echo "</table>"; //Cerramos la tabla 
?>