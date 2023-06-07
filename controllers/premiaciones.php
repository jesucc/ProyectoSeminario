<?php

require_once '../models/premiaciones.php';

if(isset($_POST['operacion'])){
  $premiaciones = new Premiaciones();

  if($_POST['operacion'] == 'listarpremiacion'){
    $datosObtenidos = $premiaciones->listarpremiacion();
    if($datosObtenidos) {
      echo json_encode($datosObtenidos);
    }
  }
}
