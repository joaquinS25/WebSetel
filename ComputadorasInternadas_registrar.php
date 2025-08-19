<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Computadoras Donadas </title>
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
                    require("modelo/m_ComputadorasDonadas.php");

                    if (isset($_REQUEST['registrar'])) {
                        // Validar que todas las variables existan antes de usarlas
                        $EncCompDonadas     = $_REQUEST['EncCompDonadas'] ?? '';
                        $NSGCompDonadas     = $_REQUEST['NSGCompDonadas'] ?? '';
                        $DepCompDonadas     = $_REQUEST['DepCompDonadas'] ?? '';
                        $ProbCompDonadas    = $_REQUEST['ProbCompDonadas'] ?? '';
                        $EstadiaCompDonadas = $_REQUEST['EstadiaCompDonadas'] ?? '';
                        $UsuAsigCompDonadas = $_REQUEST['UsuAsigCompDonadas'] ?? '';
                        $DescCompDonadas    = $_REQUEST['DescCompDonadas'] ?? '';
                        $ProcCompDonadas    = $_REQUEST['ProcCompDonadas'] ?? '';
                        $GenCompDonadas     = $_REQUEST['GenCompDonadas'] ?? '';
                        $RAMCompDonadas     = $_REQUEST['RAMCompDonadas'] ?? '';
                        $DiscoDuroCompDonadas = $_REQUEST['DiscoDuroCompDonadas'] ?? '';
                        $ModCompDonadas     = $_REQUEST['ModCompDonadas'] ?? '';
                        $OBSCompDonadas     = $_REQUEST['OBSCompDonadas'] ?? '';
                        $usuario_soporte    = $_SESSION['usuario'] ?? '';

                        if (!empty($usuario_soporte)) {
                            $rpta = RegistrarComputadorasDonadas(
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
                                $usuario_soporte
                            );

                            if ($rpta === "SI") {
                                echo "<script>location.href='ComputadorasDonadas.php';</script>";
                                exit;
                            } else {
                                echo "<script>alert('Error al registrar la computadora donada');</script>";
                            }
                        } else {
                            echo "<script>alert('Usuario de soporte no definido en sesión');</script>";
                        }
                    }

                    require("vista/v_ComputadorasDonadas_registrar.php");
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