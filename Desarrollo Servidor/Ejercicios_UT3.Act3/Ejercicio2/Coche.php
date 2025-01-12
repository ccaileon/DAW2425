<?php
require_once 'Vehiculo.php';
class Coche extends Vehiculo
{
  public $cilindrada;


  public function __construct($kms_recorridos, $cilindrada)
  {
    parent::__construct($kms_recorridos);
    $this->cilindrada = $cilindrada;
  }


  function quemaRuedas()
  {
    echo 'Ruedasssss...';
  }
}

?>