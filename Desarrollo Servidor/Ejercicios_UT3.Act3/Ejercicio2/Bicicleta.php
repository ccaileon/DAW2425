<?php
require_once 'Vehiculo.php';
class Bicicleta extends Vehiculo
{
  public $numeroMarchas;

  public function __construct($kms_recorridos, $numeroMarchas)
  {
    parent::__construct($kms_recorridos);
    $this->numeroMarchas = $numeroMarchas;
  }

  function hazCaballito()
  {
    echo 'Caballitooo...';
  }
}

?>