<?php
require_once '../models/Premiacion.php';

if (isset($_POST['operacion'])){

  $premiacion = new Premiacion();

  if ($_POST['operacion'] == 'listarPremiacion'){

    $datosObtenidos = $premiacion->listarPremiacion();
    if ($datosObtenidos){
      echo json_encode($datosObtenidos);
    }
  }

}