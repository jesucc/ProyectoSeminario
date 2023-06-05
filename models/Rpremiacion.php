
<?php

require_once 'Conexion.php';

class Rdelegacion extends Conexion{

  private $Conexion;

  //Constructor
  //El constructor es un metodo
  public function __CONSTRUCT(){
    $this->Conexion = parent::getConexion();
  }

  //Metodo
  //Este método deberá retornar un arreglo conteniendo la información
  //además del estado (status)
  public function registrarPersona($datos = []){
    $respuesta = [
      "status"  => false,
      "message" => ""
    ];

    try{
      $consulta = $this->Conexion->prepare("CALL spu_personas_registrar(?,?,?,?,?)");
      $respusta["status"] = $consulta->execute(
        array(
          $datos["apellidos"],
          $datos["nombres"],
          $datos["documentoI"],
          $datos["numDocumento"],
          $datos["genero"]
        )
      );
    }
    catch(Exception $e){
      //Manejar el error según criterio...
      $respuesta["message" ] = "NO se ha podido completar el proceso. Código error:". $e->getCode();
    }


    return $respuesta;
  }


  public function listaridpersona(){
    try{
      $consulta = $this->Conexion->prepare("SELECT idpersona FROM deportistas ");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }

  public function listarideporte(){
    try{
      $consulta = $this->Conexion->prepare("SELECT iddeporte FROM deportistas ");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }

  public function listaridentrenador(){
    try{
      $consulta = $this->Conexion->prepare("SELECT identrenador FROM deportistas ");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }


  public function listariddelegacion(){
    try{
      $consulta = $this->Conexion->prepare("SELECT iddelegacion FROM deportistas ");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }

  public function listaridpremiacion(){
    try{
      $consulta = $this->Conexion->prepare("SELECT idpremiacion FROM deportistas ");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }

  public function registrarPremiacion($datos = []){
    $respuesta = [
      "status"  => false,
      "message" => ""
    ];

    try{
      $consulta = $this->Conexion->prepare("CALL spu_Deportista_registrar(?,?,?,?,?)");
      $respusta["status"] = $consulta->execute(
        array(
          $datos["idpersona"],
          $datos["iddeporte"],
          $datos["identrenador"],
          $datos["iddelegacion"],
          $datos["idpremiacion"]
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