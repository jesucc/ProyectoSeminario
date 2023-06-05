<?php
//CONTROLADOR APROVECHA LAS FUNCIONALIDADES DEFINIDAS/CONSTRUIDAS
//EN EL MODELO (pero el MODELO necesita TABLAS y los SPU)
require_once '../models/Rpremiacion.php';

if (isset($_POST['operacion'])){

  $rdelegacion = new Rdelegacion();
  
  //enviamos tados a la tabla 
  if ($_POST['operacion'] == 'registrarPersona'){
    

    //array asociativo (es por que tiene clave y valor)
    //(array )Es una variable de tipo array que colecciona datos
    //Capturar los datos
    $datosGuardar = [                 
      //key                         //value
      "apellidos"               => $_POST['apellidos'], //(POST es una forma de enviar datos)
      "nombres"                 => $_POST['nombres'],
      "documentoI"              => $_POST['documentoI'],
      "numDocumento"             => $_POST['numDocumento'],
      "genero"                  => $_POST['genero']
    ];

    $respuesta = $rdelegacion->registrarPersona($datosGuardar);
    echo json_encode($respuesta);
  } 

  if ($_POST['operacion'] == 'listaridpersona'){

    $datosObtenidos = $rdelegacion-> listaridpersona();
    if ($datosObtenidos){
      echo json_encode($datosObtenidos);
    }
  }

  if ($_POST['operacion'] == 'listarideporte'){

    $datosObtenidos = $rdelegacion-> listarideporte();
    if ($datosObtenidos){
      echo json_encode($datosObtenidos);
    }
  }
  if ($_POST['operacion'] == 'listaridentrenador'){

    $datosObtenidos = $rdelegacion-> listaridentrenador();
    if ($datosObtenidos){
      echo json_encode($datosObtenidos);
    }
  }
  if ($_POST['operacion'] == 'listaridpremiacion'){

    $datosObtenidos = $rdelegacion-> listaridpremiacion();
    if ($datosObtenidos){
      echo json_encode($datosObtenidos);
    }
  }
  if ($_POST['operacion'] == 'listariddelegacion'){

    $datosObtenidos = $rdelegacion-> listariddelegacion();
    if ($datosObtenidos){
      echo json_encode($datosObtenidos);
    }
  }


  if ($_POST['operacion'] == 'registrarPremiacion'){
    

    //array asociativo (es por que tiene clave y valor)
    //(array )Es una variable de tipo array que colecciona datos
    //Capturar los datos
    $datosGuardar = [                 
      //key                         //value
      "idpersona"               => $_POST['idpersona'], //(POST es una forma de enviar datos)
      "iddeporte"                 => $_POST['iddeporte'],
      "identrenador"              => $_POST['identrenador'],
      "iddelegacion"                  => $_POST['iddelegacion'],
      "idpremiacion"             => $_POST['idpremiacion']
      
    ];

    $respuesta = $rdelegacion->registrarPremiacion($datosGuardar);
    echo json_encode($respuesta);
  } 

}