<?php
session_start();
require("modelo/m_incidencias.php");

$mensaje = null;

if (isset($_POST['registrar'])) {
    $id_seccion = $_POST['id_seccion'];
    $nombre_afectado = $_POST['nombre_afectado'];
    $problema = $_POST['problema'];
    $tipo = $_POST['tipo'];
    $estado = $_POST['estado'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_culminacion = $_POST['fecha_culminacion'];
    $observaciones = $_POST['observaciones'];
    $id_soporte = $_SESSION['id_soporte'];

    $rpta = RegistrarIncidencia($id_seccion, $nombre_afectado, $problema, $tipo, $estado, $fecha_inicio, $fecha_culminacion, $observaciones, $id_soporte);

    $mensaje = ($rpta == "SI") ? "ok" : "error";
}
?>
<!-- resto del HTML lo puedes mantener, actualizando los nombres de campo en el formulario -->


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Registrar Incidencia</title>
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
                    <?php require("vista/v_incidencia_registrar.php"); ?>
                </main>
            </div>

            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>2025 &copy; Oficina de Economía del Ejército.</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Modal logout -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">¿Seguro que quiere salir?</h5>
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

    <?php if (isset($mensaje)): ?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            <?php if ($mensaje === "ok"): ?>
                Swal.fire({
                    icon: 'success',
                    title: 'Registro exitoso',
                    text: 'Incidencia registrada correctamente',
                    confirmButtonText: 'Aceptar'
                }).then(() => {
                    window.location.href = 'Incidencia.php';
                });
            <?php else: ?>
                Swal.fire({
                    icon: 'error',
                    title: 'Error al registrar',
                    text: 'Hubo un problema al registrar el mantenimiento'
                });
            <?php endif; ?>
        </script>
    <?php endif; ?>
</body>
</html>
