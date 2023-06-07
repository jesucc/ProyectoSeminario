<?php

require_once '../models/Olimpiada.php';

if(isset($_POST['operacion'])){
                                    
  $olimpiada= new Olimpiada();

  if($_POST['operacion'] == 'listarolimpiada'){
    $datosObtenidos = $olimpiada->listarolimpiada();
    if($datosObtenidos) {
      echo json_encode($datosObtenidos);
    }
  }



}
