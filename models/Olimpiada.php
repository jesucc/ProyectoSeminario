<?php
  require_once 'Conexion.php';

  class Olimpiada extends Conexion{
    private $Conexion;


    public function __CONSTRUCT(){
      $this->Conexion = parent::getConexion();
    }
    public function listarolimpiada(){
      try{
        $consulta = $this->Conexion->prepare("CALL spu_olimpiada_listar()");
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
      }
      catch(Exception $e){
        die($e->getMessage());
      }
    }
      
  }
