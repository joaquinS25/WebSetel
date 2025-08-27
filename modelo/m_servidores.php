<?php
function ListarServidores()
{
    require("conexion.php");

    $sql = "SELECT cs.*, 
                   u1.usuario AS usuario_creacion, 
                   u2.usuario AS usuario_modificacion
            FROM credenciales_servidores cs
            LEFT JOIN usuarios_soporte u1 ON cs.id_soporte_creacion = u1.id_soporte
            LEFT JOIN usuarios_soporte u2 ON cs.id_soporte_modificacion = u2.id_soporte";

    $res = mysqli_query($con, $sql);

    if (!$res) {
        die("❌ Error en la consulta SQL: " . mysqli_error($con) . " - Consulta: " . $sql);
    }

    $datos = [];
    while ($fila = mysqli_fetch_assoc($res)) {
        $datos[] = $fila;
    }

    mysqli_close($con);
    return $datos;
}

function RegistrarServidor($modelo_servidor, $procesador, $cant_procesador, $cant_cpu, $ram, $total, $fisico, $logico,
                           $nombre_equipo, $ip, $tipo_servidor, $nombre_usuario, $contrasena, $origen, $so, $utilidad, $usuarioSesion)
{
    require("conexion.php");

    // Buscar ID del usuario logeado
    $sql = "SELECT id_soporte FROM usuarios_soporte WHERE usuario = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "s", $usuarioSesion);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($res);
    $id_soporte = $row['id_soporte'];
    mysqli_stmt_close($stmt);

    $sql = "INSERT INTO credenciales_servidores (
                modelo_servidor, procesador, cant_procesador, cant_cpu, ram, total, fisico, logico,
                nombre_equipo, ip, tipo_servidor, nombre_usuario, contrasena, origen, so, utilidad,
                id_soporte_creacion, fecha_creacion
            ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,NOW())";

    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "ssssssssssssssssi",
        $modelo_servidor, $procesador, $cant_procesador, $cant_cpu, $ram, $total, $fisico, $logico,
        $nombre_equipo, $ip, $tipo_servidor, $nombre_usuario, $contrasena, $origen, $so, $utilidad,
        $id_soporte
    );

    $ok = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($con);

    return $ok ? "SI" : "NO";
}

function ListarUsuariosSoporte()
{
    require("conexion.php");

    $sql = "SELECT id_soporte, usuario FROM usuarios_soporte";
    $resultado = mysqli_query($con, $sql);

    $usuarios_soporte = [];
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $usuarios_soporte[] = $fila;
    }

    mysqli_close($con);
    return $usuarios_soporte;
}

function EliminarServidor($id_credencial)
{
    require("conexion.php");

    $sql = "DELETE FROM credenciales_servidores WHERE id_credencial = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id_credencial);
    $ok = mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    mysqli_close($con);

    return $ok ? "SI" : "NO";
}

function ConsultarServidores($id_credencial)
{
    require("conexion.php");

    $sql = "SELECT cs.*, u.usuario AS usuario
            FROM credenciales_servidores cs
            INNER JOIN usuarios_soporte u ON cs.id_soporte_creacion = u.id_soporte
            WHERE cs.id_credencial = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id_credencial);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);

    $datos = [];
    while ($fila = mysqli_fetch_assoc($res)) {
        $datos[] = $fila;
    }

    mysqli_stmt_close($stmt);
    mysqli_close($con);

    return $datos;
}

function ActualizarServidor($id_credencial, $modelo_servidor, $procesador, $cant_procesador, $cant_cpu, $ram, $total, $fisico, $logico,
                            $nombre_equipo, $ip, $tipo_servidor, $nombre_usuario, $contrasena, $origen, $so, $utilidad, $usuarioSesion)
{
    require("conexion.php");

    // Buscar ID del usuario logeado
    $sql = "SELECT id_soporte FROM usuarios_soporte WHERE usuario = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "s", $usuarioSesion);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($res);
    $id_soporte_modificacion = $row['id_soporte'];
    mysqli_stmt_close($stmt);

    $sql = "UPDATE credenciales_servidores 
            SET modelo_servidor = ?, procesador = ?, cant_procesador = ?, cant_cpu = ?, ram = ?, total = ?, 
                fisico = ?, logico = ?, nombre_equipo = ?, ip = ?, tipo_servidor = ?, nombre_usuario = ?, contrasena = ?, 
                origen = ?, so = ?, utilidad = ?, 
                id_soporte_modificacion = ?, fecha_modificacion = NOW()
            WHERE id_credencial = ?";

    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "sssssssssssssssiii",
        $modelo_servidor, $procesador, $cant_procesador, $cant_cpu, $ram, $total, $fisico, $logico,
        $nombre_equipo, $ip, $tipo_servidor, $nombre_usuario, $contrasena, $origen, $so, $utilidad,
        $id_soporte_modificacion, $id_credencial
    );

    $ok = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($con);

    return $ok ? "SI" : "NO";
}
?>
