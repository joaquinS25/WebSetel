<?php
function ListarServidores()
{
    require("conexion.php");

    $sql = "SELECT credenciales_servidores.*, usuarios_soporte.usuario AS usuario
            FROM credenciales_servidores
            INNER JOIN usuarios_soporte ON credenciales_servidores.id_soporte = usuarios_soporte.id_soporte";
    $res = mysqli_query($con, $sql);

    $datos = array();

    while ($fila = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
        $datos[] = $fila;
    }

    mysqli_close($con);
    return $datos;
}

function RegistrarServidor($nombre_servidor, $user, $contrasena, $descripcion, $usuario)
{
    require("conexion.php");

    $sql = "SELECT id_soporte FROM usuarios_soporte WHERE usuario = '$usuario'";
    $res = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($res);
    $id_soporte = $row['id_soporte'];

    $fecha_creacion = date("Y-m-d H:i:s");

    $sql = "INSERT INTO credenciales_servidores (
                nombre_servidor, user, contrasena, descripcion, id_soporte, fecha_creacion
            ) VALUES (
                '$nombre_servidor', '$user', '$contrasena', '$descripcion', '$id_soporte', '$fecha_creacion'
            )";

    mysqli_query($con, $sql);

    mysqli_close($con);
    return "SI";
}

function ListarUsuariosSoporte()
{
    require("conexion.php");

    $sql = "SELECT id_soporte, usuario FROM usuarios_soporte";
    $resultado = $con->query($sql);

    $usuarios_soporte = [];
    while ($fila = $resultado->fetch_assoc()) {
        $usuarios_soporte[] = $fila;
    }

    mysqli_close($con);
    return $usuarios_soporte;
}

function EliminarServidor($id_credencial)
{
    require("conexion.php");
    $sql = "DELETE FROM credenciales_servidores WHERE id_credencial = '$id_credencial'";
    $res = mysqli_query($con, $sql);
    mysqli_close($con);
    return ($res) ? "SI" : "NO";
}

function ConsultarSevidores($id_credencial)
{
    require("conexion.php");

    $sql = "SELECT credenciales_servidores.*, usuarios_soporte.usuario AS usuario
            FROM credenciales_servidores
            INNER JOIN usuarios_soporte ON credenciales_servidores.id_soporte = usuarios_soporte.id_soporte
            WHERE credenciales_servidores.id_credencial = '$id_credencial'";
    $res = mysqli_query($con, $sql);

    $datos = array();

    while ($fila = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
        $datos[] = $fila;
    }

    mysqli_close($con);
    return $datos;
}

function ActualizarServidor($id_credencial, $nombre_servidor, $usuario, $contrasena, $descripcion, $usuarioSoporte) {
    require("conexion.php");

    $fecha_actual = date("Y-m-d H:i:s");

    // Solo actualiza campos editables + campos de modificación, sin tocar id_soporte ni fecha_creacion
    $sql = "UPDATE credenciales_servidores 
            SET nombre_servidor = '$nombre_servidor', 
                user = '$usuario',
                contrasena = '$contrasena',
                descripcion = '$descripcion',
                actualizado_el = '$fecha_actual',
                actualizado_por = '$usuarioSoporte'
            WHERE id_credencial = '$id_credencial'";

    $resultado = mysqli_query($con, $sql);
    return ($resultado) ? "SI" : "NO";

    mysqli_close($con);
}


