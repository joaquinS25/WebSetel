<?php

function ListarMantenimiento()
{
    require("conexion.php");

    $sql = "SELECT 
                mantenimientos.*, 
                secciones.nombre_seccion, 
                usuarios_soporte.usuario AS usuario
            FROM mantenimientos
            INNER JOIN secciones ON mantenimientos.id_seccion = secciones.id_seccion
            INNER JOIN usuarios_soporte ON mantenimientos.id_soporte = usuarios_soporte.id_soporte";

    $res = mysqli_query($con, $sql);

    // MOSTRAR EL ERROR SI FALLA LA CONSULTA
    if (!$res) {
        die("Error en la consulta SQL: " . mysqli_error($con));
    }

    $datos = array();
    while ($fila = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
        $datos[] = $fila;
    }

    mysqli_close($con);
    return $datos;
}


function RegistrarMantenimiento($id_seccion, $nombre_responsable, $nombre_equipo, $ip, $tipo, $fecha_realizacion, $observaciones, $id_soporte)
{
    require("conexion.php");

    $sql = "INSERT INTO mantenimientos (
                id_seccion, nombre_responsable, nombre_equipo, ip, tipo, fecha_realizacion, observaciones, id_soporte
            ) VALUES (
                '$id_seccion', '$nombre_responsable', '$nombre_equipo', '$ip', '$tipo', '$fecha_realizacion', '$observaciones', '$id_soporte'
            )";

    $res = mysqli_query($con, $sql);

    if (!$res) {
        die("❌ Error en el registro del mantenimiento: " . mysqli_error($con));
    }

    mysqli_close($con);
    return "SI";
}


function ConsultarMantenimiento($id_mantenimiento)
{
    require("conexion.php");

    $sql = "SELECT mantenimientos.*, secciones.nombre_seccion, usuarios_soporte.usuario 
            FROM mantenimientos
            INNER JOIN secciones ON mantenimientos.id_seccion = secciones.id_seccion
            INNER JOIN usuarios_soporte ON mantenimientos.id_soporte = usuarios_soporte.id_soporte
            WHERE mantenimientos.id_mantenimiento = '$id_mantenimiento'";

    $res = mysqli_query($con, $sql);

    $datos = array();
    while ($fila = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
        $datos[] = $fila;
    }

    mysqli_close($con);
    return $datos;
}

function ActualizarMantenimiento($id_mantenimiento, $id_seccion, $nombre_responsable, $nombre_equipo, $ip, $tipo, $fecha_realizacion, $observaciones, $id_soporte)
{
    require("conexion.php");

    $sql = "UPDATE mantenimientos SET 
                id_seccion = '$id_seccion',
                nombre_responsable = '$nombre_responsable',
                nombre_equipo = '$nombre_equipo',
                ip = '$ip',
                tipo = '$tipo',
                fecha_realizacion = '$fecha_realizacion',
                observaciones = '$observaciones',
                id_soporte = '$id_soporte'
            WHERE id_mantenimiento = '$id_mantenimiento'";

    $res = mysqli_query($con, $sql);

    mysqli_close($con);
    return $res ? "SI" : "NO";
}

function EliminarMantenimiento($id_mantenimiento)
{
    require("conexion.php");

    $sql = "DELETE FROM mantenimientos WHERE id_mantenimiento = '$id_mantenimiento'";
    $res = mysqli_query($con, $sql);

    mysqli_close($con);
    return $res ? "SI" : "NO";
}

function ListarSecciones()
{
    require("conexion.php");

    $sql = "SELECT id_seccion, nombre_seccion FROM secciones";
    $resultado = $con->query($sql);

    $secciones = [];
    while ($fila = $resultado->fetch_assoc()) {
        $secciones[] = $fila;
    }

    mysqli_close($con);
    return $secciones;
}
?>
