<?php

function ListarIncidencias()
{
    require("conexion.php");

    $sql = "SELECT 
                incidencias.*, 
                secciones.nombre_seccion, 
                usuarios_soporte.usuario 
            FROM incidencias
            INNER JOIN secciones ON incidencias.id_seccion = secciones.id_seccion
            INNER JOIN usuarios_soporte ON incidencias.id_soporte = usuarios_soporte.id_soporte";

    $res = mysqli_query($con, $sql);
    if (!$res) die("Error en la consulta: " . mysqli_error($con));

    $datos = [];
    while ($fila = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
        $datos[] = $fila;
    }

    mysqli_close($con);
    return $datos;
}

function RegistrarIncidencia($id_seccion, $nombre_afectado, $problema, $tipo, $estado, $fecha_inicio, $fecha_culminacion, $observaciones, $id_soporte)
{
    require("conexion.php");

    $sql = "INSERT INTO incidencias (
                id_seccion, nombre_afectado, problema, tipo, estado, fecha_inicio, fecha_culminacion, observaciones, id_soporte
            ) VALUES (
                '$id_seccion', '$nombre_afectado', '$problema', '$tipo', '$estado', '$fecha_inicio', '$fecha_culminacion', '$observaciones', '$id_soporte'
            )";

    $res = mysqli_query($con, $sql);
    if (!$res) die("Error al registrar incidencia: " . mysqli_error($con));

    mysqli_close($con);
    return "SI";
}

function ActualizarIncidencia($id_incidencia, $id_seccion, $nombre_afectado, $problema, $tipo, $estado, $fecha_inicio, $fecha_culminacion, $observaciones, $id_soporte)
{
    require("conexion.php");

    $sql = "UPDATE incidencias SET 
                id_seccion='$id_seccion',
                nombre_afectado='$nombre_afectado',
                problema='$problema',
                tipo='$tipo',
                estado='$estado',
                fecha_inicio='$fecha_inicio',
                fecha_culminacion='$fecha_culminacion',
                observaciones='$observaciones',
                id_soporte='$id_soporte'
            WHERE id_incidencia='$id_incidencia'";

    $res = mysqli_query($con, $sql);
    mysqli_close($con);
    return $res ? "SI" : "NO";
}

function EliminarIncidencia($id_incidencia)
{
    require("conexion.php");

    $sql = "DELETE FROM incidencias WHERE id_incidencia = '$id_incidencia'";
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
