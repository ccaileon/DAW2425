<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vehiculos</title>
</head>

<body>
  <?php
  include_once 'Bicicleta.php';
  include_once 'Coche.php';

  $bici = new Bicicleta(0, 24);
  $miCoche = new Coche(0, 1500);

  $bici->recorre(40);
  $miCoche->recorre(200);
  echo $bici->hazCaballito() . "<br>";
  echo $miCoche->quemaRuedas() . "<br>";

  $bici->recorre(60);
  echo 'Mi bici ha recorrido ' . $bici->get_kms_recorridos() . ' Kms<br>';
  echo 'Mi coche ha recorrido ' . $miCoche->get_kms_recorridos() . ' Kms<br>';
  echo 'Se han creado un total de ' . Vehiculo::get_vehiculosCreados() . ' vehiculos.<br>';
  echo 'Todos los vehiculos han hecho un total de ' . Vehiculo::get_kms_totales() . ' Kms. <br>';

  ?>
</body>

</html>