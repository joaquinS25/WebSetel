<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Parque Informático - Contabilidad</title>
    <?php require("vista/estilos.php"); ?>
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <?php require("vista/menuv.php"); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-dark topbar mb-4 static-top shadow">
                    <?php
                    require("vista/buzqueda.php");
                    require("vista/menuh.php");
                    ?>
                </nav>

                <main>
                    <?php
                    require("modelo/m_servidores.php");

                    if (isset($_REQUEST['registrar'])) {
                        $nombre_servidor = $_REQUEST['nombre_servidor'];
                        $user = $_REQUEST['user'];
                        $contrasena = $_REQUEST['contrasena'];
                        $descripcion = $_REQUEST['descripcion'];
                        $usuario_soporte = $_SESSION['usuario']; // se guarda automáticamente

                        $rpta = RegistrarServidor($nombre_servidor, $user, $contrasena, $descripcion, $usuario_soporte);

                        if ($rpta == "SI") {
                            echo "<script>location.href='servidores.php';</script>";
                        }
                    }

                    require("vista/v_servidores_registrar.php");
                    ?>
                </main>
            </div>

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>2025 &copy; Oficina de Economía del Ejército.</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Logout Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Seleccione "Salir" para finalizar su sesión.</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Seleccione "Salir" para finalizar su sesión.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="login.php">Salir</a>
                </div>
            </div>
        </div>
    </div>

    <?php require("vista/scripts.php"); ?>
</body>
</html>
