<?php
session_start();
require("modelo/m_usuario.php"); // Ajusta la ruta si está en otra carpeta
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SETEL 2025</title>
    <?php
        require("vista/estilos.php");
    ?>
</head>
<body>
    <style>
        .hidden {
            display: none;
        }
        .containerr {
            max-width: 1600px;
            background: #fafafa;
        }
        .inputd:disabled {
            border: none;
            background: transparent;
            color: black;
            outline: none;
        }
        .posicion {
            margin-right: 16%;
        }
    </style>
    <!-- Page Wrapper -->
    <div id="wrapper">
        <div id="content-wrapper" class="d-flex flex-column" style="
        background-color: gray;
        ">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-dark topbar static-top shadow justify-content-center">
                    <div class="navbar-brand">
                        <h2 class="text-light">SETEL - OEE</h2>
                    </div>
                </nav>
            </div>
            <div class="container containerr">
                <form action="usuarioEditar.php" method="post">
                    <div class="row mt-5 py-3">
                        <h2>Perfil</h2>
                    </div>
                    <hr>
                    
                    <div class="row">
                        <label for="nombreid">Nombres</label>
                    </div>
                    <div class="row col-3">
                        <input id="nombreid" type="text" name="nombre" class="editable form-control inputd" disabled value="<?php echo $_SESSION['nom_session']; ?>"></input>
                    </div>
                    
                    <br>
                    <br>
                    <div class="row">
                        <label for="apellidoid">Apellidos</label>
                    </div>
                    <div class="row col-3">
                        <input class="editable form-control inputd" type="text" id="apellidoid" name="apellido" disabled value="<?php echo $_SESSION['ape_session']; ?>"></input>
                    </div>
                    <br>
                    <br>
                    <div class="row">
                        <label for="nombreuid">Nombre de usuario</label>
                    </div>
                    <div class="row col-3">
                        <input class="editable form-control inputd" type="text" id="nombreuid" name="usuario" disabled value="<?php echo $_SESSION['usuario']; ?>"></input>
                    </div>
                    <br>
                    <br>
                    <div class="row">
                        <label for="contraid">Contraseña</label>
                    </div>
                    <div action="" class="row col-3">
                        <input class="editable form-control inputd" type="text" id="contraid" name="contrasena" disabled value="<?php echo $_SESSION['contrasena']; ?>"></input>
                    </div>
                    <br>
                    <div class="row py-4">
                        <div class="col-9">
                        </div>
                        <div class="col-3" style="text-align: end;">
                            <a type="button" role="button" class="btn btn-secondary button edit-btn me-5" id="editable">Editar</a>
                            <a href="inicio.php" type="button" role="button" class="btn btn-secondary" id="regresable">Regresar</a>
                            <a type="button" role="button" class="btn btn-secondary button cancel-btn hidden" id="cancelable">Cancelar</a>
                            <button type="submit" role="button" name="actualizar" class="btn btn-secondary button save-btn hidden" id="guardable">Guardar</button>
                        </div>
                    </div>
                </form>
                <br>
                <br>
                <br>
                <br>
                <br>
            </div>
            <footer class="sticky-footer bg-white">
                <div class=" my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Página protegida por derechos de auto 2025</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <?php
        require("vista/scripts.php");
    ?>
</body>

</html>