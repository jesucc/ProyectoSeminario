<?php
  require_once 'Conexion.php';

  class Delegacion extends Conexion{
    private $Conexion;

    // constructor

    public function __CONSTRUCT(){
      $this->Conexion = parent::getConexion();
    }
    public function listarNdelegaciones(){
              try{
                $consulta = $this->Conexion->prepare("SELECT nombre FROM Delegaciones ");
                $consulta->execute();
                return $consulta->fetchAll(PDO::FETCH_ASSOC);
              }
              catch(Exception $e){
                die($e->getMessage());
              }
    }

    
    public function listarDelegaciones($iddelegacion){
        try{
          $consulta = $this->Conexion->prepare("CALL  spu_delegaciones_lista(?)");
          $consulta->execute(array($iddelegacion));
          return $consulta->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(Exception $e){
          die($e->getMessage());
        }
      }



      
  }
