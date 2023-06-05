

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

                      <button type ="button" class="btn btn-outline-dark mt-5"href="./controllers/usuario.controllers.php?operacion=destroy" id="Cerrar"> <i class='bx bx-log-out icon' ></i>CERRAR</button>
                    </ul>
                
                  </div>
                </div>

              </div>
            </nav>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    <br>
    <br>
    <div class="container">
      <div class="responsive">
      <span class="text nav-text"> <i class='bx bx-world icon' ></i>DELEGACIONES</span>
      <div class="row">
        <div class="card-body">
              <div class="row">
                <div class="col-md mt-3 ">
                  <div class="form-floating">
                    <select class="form-select" id="nomDelegacion">
                      <option selected>Seleccione</option>
                    </select>
                    <label for="">Delegacion</label>
                  </div> 
                </div>
          
              </div>
              <div class="row g-0 mt-3">
                  <button type ="button" class="btn btn-outline-danger" id="exportar">Exportar PDF</button>
              </div>
              <hr>
              <div class="row mt-3">
                <div class="col-md-12">
                  <table id="tablaFiltro" class="table table-bordered border-black  table-striped table-hover" >
                    <thead class="table-dark" >
                      <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Color piel</th>
                        <th>Genero</th>
                        <th>Altura</th>
                      </tr>
                    </thead>
                    <tbody>
                      <!--asincronico-->
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     
    </div>
 
  
    <script>
    document.addEventListener('DOMContentLoaded', () => {

      const exportarPDF = document.querySelector('#exportar');
      const tablaFiltro = document.querySelector("#tablaFiltro");
      const cuerpoTabla = document.querySelector('tbody');
      const lista = document.querySelector("#nomDelegacion");


      function listarNDelegaciones(){
          const parametros = new URLSearchParams();
          parametros.append("operacion","listarNdelegaciones");
          
          fetch('./controllers/delegacion.controller.php',{
            method: 'POST',
            body: parametros
           
          })
            .then(respuesta => respuesta.json())
            .then(datos =>{
             
              datos.forEach(element => { //recorre
                const optionTag = document.createElement("option");
                optionTag.value = element.iddelegacion; 
                optionTag.text = element.nombre; 
                lista.appendChild(optionTag);
              });
            })
      }

      function obtenerDelegaciones(){
        const parametros = new URLSearchParams();
        parametros.append("operacion","listarDelegaciones");
        parametros.append("iddelegacion", parseInt(lista.value));

        fetch('./controllers/delegacion.controller.php',{
            method: 'POST',
            body: parametros
        })
          .then(respuesta => respuesta.json())
          .then(datos =>{
            console.log(datos);

          });
      }


      //Evento
      lista.addEventListener("change",obtenerDelegaciones);

      
      listarNDelegaciones();
    });

    
      
  </script>



  
</body>
</html>