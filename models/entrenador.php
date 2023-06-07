<?php

require_once 'Conexion.php';

class Entrenador extends Conexion{
  private $Conexion;

  public function __CONSTRUCT(){
    $this->Conexion = parent::getConexion();
  }

  public function listarentrenador() {
    try{
      $consulta = $this->Conexion->prepare("CALL spu_entrenador_listar()");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
          die($e->getMessage());
    }
  }
}