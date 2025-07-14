<?php
session_start();

// Validar si hay sesión iniciada
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
    <title>Mantenimiento - Lista</title>
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
                require("modelo/m_mantenimiento.php");

                // REDIRECCIÓN A EDITAR
                if (isset($_REQUEST['editar'])) {
                    $id_mantenimiento = $_REQUEST['editar'];
                    echo "<script>location.href='mantenimientoEditar.php?id_mantenimiento={$id_mantenimiento}';</script>";
                }

                // ELIMINAR MANTENIMIENTO
                else if (isset($_REQUEST['eliminar'])) {
                    $id_mantenimiento = $_REQUEST['eliminar'];
                    $rpta = EliminarMantenimiento($id_mantenimiento);

                    if ($rpta === "SI") {
                        echo "<script>
                        document.addEventListener('DOMContentLoaded', function() {
                            Swal.fire({
                                icon: 'success',
                                title: '¡Eliminado!',
                                text: 'El mantenimiento fue eliminado correctamente.',
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
                                text: 'No se pudo eliminar el mantenimiento.',
                                confirmButtonColor: '#d33'
                            });
                        });
                        </script>";
                    }
                }

                // ACTUALIZAR MANTENIMIENTO
                else if (isset($_REQUEST['actualizar'])) {
                    $id_mantenimiento = $_REQUEST['id_mantenimiento'];
                    $id_seccion = $_REQUEST['id_seccion'];
                    $nombre_responsable = $_REQUEST['nombre_responsable'];
                    $nombre_equipo = $_REQUEST['nombre_equipo'];
                    $ip = $_REQUEST['ip'];
                    $tipo = $_REQUEST['tipo'];
                    $fecha_realizacion = $_REQUEST['fecha_realizacion'];
                    $observaciones = $_REQUEST['observaciones'];
                    $id_soporte_modificacion = $_SESSION['id_soporte'];
                    $fecha_modificacion = date('Y-m-d H:i:s');

                    $rpta = ActualizarMantenimiento(
                        $id_mantenimiento,
                        $id_seccion,
                        $nombre_responsable,
                        $nombre_equipo,
                        $ip,
                        $tipo,
                        $fecha_realizacion,
                        $observaciones,
                        $id_soporte_modificacion,
                        $fecha_modificacion
                    );

                    if ($rpta === "SI") {
                        echo "<script>
                        document.addEventListener('DOMContentLoaded', function() {
                            Swal.fire({
                                icon: 'success',
                                title: '¡Actualizado!',
                                text: 'El mantenimiento fue actualizado correctamente.',
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
                                text: 'No se pudo actualizar el mantenimiento.',
                                confirmButtonColor: '#d33'
                            });
                        });
                        </script>";
                    }
                }

                $mantenimientos = ListarMantenimiento();
                require("vista/v_mantenimiento_listar.php");
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
                <a class="btn btn-primary" href="login.html">Salir</a>
            </div>
        </div>
    </div>
</div>

<?php require("vista/scripts.php"); ?>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>
