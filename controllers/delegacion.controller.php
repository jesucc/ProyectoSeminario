<?php

require_once '../models/Delegacion.php';

if(isset($_POST['operacion'])){
                                    
  $delegacion = new Delegacion();

  if($_POST['operacion'] == 'listarDelegaciones'){

    $datos = $delegacion->listarDelegaciones($_POST['iddelegacion']);
    if($datos){
      echo json_encode($datos);
    }
  }

  if ($_POST['operacion'] == 'listarNdelegaciones'){

    $datosObtenidos = $delegacion->listarNdelegaciones();
    if ($datosObtenidos){
      echo json_encode($datosObtenidos);
    }
  }



}
