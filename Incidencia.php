<?php
session_start();
if (!isset($_SESSION['id_soporte'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Incidencias - Lista</title>
    <?php require("vista/estilos.php"); ?>
</head>
<body id="page-top">

    <div id="wrapper">
        <?php require("vista/menuv.php"); ?>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-dark topbar mb-4 static-top shadow">
                    <?php
                    require("vista/buzqueda.php");
                    require("vista/menuh.php");
                    ?>
                </nav>

                <main>
                <?php
                    require("modelo/m_incidencias.php");

                    // REDIRECCIÓN A EDITAR (si usas una vista aparte)
                    if (isset($_REQUEST['editar'])) {
                        $id_incidencia = $_REQUEST['editar'];
                        echo "<script>location.href='incidenciaEditar.php?id_incidencia={$id_incidencia}';</script>";
                    }

                    // ELIMINAR INCIDENCIA
                    else if (isset($_REQUEST['eliminar'])) {
                        $id_incidencia = $_REQUEST['eliminar'];
                        $rpta = EliminarIncidencia($id_incidencia);

                        if ($rpta === "SI") {
                            echo "<script>
                            document.addEventListener('DOMContentLoaded', function() {
                                Swal.fire({
                                    icon: 'success',
                                    title: '¡Eliminado!',
                                    text: 'La incidencia fue eliminada correctamente.',
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
                                    text: 'No se pudo eliminar la incidencia.',
                                    confirmButtonColor: '#d33'
                                });
                            });
                            </script>";
                        }
                    }

                    // ACTUALIZAR INCIDENCIA
                    else if (isset($_REQUEST['actualizar'])) {
                        $id_incidencia = $_REQUEST['id_incidencia'];
                        $id_seccion = $_REQUEST['id_seccion'];
                        $nombre_afectado = $_REQUEST['nombre_afectado'];
                        $problema = $_REQUEST['problema'];
                        $fecha_inicio = $_REQUEST['fecha_inicio'];
                        $observaciones = $_REQUEST['observaciones'];
                        $id_soporte = $_SESSION['id_soporte'];

                        $rpta = ActualizarIncidencia(
                            $id_incidencia,
                            $id_seccion,
                            $nombre_afectado,
                            $problema,
                            $fecha_inicio,
                            $observaciones,
                            $id_soporte
                        );

                        if ($rpta === "SI") {
                            echo "<script>
                            document.addEventListener('DOMContentLoaded', function() {
                                Swal.fire({
                                    icon: 'success',
                                    title: '¡Actualizado!',
                                    text: 'La incidencia fue actualizada correctamente.',
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
                                    text: 'No se pudo actualizar la incidencia.',
                                    confirmButtonColor: '#d33'
                                });
                            });
                            </script>";
                        }
                    }

                    $incidencias = ListarIncidencias();
                    require("vista/v_incidencia_listar.php");
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
                    <a class="btn btn-primary" href="login.php">Salir</a>
                </div>
            </div>
        </div>
    </div>

    <?php require("vista/scripts.php"); ?>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>
