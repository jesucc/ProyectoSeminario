<?php
require_once 'Conexion.php';

class Usuario extends Conexion{
  private $acceso;

  //constructor
  public function __construct(){
    $this->acceso = parent::getConexion();
  }

  public function iniciarSesion($correo =""){
    try{
      $consulta = $this->acceso->prepare("CALL spu_usuario_login(?)");
      $consulta->execute(array($correo));

      return $consulta->fetch(PDO::FETCH_ASSOC);
    }
    catch (Exception $e){
      die($e->getMessage());
    }
  }
}

?>