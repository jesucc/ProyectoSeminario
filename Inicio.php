

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Delegaciones</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
  
</head>

<body>

<div class="container">
        <div class="resposive mt-5">
            <nav class="navbar navbar-light bg-light fixed-top">
              <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop"
                  aria-controls="offcanvasNavbar">
                  <span class="navbar-toggler-icon"></span>
                </button>

                <div  class="offcanvas offcanvas-start bg-secondary" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop" aria-labelledby="staticBackdropLabel">
                  <aria-labelledby="offcanvasNavbarLabel">

                  <div class="offcanvas-header">

                      <div class="input-group">
                          <div class="input" >
                
                              <span class="name">OLIMPIADAS</span>
                              
                          </div>
                          
                      </div>

                      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    
                  </div>
                  <div class="offcanvas-body " >
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                      <li class="nav-item">
              
                        <a class="nav-link active" aria-current="page" href="./Inicio.php"><i class='bx bx-home-alt icon' ></i>INCIO</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="./delegaciones.php"><i class='bx bx-world icon' ></i>DELEGACIONES</a>
                      </li>

                          <button type ="button" class="btn btn-outline-dark mt-5"href="./controllers/usuario.controllers.php?operacion=destroy"  id="Cerrar"> <i class='bx bx-log-out icon' ></i>CERRAR</button>
                    </ul>
                
                  </div>
                </div>

              </div>
            </nav>
        </div>
    </div>



    <hr>

    <div class="container">


   <div class="container">
     <div class="responsivo">
      <span class="text nav-text"> <i class='bx bx-medal icon' ></i>PREMIACIONES</span>
      
      <div class="col-md-12 mt-4">
        <table id="tablaPremiacion" class="table table-bordered border-black  table-striped table-hover" >
          <thead>
            <tr>
              <th>#</th>
            <th>Nombre</th>
            <th>Deportistas</th>
            <th>Entrenadores</th>
            <th>NombreDeporte</th>
            <th>Num Puesto</th>
            <th>Medalla</th>
            <th>Puntos</th>
            <th>Command</th>

            </tr>
          </thead>    
          <tbody>
            <!--asincronico-->
          </tbody>
        </table>
      </div>


    
      <!-- Modal trigger button -->
      <div class="row g-2  mt-3 ">
      <button type ="button" class="btn btn-outline-dark " data-bs-toggle="modal" data-bs-target="#modalId">
        REGISTRAR PERSONA
      </button> 
      <button type ="button" class="btn btn-outline-dark " data-bs-toggle="modal" data-bs-target="#modal">
        REGISTRAR PREMIACION
      </button>
      </div>

      
      
      <!-- Modal Body -->
      <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
      <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalTitleId">REGISTRAR PERSONSA</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-12">
                <form action="" autocomplete="off" id="Personas">
                  <div class="card">  
                    <div class="card-body">
                      <div class="mb-3">
                          <label for="apellidos" class="form-label">Apellidos</label>
                          <input type="text" id="apellidos" class="form-control form-control-sm">
                        </div>

                        <div class="mb-3">
                          <label for="nombres" class="form-label">Nombres</label>
                          <input type="text" id="nombres" class="form-control form-control-sm">
                        </div>
                        
                        <div class="mb-3">
                          <label for="documentoI" class="form-label">DocumentoI</label>
                          <input type="text" id="documentoI" class="form-control form-control-sm">
                        </div>

                        <div class="mb-3">
                          <label for="numDocumento" class="form-label">NumeroD</label>
                          <input type="text" id="numDocumento" class="form-control form-control-sm">
                        </div>

                        <div class="mb-3">
                        <label for="genero" class="form-label">Genero</label>
                        <select id="genero" class="form-select form-select-sm" autofocus>
                          <option value="">Seleccione</option>
                          <option value="M">M</option>
                          <option value="F">F</option>
                          <option value="N/O">N/O</option>

                        </select>
                      </div>
                      
                      <div class="card-footer text-muted">
                      <div class="d-grid gap-2"> 

                          <button type ="button" class="btn btn-outline-dark  " id="registrar" >Registrar</button>
                          <button type ="button" class="btn btn-outline-danger"  type="reset">Reiniciar</button>

                          
                      </div>
                      </div>
                    </div>
                </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div> 
    </div>

    <div class="modal fade" id="modal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalTitleId">REGISTRAR PREMIACION</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-12">
                <form action="" autocomplete="off" id="premiacion">
                  <div class="card">  
                    <div class="card-body">
                    <div class="mb-3">
                        <label for="idpersona" class="form-label">IdPersona</label>
                        <select id="idpersona" class="form-select form-select-sm" autofocus>
                          <option value="">Seleccione</option>
                        </select>
  
                        <div class="mb-3">
                        <label for="iddeporte" class="form-label">IdDeporte</label>
                        <select id="iddeporte" class="form-select form-select-sm" autofocus>
                          <option value="">Seleccione</option>

                        </select>
                        
                        <div class="mb-3">
                        <label for="identrenador" class="form-label">IdEntrenador</label>
                        <select id="identrenador" class="form-select form-select-sm" autofocus>
                          <option value="">Seleccione</option>

                        </select>
                        <div class="mb-3">
                        <label for="iddelegacion" class="form-label">IdDelegacion</label>
                        <select id="iddelegacion" class="form-select form-select-sm" autofocus>
                          <option value="">Seleccione</option>

                        </select>

                        <div class="mb-3">
                        <label for="idpremiacion" class="form-label">IdPremiacion</label>
                        <select id="idpremiacion" class="form-select form-select-sm" autofocus>
                          <option value="">Seleccione</option>

                        </select>
                      
                      <div class="card-footer text-muted">
                      <div class="d-grid gap-2"> 

                          <button type ="button" class="btn btn-outline-dark  " id="registrarD">Registrar</button>
                          <button type ="button" class="btn btn-outline-danger"  type="reset">Reiniciar</button>
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      </div>
                      </div>
                    </div>
                </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>    
    </div>


    
    
 </div>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>


  
    <script>
    document.addEventListener('DOMContentLoaded', () => {

        const tablaPremiacion = document.querySelector("#tablaPremiacion");
        const cuerpoTabla = tablaPremiacion.querySelector("tbody");
        const modal = new bootstrap.Modal(document.querySelector("#modalId"));
        const btGuardar = document.querySelector("#registrar");
        const GuardarP = document.querySelector("#registrarD");
        const listaP = document.querySelector("#idpersona");
        const listaD = document.querySelector("#iddeporte");
        const listaE = document.querySelector("#identrenador");
        const listaM = document.querySelector("#idpremiacion");
        const listaL= document.querySelector("#iddelegacion");
   

        function renderPremiacion(){
          const parameters = new URLSearchParams();
          parameters.append("operacion", "listarPremiacion");

          fetch("./controllers/premiacion.controller.php", {
            method: 'POST',
            body: parameters
          })
          .then(response => response.json())
          .then(datos => {
            cuerpoTabla.innerHTML = ``;
            let numeroFila = 1;
            datos.forEach(element => {
              const fila = `
              <tr>
                  <td>${numeroFila}</td>
                  <td>${element.nombre}</td>
                  <td>${element.Deportistas}</td>
                  <td>${element.Entrenador}</td>
                  <td>${element.nombreDeporte}</td>
                  <td>${element.numPuesto}</td>
                  <td>${element.medalla}</td>
                  <td>${element.puntos}</td>
                  <td>
                    <a href='#'class=' eliminar btn btn-danger btn-sm ' data-idproducto='${element.idautomovil}'>Eliminar</a>
                    <a href='#'class='editar btn btn-success btn-sm ' data-idproducto='${element.idautomovil}'>Editar</a>  
                  </td>
                </tr>
              `;
              
              cuerpoTabla.innerHTML += fila;
              numeroFila++;
            });
         
         });
        }
        
        function listaridpersona(){
          const parametros = new URLSearchParams();
          parametros.append("operacion","listaridpersona");
          
          fetch('./controllers/Rpremiacion.controller.php',{
            method: 'POST',
            body: parametros
           
          })
            .then(respuesta => respuesta.json())
            .then(datos =>{
              console.log(datos);
              datos.forEach(element => { 
                const optionTag = document.createElement("option");
                optionTag.value = element.idpersona; 
                optionTag.text = element.idpersona; 
                listaP.appendChild(optionTag);
              });
            })
        }

        
        function listarideporte(){
          const parametros = new URLSearchParams();
          parametros.append("operacion","listarideporte");
          
          fetch('./controllers/Rpremiacion.controller.php',{
            method: 'POST',
            body: parametros
           
          })
            .then(respuesta => respuesta.json())
            .then(datos =>{
              console.log(datos);
              datos.forEach(element => { 
                const optionTag = document.createElement("option");
                optionTag.value = element.iddeporte; 
                optionTag.text = element.iddeporte; 
                listaD.appendChild(optionTag);
              });
            })
        }

        function listaridentrenador(){
          const parametros = new URLSearchParams();
          parametros.append("operacion","listaridentrenador");
          
          fetch('./controllers/Rpremiacion.controller.php',{
            method: 'POST',
            body: parametros
           
          })
            .then(respuesta => respuesta.json())
            .then(datos =>{
              console.log(datos);
              datos.forEach(element => { 
                const optionTag = document.createElement("option");
                optionTag.value = element.identrenador; 
                optionTag.text = element.identrenador; 
                listaE.appendChild(optionTag);
              });
            })
        }

        function listaridpremiacion(){
          const parametros = new URLSearchParams();
          parametros.append("operacion","listaridpremiacion");
          
          fetch('./controllers/Rpremiacion.controller.php',{
            method: 'POST',
            body: parametros
           
          })
            .then(respuesta => respuesta.json())
            .then(datos =>{
              console.log(datos);
              datos.forEach(element => { 
                const optionTag = document.createElement("option");
                optionTag.value = element.idpremiacion; 
                optionTag.text = element.idpremiacion; 
                listaM.appendChild(optionTag);
              });
            })
        }

        function listariddelegacion(){
          const parametros = new URLSearchParams();
          parametros.append("operacion","listariddelegacion");
          
          fetch('./controllers/Rpremiacion.controller.php',{
            method: 'POST',
            body: parametros
           
          })
            .then(respuesta => respuesta.json())
            .then(datos =>{
              console.log(datos);
              datos.forEach(element => { 
                const optionTag = document.createElement("option");
                optionTag.value = element.iddelegacion; 
                optionTag.text = element.iddelegacion; 
                listaL.appendChild(optionTag);
              });
            })
        }


        function personaRegister(){
          if(confirm("¿Está seguro de registrar?")){
            const parametros = new URLSearchParams();
            parametros.append("operacion", "registrarPersona");

            parametros.append("apellidos", document.querySelector("#apellidos").value);
            parametros.append("nombres", document.querySelector("#nombres").value);
            parametros.append("documentoI", document.querySelector("#documentoI").value);
            parametros.append("numDocumento", document.querySelector("#numDocumento").value);
            parametros.append("genero", document.querySelector("#genero").value);

            fetch("./controllers/Rpremiacion.controller.php",{
              method: "POST",
              body: parametros
            })
            .then(response => response.json())
            .then(datos => {
              console.log(datos);
              if(datos.status){
                
                document.querySelector("#Personas").reset();
                document.querySelector("#genero").focus();
              }else{
                alert(datos.message);
              }
            });
          }
        }

        function registrarPremiacion(){
          if(confirm("¿Está seguro de registrar?")){
            const parametros = new URLSearchParams();
            parametros.append("operacion", "registrarPremiacion");

            parametros.append("idpersona", document.querySelector("#idpersona").value);
            parametros.append("iddeporte", document.querySelector("#iddeporte").value);
            parametros.append("identrenador", document.querySelector("#identrenador").value);
            parametros.append("iddelegacion", document.querySelector("#idpremiacion").value);
            parametros.append("idpremiacion", document.querySelector("#iddelegacion").value);

            fetch("./controllers/Rpremiacion.controller.php",{
              method: "POST",
              body: parametros
            })
            .then(response => response.json())
            .then(datos => {
              if(datos.status){
                
                document.querySelector("#premiacion").reset();
                renderPremiacion();
              }else{
                alert(datos.message);
              }
          });
          }
        }

      listaridpersona();
      listarideporte();
      listaridentrenador();
      listaridpremiacion();
      listariddelegacion();

      btGuardar.addEventListener("click", personaRegister);
      GuardarP.addEventListener("click", registrarPremiacion);
      renderPremiacion();
    });

    
      
  </script>
  
</body>
</html>