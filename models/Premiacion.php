<?php

require_once 'Conexion.php';

class Premiacion extends Conexion{

  private $conexion;

  //Constructor
  //El constructor es un metodo
  public function __CONSTRUCT(){
    $this->conexion = parent::getConexion();
  }

  //Metodos

  public function listarpremiacion(){
    try{
      $consulta = $this->conexion->prepare("CALL spu_premiaciones_listar()");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      //Manejar el error según criterio...
      die($e->getMessage());
    }
  }

  
}