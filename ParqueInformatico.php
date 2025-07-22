<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Parque Informático - Lista</title>
    <?php require("vista/estilos.php"); ?>
</head>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php require("vista/menuv.php"); ?>
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
                </nav>

                <main>
                <?php
                    require("modelo/m_parque.php");

                    if (isset($_REQUEST['editar'])) {
                        $id_equipo = $_REQUEST['editar'];
                        echo "<script>location.href='parqueInformaticoEditar.php?id_equipo={$id_equipo}';</script>";
                    }

                    // ELIMINAR
                    else if (isset($_REQUEST['eliminar'])) {
                        $id_equipo = $_REQUEST['eliminar'];
                        $rpta = EliminarParque($id_equipo);

                        if ($rpta === "SI") {
                            echo "<script>
                            document.addEventListener('DOMContentLoaded', function() {
                                Swal.fire({
                                    icon: 'success',
                                    title: '¡Eliminado!',
                                    text: 'El registro fue eliminado correctamente.',
                                    confirmButtonColor: '#3085d6'
                                });
                            });
                            </script>";
                        } else {
                            echo "<script>
                            document.addEventListener('DOMContentLoaded', function() {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'No se pudo eliminar el registro.',
                                    confirmButtonColor: '#d33'
                                });
                            });
                            </script>";
                        }
                    }

                    // ACTUALIZAR
                    else if (isset($_REQUEST['actualizar'])) {
                        $id_equipo = $_REQUEST['id_equipo'];
                        $tipo_producto = $_REQUEST['tipo_producto'];
                        $nsg = $_REQUEST['nsg'];
                        $descripcion = $_REQUEST['descripcion'];
                        $nombre_equipo = $_REQUEST['nombre_equipo'];
                        $ip = $_REQUEST['ip'];
                        $id_seccion = $_REQUEST['seccion'];
                        $responsable = $_REQUEST['responsable'];
                        $antivirus_instalado = $_REQUEST['antivirus_instalado'];
                        $antivirus_activo = $_REQUEST['antivirus_activo'];

                        $rpta = ActualizarParque($id_equipo, $tipo_producto, $nsg, $descripcion, $nombre_equipo, $ip, $id_seccion, $responsable, $antivirus_instalado, $antivirus_activo);

                        if ($rpta === "SI") {
                            echo "<script>
                            document.addEventListener('DOMContentLoaded', function() {
                                Swal.fire({
                                    icon: 'success',
                                    title: '¡Actualizado!',
                                    text: 'El equipo fue actualizado correctamente.',
                                    confirmButtonColor: '#3085d6'
                                });
                            });
                            </script>";
                        } else {
                            echo "<script>
                            document.addEventListener('DOMContentLoaded', function() {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'No se pudo actualizar el equipo.',
                                    confirmButtonColor: '#d33'
                                });
                            });
                            </script>";
                        }
                    }

                    $parque = ListarParque();
                    require("vista/v_parque_listar.php");
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

    <!-- Modal de salida -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Seguro que quiere salir?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Seleccione "Salir" para finalizar su sesión.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="index.php">Salir</a>
                </div>
            </div>
        </div>
    </div>

    <?php require("vista/scripts.php"); ?>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>
