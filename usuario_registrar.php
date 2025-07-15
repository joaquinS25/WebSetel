<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>REGISTRO DE USUARIO</title>
    <?php
    require("vista/estilos.php");
    ?>
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <?php
        require("vista/menuv.php");
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->

        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-dark topbar mb-4 static-top shadow">
                    <?php
                    require("vista/buzqueda.php");
                    require("vista/menuh.php");
                    ?>
                    <!-- End of Topbar -->
                    <main>
                        <?php
                        require("modelo/m_usuario.php");

                        if (isset($_REQUEST['registrar'])) {
                            $nombre = $_REQUEST['nombre'];
                            $apellido = $_REQUEST['apellido'];
                            $usuario = $_REQUEST['usuario'];
                            $contrasena = $_REQUEST['contrasena'];
                            $id_rol = $_REQUEST['id_rol'];

                            $rpta = RegistrarUsuario($nombre, $apellido, $usuario, $contrasena, $id_rol);  

                            if ($rpta == "SI") {
                        ?>
                                <script type="text/javascript">
                                    location.href = "usuario_listar.php";
                                    echo("REGISTRADO CON EXITO");
                                </script>
                        <?php
                            }
                        }
                        require("vista/v_usuario_registrar.php");
                        ?>

                    </main>
                    <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>2025 &copy; Oficina de Economía del Ejercito.</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->


    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Seleccione "Salir" para finalizar su sesión.</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Seleccione "Salir" para finalizar su sesión.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="cerrar_session.php">Salir</a>
                </div>
            </div>
        </div>
    </div>


    <?php
    require("vista/scripts.php");
    ?>

</body>

</html>