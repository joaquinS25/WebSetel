<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Iniciar Sesión</title>

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
<style>

    input:focus:invalid {
        outline: 2px gradient red; /* Resalta el input si está vacío y tiene focus */
    }
</style>
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-12 col-md-10">

                <div class="card o-hidden border-0 my-5" style="border-radius: 8%; background: linear-gradient(135deg, #001F3F, #0074D9); box-shadow: 5px 5px 10px black;">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-3 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-black-50 mb-4"><strong>Iniciar Sesión</strong></h1>
                                    </div>
                                    <form action="autentificacion.php" method="post" class="user">
                                        <div class="form-group">
                                            <input type="text" id="nombreu" name="user" class="form-control form-control-user input"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Nombre de usuario" value="">
                                        </div>
                                        <div class="form-group">
                                            <input id="contra" type="password" name="pass" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Contraseña">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Recordar</label>
                                            </div>
                                        </div>
                                        <!--a href="index.php" class="btn btn-primary btn-user btn-block disabled" id="enviar">Acceder</a-->
                                        <button class="btn btn-primary btn-user btn-block disabled" id="enviar" name="ingresar">Acceder</button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.php"><strong>¿Olvidaste tu contraseña?</strong></a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.php"><strong>Crear una cuenta nueva</strong></a>
                                    </div>
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