<?php
//CONTROLADOR APROVECHA LAS FUNCIONALIDADES DEFINIDAS/CONSTRUIDAS
//EN EL MODELO (pero el MODELO necesita TABLAS y los SPU)
require_once '../models/Rpremiacion.php';

if (isset($_POST['operacion'])){

  $rdelegacion = new Premiacion();
  
  //enviamos tados a la tabla 
  if ($_POST['operacion'] == 'registrarPremiacion'){
    

    //array asociativo (es por que tiene clave y valor)
    //(array )Es una variable de tipo array que colecciona datos
    //Capturar los datos
    $datosGuardar = [                 
      //key                         //value
      "idpersona"               => $_POST['idpersona'], //(POST es una forma de enviar datos)
      "idpremiacion"                 => $_POST['idpremiacion'],
      "identrenador"              => $_POST['identrenador']
    ];

    $respuesta = $rdelegacion->registrarPremiacion($datosGuardar);
    echo json_encode($respuesta);
  } 

}