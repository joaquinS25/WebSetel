<?php

function ListarMantenimiento()
{
    require("conexion.php");

    $sql = "SELECT 
                m.*,
                s.nombre_seccion,
                u1.usuario AS usuario_creador,
                u2.usuario AS usuario_modificador
            FROM mantenimientos m
            INNER JOIN secciones s ON m.id_seccion = s.id_seccion
            INNER JOIN usuarios_soporte u1 ON m.id_soporte_creacion = u1.id_soporte
            LEFT JOIN usuarios_soporte u2 ON m.id_soporte_modificacion = u2.id_soporte";

    $res = mysqli_query($con, $sql);

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

function RegistrarMantenimiento($id_seccion, $nombre_responsable, $nombre_equipo, $ip, $tipo, $fecha_realizacion, $observaciones, $id_soporte_creacion)
{
    require("conexion.php");

    $fecha_creacion = date('Y-m-d H:i:s'); // Captura la fecha actual

    $sql = "INSERT INTO mantenimientos (
                id_seccion, nombre_responsable, nombre_equipo, ip, tipo, fecha_realizacion, observaciones, id_soporte_creacion, fecha_creacion
            ) VALUES (
                '$id_seccion', '$nombre_responsable', '$nombre_equipo', '$ip', '$tipo', '$fecha_realizacion', '$observaciones', '$id_soporte_creacion', '$fecha_creacion'
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

    $sql = "SELECT 
                m.*, 
                s.nombre_seccion, 
                us.usuario AS creador, 
                um.usuario AS modificador
            FROM mantenimientos m
            INNER JOIN secciones s ON m.id_seccion = s.id_seccion
            LEFT JOIN usuarios_soporte us ON m.id_soporte_creacion = us.id_soporte
            LEFT JOIN usuarios_soporte um ON m.id_soporte_modificacion = um.id_soporte
            WHERE m.id_mantenimiento = '$id_mantenimiento'";

    $res = mysqli_query($con, $sql);

    $datos = [];
    while ($fila = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
        $datos[] = $fila;
    }

    mysqli_close($con);
    return $datos;
}

function ActualizarMantenimiento($id_mantenimiento, $id_seccion, $nombre_responsable, $nombre_equipo, $ip, $tipo, $fecha_realizacion, $observaciones, $id_soporte_modificacion, $fecha_modificacion)
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
                id_soporte_modificacion = '$id_soporte_modificacion',
                fecha_modificacion = '$fecha_modificacion'
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
