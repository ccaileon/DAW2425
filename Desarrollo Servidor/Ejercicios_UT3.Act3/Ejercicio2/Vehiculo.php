<?php
class Vehiculo
{
  public static $kms_totales = 0;
  public static $vehiculosCreados = 0;
  public $kms_recorridos;



  public function __construct($kms_recorridos)
  {
    $this->kms_recorridos = $kms_recorridos;
    self::$vehiculosCreados++;
    self::$kms_totales += $this->kms_recorridos;
  }

  function get_kms_recorridos()
  {
    return $this->kms_recorridos;
  }

  public static function get_vehiculosCreados()
  {
    return self::$vehiculosCreados;
  }

  public static function get_kms_totales()
  {
    return self::$kms_totales;
  }

  function recorre($km)
  {
    $this->kms_recorridos += $km;
    self::$kms_totales += $km;
  }


}




?>