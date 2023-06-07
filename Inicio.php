

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

       <div class="row mt-3">
          

      <div class="col-md-8">
        <div class="card">
          <div class="card-body"> 
          <span class="text" style="font-size:25px;" > <i class='bx bx-medal icon'  ></i>PREMIAR DEPORTISTA</span>
           <hr>
        
          
          <div class="input-group mt-4 mr-4">
          <button type ="button" class="btn btn-outline-dark btn-sm" id="exportar" data-bs-toggle="modal" data-bs-target="#modalId"> + AGREGAR PREMIACIÓN</button>
  
          </div>
        
        </div>
        </div>
        
      </div>

      <div class="col-md-4">
            <div class="card">
                <div class="card-body"> 
                  <span class="text" style="font-size:25px;"> <i class='bx bx-world icon' ></i>BUSCAR OLIMPIADA</span>

                  <hr>
                  <div class="input-group">

                      <div class="form-floating">
                        <select class="form-select" id="olimpiada">
                          <option selected>Seleccione</option>
                        </select>
                        <label for="">Olimpiada</label>
                      </div> 
                  </div>

                </div>
            </div>
          </div>
    </div>
    

    <div class="row mt-3">

      <table id="tablaPremiacion" class="table table-bordered border-black  table-striped table-hover" >
        <thead>
        <th>#</th>
            <th>Olimpiada</th>
            <th>Delegación</th>
            <th>Deportista</th>
            <th>Deporte</th>
            <th>Medalla</th>
            <th>Puesto</th>
            <th>Fecha</th>
        </thead>
        <tbody>

        </tbody>
      </table>
     </div>

     

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
                <form action="" autocomplete="off" id="premiaciones">
                  <div class="card">  
                    <div class="card-body">
                      <div class="mb-3">
                      <div class="input-group">

                      <div class="form-floating">
                        <select class="form-select" id="deportista">
                          <option selected>Seleccione</option>
                        </select>
                        <label for="">Deportista</label>
                      </div> 
                  </div>
                        </div>

                        <div class="mb-3">
                        <div class="input-group">

                        <div class="form-floating">
                          <select class="form-select" id="premiacion">
                            <option selected>Seleccione</option>
                          </select>
                          <label for="">Malla</label>
                        </div> 

                      
                        </div>
                        </div>
                        
                        <div class="mb-3">
                          <div class="input-group">

                          <div class="form-floating">
                            <select class="form-select" id="entrenador">
                              <option selected>Seleccione</option>
                            </select>
                            <label for="">Entrenador</label>
                          </div> 

                    
                          </div>
                        </div>
                      
                      <div class="card-footer text-muted">
                      <div class="d-grid gap-2"> 

                          <button type ="button" class="btn btn-outline-dark  " id="guardar" >Registrar</button>
                          

                          
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
  <div class="container">
  <div class="modal fade" id="modaldeportes" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalTitleId">REGISTRAR PERSONSA</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-12">
                <form action="" autocomplete="off" id="premiacion">
                  <div class="card">  
                    <div class="card-body">
                      <div class="mb-3">
                      <div class="input-group">

                      <div class="form-floating">
                        <select class="form-select" id="deportista">
                          <option selected>Seleccione</option>
                        </select>
                        <label for="">Deportista</label>
                      </div> 

                    <button type ="button" class="btn btn-outline-dark btn-sm" id="exportar">+</button>
                  </div>
                        </div>

                        <div class="mb-3">
                        <div class="input-group">

                        <div class="form-floating">
                          <select class="form-select" id="publishers">
                            <option selected>Seleccione</option>
                          </select>
                          <label for="">Malla</label>
                        </div> 

                        <button type ="button" class="btn btn-outline-dark btn-sm" id="exportar">AGREGAR PREMIACIÓN</button>
                        </div>
                        </div>
                        
                        <div class="mb-3">
                          <div class="input-group">

                          <div class="form-floating">
                            <select class="form-select" id="publishers">
                              <option selected>Seleccione</option>
                            </select>
                            <label for="">Entrenador</label>
                          </div> 

                          <button type ="button" class="btn btn-outline-dark btn-sm" id="exportar">+</button>
                          </div>
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
        const btGuardar = document.querySelector("#guardar");
        const lista = document.querySelector("#olimpiada");
        const listaD = document.querySelector("#deportista");
        const listaP = document.querySelector("#premiacion");
        const listaE = document.querySelector("#entrenador");
   
   

        function obtenerolimpiada(){
          const parametros = new URLSearchParams();
          parametros.append("operacion","listarolimpiada");
           
          fetch('./controllers/olimpiada.php',{
            method: 'POST',
            body: parametros
          })
            .then(respuesta => respuesta.json())
            .then(datos =>{
              console.log(datos);
              datos.forEach(element => { //recorre
                const optionTag = document.createElement("option");
                optionTag.value = element.idolimpiada; 
                optionTag.text = element.nombre; 
                lista.appendChild(optionTag);
              });
            })
        }
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
                  <td>${element.Olimpiada}</td>
                  <td>${element.Delegaciones}</td>
                  <td>${element.Deportista}</td>
                  <td>${element.nombreDeporte}</td>
                  <td>${element.medalla}</td>
                  <td>${element.numPuesto}</td>
                  <td>${element.fechaP}</td>
                  
                </tr>
              `;
              
              cuerpoTabla.innerHTML += fila;
              numeroFila++;
            });
         
         });
        }
        
        function listardeportista(){
          const parametros = new URLSearchParams();
          parametros.append("operacion", "listardeportista");

          fetch('./controllers/deportista.php', {
            method: 'POST',
            body: parametros
          })
            .then(respuesta => respuesta.json())
            .then(datos  =>{
              console.log(datos);
                datos.forEach(element => { //recorre
                const optionTag = document.createElement("option");
                optionTag.value = element.idpersona; 
                optionTag.text = element.deportista; 
                listaD.appendChild(optionTag);
              });
            })
        }
        
        function listarentrenador(){
          const parametros = new URLSearchParams();
          parametros.append("operacion", "listarentrenador");

          fetch('./controllers/entrenador.php', {
            method: 'POST',
            body: parametros
          })
            .then(respuesta => respuesta.json())
            .then(datos  =>{
              console.log(datos);
                datos.forEach(element => { //recorre
                const optionTag = document.createElement("option");
                optionTag.value = element.identrenador; 
                optionTag.text = element.entrenador; 
                listaE.appendChild(optionTag);
              });
            })
        }


        function listarpremiacion(){
          const parametros = new URLSearchParams();
          parametros.append("operacion", "listarpremiacion");

          fetch('./controllers/premiaciones.php', {
            method: 'POST',
            body: parametros
          })
            .then(respuesta => respuesta.json())
            .then(datos  =>{
              console.log(datos);
                datos.forEach(element => { //recorre
                const optionTag = document.createElement("option");
                optionTag.value = element.idpremiacion; 
                optionTag.text = element.medalla; 
                listaP.appendChild(optionTag);
              });
            })
        }

        function registrarPremiacion(){
          if(confirm("¿Está seguro de registrar?")){
            const parametros = new URLSearchParams();
            parametros.append("operacion", "registrarPremiacion");

            parametros.append("idpersona", document.querySelector("#deportista").value);
            parametros.append("idpremiacion", document.querySelector("#premiacion").value);
            parametros.append("identrenador", document.querySelector("#entrenador").value);

            fetch("./controllers/Rpremiacion.controller.php",{
              method: "POST",
              body: parametros
            })
            .then(response => response.json())
            .then(datos => {
              console.log(datos);
              if(datos.status){
                 renderPremiacion();
                document.querySelector("#premiaciones").reset();
               
              }else{
                alert(datos.message);
              }
          });
          }
        }



      lista.addEventListener("change",renderPremiacion);

      btGuardar.addEventListener("click", registrarPremiacion);
      
      listarentrenador();
      listarpremiacion();
      listardeportista();
      obtenerolimpiada();
    });

    
      
  </script>
  
</body>
</html>