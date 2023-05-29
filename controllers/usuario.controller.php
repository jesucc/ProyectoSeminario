<?php

require_once '../models/usuario.php';


if(isset($_GET['operacion'])){


  $usuario = new Usuario();


  if($_GET['operacion'] =='iniciarSesion'){

    $acceso =[
      "login"           => false,
      "nombreusuario"   => "",
      "mensaje"         => ""
    ];

    $data = $usuario->iniciarSesion($_GET['email']);
    $claveIngresada = $_GET['password'];  
    
    


    if($data){
      if(password_verify($claveIngresada, $data['claveacceso'])){


        $acceso["login"] = true;
        $acceso["email"] = $data["email"];
        $acceso["nombreusuario"]=$data["nombreusuario"];
       
      
      }else{
        $acceso["mensaje"] = "Error en la contraseña";
      }
    }else{
      $acceso["mensaje"] = "Usuario no encontrado";
    }


    $_SESSION['seguridad'] = $acceso;

    echo json_encode($acceso);
  } 
}
?>