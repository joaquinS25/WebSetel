<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Parque Informático - Lista</title>
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
                    require("modelo/m_parque.php");

                    /* ===================== ELIMINAR ===================== */
                    if (isset($_POST['eliminar'])) {
                        $id_equipo = $_POST['eliminar'];
                        $rpta = EliminarParque($id_equipo);

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

                    /* ===================== ACTUALIZAR ===================== */
                    if (isset($_POST['actualizar'])) {
                        $id_equipo     = $_POST['id_equipo'];
                        $id_seccion    = $_POST['id_seccion'];
                        $tipo_articulo = $_POST['tipo_articulo'];
                        $grado         = $_POST['grado'];
                        $responsable   = $_POST['responsable'];
                        $cip_dni       = $_POST['cip_dni'];
                        $cargo_fuera   = $_POST['cargo_fuera'];
                        $nsg           = $_POST['nsg'];
                        $descripcion   = $_POST['descripcion_articulo'];
                        $marca         = $_POST['marca'];
                        $procesador    = $_POST['procesador'];
                        $generacion    = $_POST['generacion'];
                        $ram           = $_POST['ram'];
                        $ssd           = $_POST['ssd'];
                        $hdd           = $_POST['hdd'];
                        $so            = $_POST['so'];
                        $antivirus     = $_POST['antivirus'];
                        $situacion     = $_POST['situacion'];
                        $ip            = $_POST['ip'];
                        $chasqui       = $_POST['chasqui'];
                        $mac           = $_POST['mac'];
                        $nombre_equipo = $_POST['nombre_equipo'];
                        $origen        = $_POST['origen'];

                        $rpta = ActualizarParque(
                            $id_equipo,$id_seccion,$tipo_articulo,$grado,$responsable,$cip_dni,$cargo_fuera,$nsg,$descripcion,
                            $marca,$procesador,$generacion,$ram,$ssd,$hdd,$so,$antivirus,$situacion,$ip,$chasqui,$mac,$nombre_equipo,$origen
                        );

                        if ($rpta === "SI") {
                            echo "<script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    Swal.fire({icon:'success',title:'¡Actualizado!',text:'El registro fue actualizado correctamente.',confirmButtonColor:'#3085d6'});
                                });
                            </script>";
                        } else {
                            echo "<script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    Swal.fire({icon:'error',title:'Error',text:'No se pudo actualizar el registro.',confirmButtonColor:'#d33'});
                                });
                            </script>";
                        }
                    }

                    /* ===================== REGISTRAR ===================== */
                    if (isset($_POST['registrar'])) {
                        $id_seccion    = $_POST['id_seccion'];
                        $tipo_articulo = $_POST['tipo_articulo'];
                        $grado         = $_POST['grado'];
                        $responsable   = $_POST['responsable'];
                        $cip_dni       = $_POST['cip_dni'];
                        $cargo_fuera   = $_POST['cargo_fuera'];
                        $nsg           = $_POST['nsg'];
                        $descripcion   = $_POST['descripcion_articulo'];
                        $marca         = $_POST['marca'];
                        $procesador    = $_POST['procesador'];
                        $generacion    = $_POST['generacion'];
                        $ram           = $_POST['ram'];
                        $ssd           = $_POST['ssd'];
                        $hdd           = $_POST['hdd'];
                        $so            = $_POST['so'];
                        $antivirus     = $_POST['antivirus'];
                        $situacion     = $_POST['situacion'];
                        $ip            = $_POST['ip'];
                        $chasqui       = $_POST['chasqui'];
                        $mac           = $_POST['mac'];
                        $nombre_equipo = $_POST['nombre_equipo'];
                        $origen        = $_POST['origen'];

                        $rpta = RegistrarParque(
                            $id_seccion,$tipo_articulo,$grado,$responsable,$cip_dni,$cargo_fuera,$nsg,$descripcion,
                            $marca,$procesador,$generacion,$ram,$ssd,$hdd,$so,$antivirus,$situacion,$ip,$chasqui,$mac,$nombre_equipo,$origen
                        );

                        if ($rpta === "SI") {
                            echo "<script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    Swal.fire({icon:'success',title:'¡Registrado!',text:'El registro fue agregado correctamente.',confirmButtonColor:'#3085d6'});
                                });
                            </script>";
                        } else {
                            echo "<script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    Swal.fire({icon:'error',title:'Error',text:'No se pudo registrar el equipo.',confirmButtonColor:'#d33'});
                                });
                            </script>";
                        }
                    }

                    /* ===================== DATOS PARA LA VISTA ===================== */
                    $secciones = ListarSecciones();
                    $parque    = ListarParque();

                    require("vista/v_parque_listar.php");
                    ?>
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

    <?php require("vista/scripts.php"); ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
