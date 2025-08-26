<?php

function ListarIncidencias()
{
    require("conexion.php");

    $sql = "SELECT i.*, s.nombre_seccion, 
                   us.usuario AS usuario_creador,
                   um.usuario AS usuario_modificador
            FROM incidencias i
            INNER JOIN secciones s ON i.id_seccion = s.id_seccion
            LEFT JOIN usuarios_soporte us ON i.id_soporte_creacion = us.id_soporte
            LEFT JOIN usuarios_soporte um ON i.id_soporte_modificacion = um.id_soporte";

    $res = mysqli_query($con, $sql);

    if (!$res) {
        die("Error al listar incidencias: " . mysqli_error($con));
    }

    $datos = [];
    while ($fila = mysqli_fetch_assoc($res)) {
        $datos[] = $fila;
    }

    mysqli_close($con);
    return $datos;
}

function RegistrarIncidencia($id_seccion, $nombre_afectado, $problema, $fecha_inicio, $observaciones, $estado, $id_soporte_creacion)
{
    require("conexion.php");
    $sql = "INSERT INTO incidencias (
                id_seccion, nombre_afectado, problema,
                fecha_inicio, observaciones, estado,
                fecha_creacion, id_soporte_creacion
            ) VALUES (
                '$id_seccion', '$nombre_afectado', '$problema',
                '$fecha_inicio', '$observaciones', '$estado',
                NOW(), '$id_soporte_creacion'
            )";
    $res = mysqli_query($con, $sql);
    if (!$res) { die("Error al registrar incidencia: " . mysqli_error($con)); }
    mysqli_close($con);
    return "SI";
}

function ActualizarIncidencia($id_incidencia, $id_seccion, $nombre_afectado, $problema, $fecha_inicio, $observaciones, $estado, $id_soporte_modificacion)
{
    require("conexion.php");

    $sql = "UPDATE incidencias SET
                id_seccion = '$id_seccion',
                nombre_afectado = '$nombre_afectado',
                problema = '$problema',
                fecha_inicio = '$fecha_inicio',
                observaciones = '$observaciones',
                estado = '$estado',
                fecha_modificacion = NOW(),
                id_soporte_modificacion = '$id_soporte_modificacion'
            WHERE id_incidencia = '$id_incidencia'";

    $res = mysqli_query($con, $sql);
    mysqli_close($con);
    return $res ? "SI" : "NO";
}

function EliminarIncidencia($id)
{
    require("conexion.php");
    $sql = "DELETE FROM incidencias WHERE id_incidencia = '$id'";
    $res = mysqli_query($con, $sql);
    mysqli_close($con);
    return $res ? "SI" : "NO";
}

function ListarSecciones()
{
    require("conexion.php");
    $sql = "SELECT id_seccion, nombre_seccion FROM secciones";
    $res = mysqli_query($con, $sql);
    $secciones = [];
    while ($fila = mysqli_fetch_assoc($res)) {
        $secciones[] = $fila;
    }
    mysqli_close($con);
    return $secciones;
}
?>
