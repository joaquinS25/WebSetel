<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Iniciar Sesión</title>

    <!-- Fuentes y estilos -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Estilos personalizados -->
    <style>
        body {
            background-image: url(https://ojo-publico.com/sites/default/files/pentagonito2.jpg);
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.5);
        }

        .login-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .login-header img {
            height: 80px;
            margin-bottom: 10px;
        }

        .login-header h2 {
            color: #fff;
            font-weight: bold;
            font-size: 20px;
            margin: 0;
        }

        .form-control {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
        }

        .btn-primary {
            background-color: #003366;
            border-color: #003366;
            border-radius: 10px;
            font-weight: bold;
        }

        .btn-primary:hover {
            background-color: #00509d;
            border-color: #00509d;
        }

        .text-center a {
            color: #ffffff;
        }

        .text-center a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 col-md-10">
                <div class="card login-card">
                    <div class="login-header">
                        <!-- Logo del Ejército del Perú -->
                        <img src="img/logo.png" alt="Logo Ejército del Perú">
                        <h2>OFICINA DE ECONOMÍA DEL EJÉRCITO</h2>
                        <p class="text-white">Seccion Telematica</p>
                    </div>
                    <div class="card-body">
                        <form action="autentificacion.php" method="post" class="user">
                            <div class="form-group">
                                <input type="text" name="user" class="form-control form-control-user"
                                    placeholder="Nombre de usuario" required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="pass" class="form-control form-control-user"
                                    placeholder="Contraseña" required>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox small">
                                    <input type="checkbox" class="custom-control-input" id="customCheck">
                                    <label class="custom-control-label text-white" for="customCheck">Recordarme</label>
                                </div>
                            </div>
                            <button type="submit" name="ingresar" class="btn btn-primary btn-user btn-block">
                                Acceder
                            </button>
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

    <!-- Scripts -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <script src="js/demo/validacion.js" defer></script>
    <?php require("vista/scripts.php"); ?>
</body>

</html>
