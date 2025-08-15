<?php
session_start();
require("modelo/m_ComputadorasDonadas.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Lista de Computadoras Donadas</title>
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
                    $IdCompDonadas = $_REQUEST['editar'];
                    echo "<script>location.href='computadorasDonadasEditar.php?IdCompDonadas={$IdCompDonadas}';</script>";
                }

                // Si se presiona el botón actualizar
                if (isset($_POST['actualizar'])) {
                    $IdCompDonadas = $_POST['IdCompDonadas'];
                    $EncCompDonadas = $_POST['EncCompDonadas'];
                    $NSGCompDonadas = $_POST['NSGCompDonadas'];
                    $DepCompDonadas = $_POST['DepCompDonadas'];
                    $ProbCompDonadas = $_POST['ProbCompDonadas'];
                    $EstadiaCompDonadas = $_POST['EstadiaCompDonadas'];
                    $UsuAsigCompDonadas = $_POST['UsuAsigCompDonadas'];
                    $DescCompDonadas = $_POST['DescCompDonadas'];
                    $ProcCompDonadas = $_POST['ProcCompDonadas'];
                    $GenCompDonadas = $_POST['GenCompDonadas'];
                    $RAMCompDonadas = $_POST['RAMCompDonadas'];
                    $DiscoDuroCompDonadas = $_POST['DiscoDuroCompDonadas'];
                    $ModCompDonadas = $_POST['ModCompDonadas'];
                    $OBSCompDonadas = $_POST['OBSCompDonadas'];
                    $usuarioSoporte = $_SESSION['usuario']; 
                    
                    $resultado = ActualizarComputadora_Donada(
                        $IdCompDonadas,
                        $EncCompDonadas,
                        $NSGCompDonadas,
                        $DepCompDonadas,
                        $ProbCompDonadas,
                        $EstadiaCompDonadas,
                        $UsuAsigCompDonadas,
                        $DescCompDonadas,
                        $ProcCompDonadas,
                        $GenCompDonadas,
                        $RAMCompDonadas, 
                        $DiscoDuroCompDonadas, 
                        $ModCompDonadas, 
                        $OBSCompDonadas, 
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
                                location.href = 'ComputadorasDonadas.php';
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

                
                $computadorasDonadas = ListarComputadorasDonadas();
                require("vista/v_ComputadorasDonadas_listar.php");
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
