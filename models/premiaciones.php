<?php

require_once 'Conexion.php';

class Premiaciones extends Conexion{
  private $Conexion;

  public function __CONSTRUCT(){
    $this->Conexion = parent::getConexion();
  }

  public function listarpremiacion() {
    try{
      $consulta = $this->Conexion->prepare("CALL  spu_premiacion_listar()");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
          die($e->getMessage());
    }
  }
}