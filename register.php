<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary" style="
display: flex;
justify-content: center;
align-items: center;
height: 100vh;
background-image: url(https://ojo-publico.com/sites/default/files/pentagonito2.jpg);
background-repeat: no-repeat;
background-position: center;
background-attachment: fixed;
background-size: cover;
">

    <div class="container">
        <div class="row justify-content-center">
            <div class="card o-hidden border-0 shadow-lg my-5 col-xl-6" style="border-radius: 8%; background: linear-gradient(135deg, #001F3F, #0074D9); box-shadow: 5px 5px 10px black;">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-3 d-none d-lg-block bg-register-image"></div>
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-black-50 mb-4">Crear cuenta</h1>
                                </div>
                                <form class="user">
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="text" class="form-control form-control-user" id="nombresc"
                                                placeholder="Nombres Completos">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control form-control-user" id="apellidosc"
                                                placeholder="Apellidos Completos">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="nombreu"
                                            placeholder="Nombre de usuario">
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password" class="form-control form-control-user"
                                                id="contra" placeholder="Contraseña">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="password" class="form-control form-control-user"
                                                id="contrac" placeholder="Confirmar contraseña">
                                        </div>
                                    </div>
                                    <a href="login.php" class="btn btn-primary btn-user btn-block disabled" id="enviar2">
                                        Registrarse
                                    </a>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="forgot-password.php">¿Olvidaste tu contraseña?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="login.php">¿Ya tienes una cuenta? Inicia Sesión.</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js/demo/validacion.js" defer></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <?php
        require("vista/scripts.php");
    ?>
</body>

</html>