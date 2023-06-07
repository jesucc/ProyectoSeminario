<?php

require_once 'Conexion.php';

class Deportista extends Conexion{
  private $Conexion;

  public function __CONSTRUCT(){
    $this->Conexion = parent::getConexion();
  }

  public function listardeportista() {
    try{
      $consulta = $this->Conexion->prepare("CALL spu_deportista_listar()");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
          die($e->getMessage());
    }
  }
}