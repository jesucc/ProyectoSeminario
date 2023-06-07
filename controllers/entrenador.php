<?php

require_once '../models/entrenador.php';

if(isset($_POST['operacion'])){
  $entrenador = new Entrenador();

  if($_POST['operacion'] == 'listarentrenador'){
    $datosObtenidos = $entrenador->listarentrenador();
    if($datosObtenidos) {
      echo json_encode($datosObtenidos);
    }
  }
}
