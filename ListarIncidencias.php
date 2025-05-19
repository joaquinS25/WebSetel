<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dependencias - Contabilidad</title>

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

                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <!-- Page Heading -->
                        <h1 class="h3 mb-2 text-gray-800">Parque Informático</h1>
                        <style>
                            .indextabla select {
                                padding: 10px;
                                border-radius: 5px;
                                font-size: 14px;
                            }
                        </style>
                        <!-- DataTales Example -->
                                    <table class="table table-bordered indextabla" id="tablasm" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Tipo de Producto</th>
                                                <th>Nombre de equipo</th>
                                                <th>NSG</th>
                                                <th>Componentes</th>
                                                <th>IP</th>
                                                <th>Dependencia</th>
                                                <th>Responsable</th>
                                                <th>Antivirus Instalado</th>
                                                <th>Antivirus Actualizado</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>PC</td>
                                                <td>Vastec</td>
                                                <td>1542-1452-785</td>
                                                <td>Intel Core i5-7400 8GB RAM 1TB HDD</td>
                                                <td>10.64.90.147</td>
                                                <td>Contabilidad</td>
                                                <td>Chafloque</td>
                                                <td>Si</td>
                                                <td>Si</td>
                                            </tr>
                                        </tbody>
                                    </table>
                    <!-- /.container-fluid -->
            <br>
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
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

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
                    <a class="btn btn-primary" href="login.php">Salir</a>
                </div>
            </div>
        </div>
    </div>


    <!--MODAL DE AGREGAR INCIDENCIAS-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">AGREGAR INCIDENCIAS</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="incidencias_registrar.php" method="POST">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <input type="text" name="Id_Seccion" class="form-control" placeholder="Id Seccion" aria-label="Id Seccion" required="required">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="Nombre_Afectado" class="form-control" placeholder="Nombre del Afectado" aria-label="Nombre del Afectado" required="required">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="problema" class="form-control" placeholder="Problema" aria-label="Problema" required="required">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="tipo" class="form-control" placeholder="Tipo" aria-label="Tipo" required="required">
                            </div>
                            <select class="form-select col-md-6" aria-label="Default select example">
                                <option selected>ESTADO</option>
                                <option value="1">pendiente</option>
                                <option value="2">en proceso</option>
                                <option value="3">resuelto</option>
                            </select>
                            <div class="col-md-6">
                                <input type="date" name="fechaIni" class="form-control" placeholder="Fecha de Inicio" aria-label="Fecha de Inicio" required="required">
                            </div>
                            <div class="col-md-6">
                                <input type="date" name="fechaTerminada" class="form-control" placeholder="Fecha de Culminacion" aria-label="Fecha de Culminacion" required="required">
                            </div>
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                <label for="floatingTextarea">Observaciones</label>
                            </div>
                                               
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">AGREGAR</button>
                </div>
            </div>
        </div>
    </div>
    <?php
    require("vista/scripts.php");
    ?>

</body>

</html>