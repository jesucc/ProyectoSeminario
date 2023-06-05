
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>



  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  
  <link href="style.css" rel="stylesheet" >

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
</head>
<body>

    <style>
        .bold{
            font-weight: bold;
        }
    </style>
    
  <div class="container">
    <div class="row">
      <div class="card-body">
          <div class="card-body">
            <form class="mx-auto" action="" autocomplete="off">
              <h4 class="text-center">Inicio Sesion</h4>
              <div class="mb-3 mt-5">
                <label  class="form-label bold" for="email">NOMBRE USUARIO:</label>
                <input  class="form-control" type="email" id="email" placeholder="ejemplo@correo.com" autofocus>
              </div>

              <div class="mb-3">
                <label  class="form-label bold" for="password">CONTRASEÑA: </label>
                <input class="form-control" type="password"  placeholder="contraseña" id="password">
              </div>

              <button class="btn btn-outline-secondary mt-3" id="iniciar-sesion" type="button" >Inicar Sesion</button>
              <button class="btn btn-outline-danger mt-2" type="reset">Cancelar</button>
            </form>
          </div>
      </div>
    </div>
  </div> 

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

  

  <script>
    $(document).ready(function (){

      function login(){
        const datos= {
          "operacion"     : "iniciarSesion",
          "email"         : $("#email").val(),
          "password"      : $("#password").val()
        };

        $.ajax({
          url: 'controllers/usuario.controller.php',
          type: 'GET',
          data: datos,
          dataType: 'JSON',
          success: function (result){
            if (result.login){
              Swal.fire({
                title: "Inicio Correctamente" ,
                text: `${result.nombreusuario}`,
                icon:   "success",
                allowOutsideClick: false,

                
              }).then((result) => {
                window.location.href = `Inicio.php`;
               });
        
            }else{
              Swal.fire({
                title: (result.mensaje),
                icon: "error",
              });
               
            }
          }
        });
      }

      $("#iniciar-sesion").click(login);

      $("#password").keypress(function (evt){
        if(evt.keyCode == 13){
          login();
        }
      });

    });
  </script>
  
</body>
</html>

