<?php
session_start();
require("modelo/m_ComputadorasInternadas.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Lista de Computadoras Internadas</title>
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
                    /*if (isset($_REQUEST['editar'])) {
                    $IdCompDonadas = $_REQUEST['editar'];
                    echo "<script>location.href='computadorasDonadasEditar.php?IdCompDonadas={$IdCompDonadas}';</script>";
                }*/

                    // Si se presiona el botón actualizar
                    if (isset($_POST['actualizar'])) {
                        $id_compInter     = $_POST['id_compInter'];
                        $NSG_compInter    = $_POST['NSG_compInter'];
                        $resp_compInter   = $_POST['resp_compInter']; // <- LO QUE TE FALTABA
                        $id_seccion       = $_POST['id_seccion'];
                        $probl_compInter  = $_POST['probl_compInter'];
                        $compo_compInter  = $_POST['compo_compInter'];
                        $entrega_compInter = $_POST['entrega_compInter'];
                         // ✅ Tomar el usuario logueado de sesión
                        $id_soporte = $_SESSION['usuario'] ?? '';

                        $resultado = ActualizarComputadora_Internada(
                            $id_compInter,
                            $NSG_compInter,
                            $resp_compInter,   // <- TERCER ARGUMENTO
                            $id_seccion,       // <- CUARTO ARGUMENTO
                            $probl_compInter,
                            $compo_compInter,
                            $entrega_compInter,
                            $id_soporte        // <- OCTAVO ARGUMENTO
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
                location.href = 'ComputadorasInternadas.php';
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

                    $computadorasInternadas = ListarComputadorasInternadas();
                    require("vista/v_ComputadorasInternadas_lista.php");
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