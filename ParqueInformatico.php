<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Parque Informático - Lista</title>

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
                    require("modelo/m_parque.php");

                     //Si se presiona el boton editar
                     if(isset($_REQUEST  ['editar']))
                     {
                          $id_equipo = $_REQUEST['editar'];
                          ?>
                            <script type="text/javascript">
                                location.href="parqueInformaticoEditar.php?id_equipo=<?php echo $id_equipo; ?>";
                            </script>
                          <?php
                     }
                     //Si se presiona el boton eliminar
                     else if (isset($_REQUEST ['eliminar']))
                     {
                        $id_equipo =  $_REQUEST ['eliminar'];
                        $rpta =  EliminarParque($id_equipo);
                        if($rpta == "SI")
                        {
                         ?>
                         <script type="text/javascript">
                             alert("ELIMINADO CORRECTAMENTE!");
                         </script>
                         <?php
                        }
                     }

                    $parque = ListarParque();
                    require("vista/v_parque_listar.php")
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

    <!-- Scroll to Top Button-->
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Seguro que quiere salir?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Seleccione "Salir" para finalizar su sesión.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Salir</a>
                </div>
            </div>
        </div>
    </div>


    <?php
    require("vista/scripts.php");
    ?>

</body>

</html>