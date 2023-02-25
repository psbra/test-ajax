<!DOCTYPE html>
<html lang="en">
<head>

    <!--
        Direcciones:
        Repo: git clone https://github.com/psbra/test-ajax.git
        CDNS: https://cdnjs.com/
        Ejemplos sweetAlert: https://blog.endeos.com/demo/sweetalert/index.htm
    -->


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo Ajax</title>

    <!-- LIBRERIAS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css" integrity="sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js" integrity="sha512-1/RvZTcCDEUjY/CypiMz+iqqtaoQfAITmNSJY17Myp4Ms5mdxPS5UV7iOfdZoxcGhzFbOm6sntTKJppjvuhg4g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- FIN LIBRERIAS -->

    <!-- ESTILOS -->
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    <link href="sign-in.css" rel="stylesheet">
    <!-- FI ESTILOS -->

    <!-- JAVASCRIPT -->
    <script>
        $(document).ready(function() {
            
            err=0;

            $("#btnLogin").click(function() {
                event.preventDefault();

                _usuario = $("#usuario").val();
                _pass = $("#clave").val();


                if (_usuario.length <= 0 || _pass.length <= 0) {
                    swal("Error", "Usuario o password vacios", "error");
                    err=1;
                }


                if (err == 0) {

                    $.ajax({
                        url: "respuesta.php",
                        method: "POST",
                        data: {
                            usuario: _usuario,
                            password: _pass
                        },
                        success: function(res) {
                            console.log(res.status);
                            if (res.status == 'ERROR') {
                                swal(res.status, res.message, "error");
                            } else {
                                swal("¡Bienvenido!", `Usuario ${res.message} !`, "success");              
                            }
                        }
                    });

                }

                
            });

        });
    </script>
    <!-- FIN JAVASCRIPT -->

    
</head>
<body>    
    <main class="form-signin w-100 m-auto">
    <form>        
        <h1 class="h3 mb-3 fw-normal">Login del Pablito</h1>

        <div class="form-floating">
        <input type="text" class="form-control" id="usuario" placeholder="usuario">
        <label for="usuario">Usaurio</label>
        </div>
        <div class="form-floating">
        <input type="password" class="form-control" id="clave" placeholder="Password">
        <label for="clave">Password</label>
        </div>

        
        <button class="w-100 btn btn-lg btn-primary" id="btnLogin" type="submit">Login</button>
        
    </form>
    </main>
</body>
</html>