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
    <title>ACTUALIZACION DE PARQUE INFORMATICO</title>

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
                    if(isset($_REQUEST['actualizar']))
                    {
                        $id_equipo = $_REQUEST['id_equipo'];
                        $Tipo_producto = $_REQUEST['tipo_producto'];
                        $nsg = $_REQUEST['nsg'];
                        $descripcion = $_REQUEST['descripcion'];
                        $NomEquipo = $_REQUEST['nombre_equipo'];
                        $ip = $_REQUEST['ip'];
                        $seccion = $_REQUEST['seccion'];
                        $responsable = $_REQUEST['responsable'];
                        $antivirus_instalado   = $_REQUEST['antivirus_instalado'];
                        $antivirus_activo   = $_REQUEST['antivirus_activo'];
                        
                        
                        $rpta = ActualizarParque($id_equipo,$Tipo_producto,$nsg,$descripcion,$NomEquipo,$ip,$seccion,$responsable ,$antivirus_instalado,$antivirus_activo);  

                        if($rpta=="SI")
                        {
                        ?>
                        <script type="text/javascript">
                             alert("SE ACTUALIZO CORRECTAMENTE");
                            location.href="parqueInformaticoRegistrar.php";
                        </script>
                        <?php
                        }else{
                            echo "<script>
                                    alert('ERROR AL ACTUALIZAR');
                                </script>";
                        }
                    }

                    $id_equipo = $_REQUEST["id_equipo"];
                    $parque = ConsultarParque($id_equipo);
                    foreach ($parque as $key => $value) 
                    {
                        $Tipo_producto = $value['tipo_articulo'];
                        $nsg = $value['nsg'];
                        $descripcion = $value['descripcion'];
                        $NomEquipo = $value["nombre_equipo"];
                        $ip = $value["ip"];
                        $seccion = $value["id_seccion"];
                        $responsable = $value["responsable"];
                        $antivirus_instalado = $value["antivirus_instalado"];
                        $antivirus_activo = $value["antivirus_activo"];
                        if($antivirus_instalado==1){$ai1="selected";}else{$ai1="";}
                        if($antivirus_instalado==0){$ai0="selected";}else{$ai0="";}
                        if($antivirus_activo==1){$aac1="selected";}else{$aac1="";}
                        if($antivirus_activo==0){$aac0="selected";}else{$aac0="";}
                        
                        
                    }
                    require("vista/v_parque_editar.php");
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


    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Seleccione "Salir" para finalizar su sesión.</h5>
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


    <?php
    require("vista/scripts.php");
    ?>

</body>

</html>