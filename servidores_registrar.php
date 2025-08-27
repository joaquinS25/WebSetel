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

                <main class="container-fluid">
                    <?php
                    require("modelo/m_servidores.php");

                    if (isset($_REQUEST['registrar'])) {
                        // ✅ Recibimos valores del formulario
                        $modelo_servidor   = $_REQUEST['modelo_servidor'];
                        $procesador        = $_REQUEST['procesador'];
                        $cant_procesador   = $_REQUEST['cant_procesador'];
                        $cant_cpu          = $_REQUEST['cant_cpu'];
                        $ram               = $_REQUEST['ram'];
                        $total             = $_REQUEST['total'];
                        $fisico            = $_REQUEST['fisico'];
                        $logico            = $_REQUEST['logico'];
                        $nombre_equipo     = $_REQUEST['nombre_equipo'];
                        $ip                = $_REQUEST['ip'];
                        $tipo_servidor     = $_REQUEST['tipo_servidor'];
                        $nombre_usuario    = $_REQUEST['nombre_usuario'];
                        $contrasena        = $_REQUEST['contrasena'];
                        $origen            = $_REQUEST['origen'];
                        $so                = $_REQUEST['so'];
                        $utilidad          = $_REQUEST['utilidad'];

                        // ✅ Usuario que está logeado (se guarda en sesión)
                        $usuario_soporte   = $_SESSION['usuario'];

                        // ✅ Registrar en BD
                        $rpta = RegistrarServidor(
                            $modelo_servidor, $procesador, $cant_procesador, $cant_cpu, $ram, $total, $fisico, $logico,
                            $nombre_equipo, $ip, $tipo_servidor, $nombre_usuario, $contrasena, $origen, $so, $utilidad,
                            $usuario_soporte
                        );

                        if ($rpta == "SI") {
                            echo "<script>location.href='servidores.php';</script>";
                        } else {
                            echo "<div class='alert alert-danger'>❌ Error al registrar servidor</div>";
                        }
                    }

                    // ✅ Mostrar formulario de registro (sin ID ni fechas)
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
