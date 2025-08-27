<?php
session_start();
require("modelo/m_servidores.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Lista de Servidores</title>
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
                // Si se presiona el botón editar
                if (isset($_REQUEST['editar'])) {
                    $id_credencial = $_REQUEST['editar'];
                    echo "<script>location.href='servidorEditar.php?id_credencial={$id_credencial}';</script>";
                }

                /* ===================== ELIMINAR ===================== */
                    if (isset($_POST['eliminar'])) {
                        $id_credencial = $_POST['eliminar'];
                        $rpta = EliminarServidor($id_credencial);

                        if ($rpta === "SI") {
                            echo "<script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    Swal.fire({icon:'success',title:'¡Eliminado!',text:'El registro fue eliminado correctamente.',confirmButtonColor:'#3085d6'});
                                });
                            </script>";
                        } else {
                            echo "<script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    Swal.fire({icon:'error',title:'Error',text:'No se pudo eliminar el registro.',confirmButtonColor:'#d33'});
                                });
                            </script>";
                        }
                    }

                // Si se presiona el botón actualizar
                if (isset($_POST['actualizar'])) {
                    $id_credencial       = $_POST['id_credencial'];

                    // ✅ Todos los campos de la tabla
                    $modelo_servidor   = $_POST['modelo_servidor'];
                    $procesador        = $_POST['procesador'];
                    $cant_procesador   = $_POST['cant_procesador'];
                    $cant_cpu          = $_POST['cant_cpu'];
                    $ram               = $_POST['ram'];
                    $total             = $_POST['total'];
                    $fisico            = $_POST['fisico'];
                    $logico            = $_POST['logico'];
                    $nombre_equipo     = $_POST['nombre_equipo'];
                    $ip                = $_POST['ip'];
                    $tipo_servidor     = $_POST['tipo_servidor'];
                    $nombre_usuario    = $_POST['nombre_usuario'];
                    $contrasena        = $_POST['contrasena'];
                    $origen            = $_POST['origen'];
                    $so                = $_POST['so'];
                    $utilidad          = $_POST['utilidad'];

                    $usuarioSoporte    = $_SESSION['usuario'];

                    // ✅ Llamada al modelo con todos los campos
                    $resultado = ActualizarServidor(
                        $id_credencial,
                        $modelo_servidor, $procesador, $cant_procesador, $cant_cpu, $ram, $total, $fisico, $logico,
                        $nombre_equipo, $ip, $tipo_servidor, $nombre_usuario, $contrasena, $origen, $so, $utilidad,
                        $usuarioSoporte
                    );

                    if ($resultado === "SI") {
                        echo "<script>
                            Swal.fire({
                                icon: 'success',
                                title: 'Actualizado',
                                text: 'Datos actualizados correctamente',
                                timer: 1500,
                                showConfirmButton: false
                            }).then(() => {
                                location.href = 'servidores.php';
                            });
                        </script>";
                    } else {
                        echo "<script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'No se pudieron actualizar los datos'
                            });
                        </script>";
                    }
                }

                // ✅ Listar todos los servidores
                $servidores = ListarServidores();
                require("vista/v_servidores_listar.php");
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
                <h5 class="modal-title">¿Seguro que quiere salir?</h5>
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

<?php require("vista/scripts.php"); ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
