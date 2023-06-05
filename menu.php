
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="resposive">
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

                      <button type ="button" class="btn btn-outline-dark mt-5" href="./controllers/usuario.controllers.php?operacion=destroy" id="Cerrar"> <i class='bx bx-log-out icon' ></i>CERRAR</button>
                    </ul>
                
                  </div>
                </div>

              </div>
            </nav>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>