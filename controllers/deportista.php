<?php

require_once '../models/deportista.php';

if(isset($_POST['operacion'])){
  $deportista = new Deportista();

  if($_POST['operacion'] == 'listardeportista'){
    $datosObtenidos = $deportista->listardeportista();
    if($datosObtenidos) {
      echo json_encode($datosObtenidos);
    }
  }
}
