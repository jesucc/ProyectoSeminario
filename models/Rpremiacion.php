
<?php

require_once 'Conexion.php';

class Premiacion extends Conexion{

  private $Conexion;

  //Constructor
  //El constructor es un metodo
  public function __CONSTRUCT(){
    $this->Conexion = parent::getConexion();
  }

  //Metodo
  //Este método deberá retornar un arreglo conteniendo la información
  //además del estado (status)
  public function registrarPremiacion($datos = []){
    $respuesta = [
      "status"  => false,
      "message" => ""
    ];

    try{
      $consulta = $this->Conexion->prepare("CALL spu_deportista_registrar(?,?,?)");
      $respusta["status"] = $consulta->execute(
        array(
          $datos["idpersona"],
          $datos["idpremiacion"],
          $datos["identrenador"]
        )
      );
    }
    catch(Exception $e){
      //Manejar el error según criterio...
      $respuesta["message" ] = "NO se ha podido completar el proceso. Código error:". $e->getCode();
    }


    return $respuesta;
  }


}