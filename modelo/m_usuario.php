<?php
function ListarUsuario()
{
    require("conexion.php");

    $sql = "SELECT us.*, r.nombre_rol
        FROM usuarios_soporte us
        INNER JOIN roles r ON us.id_rol = r.id_rol";
    $res = mysqli_query($con, $sql);

    $datos = array();

    while ($fila = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
        $datos[] = $fila;
    }

    return $datos;

    mysqli_close($con);
}
function RegistrarUsuario($nombre, $apellido, $usuario, $contrasena, $id_rol)
{
    require("conexion.php");
    $sql = "INSERT INTO usuarios_soporte (nombre, apellido, usuario, contrasena, id_rol)
            VALUES ('$nombre', '$apellido', '$usuario', '$contrasena', '$id_rol')";
    mysqli_query($con, $sql);

    mysqli_close($con);
    return "SI";
}

function EliminarUsuario($id_usuario)
{
    require("conexion.php");
    $sql = "DELETE FROM usuarios_soporte WHERE id_soporte = '$id_usuario'";
    $res = mysqli_query($con, $sql);
    if ($res) {
        return "SI";
    } else {
        return "NO";
    }

    mysqli_close(($con));
}
function ConsultarUsuario($id_usuario)
{
    require("conexion.php");

    $sql = "SELECT * FROM usuarios_soporte WHERE id_soporte='$id_usuario'";
    $res = mysqli_query($con, $sql);

    $datos = array();

    while ($fila = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
        $datos[] = $fila;
    }

    return $datos;

    mysqli_close($con);
}

function ValidarUsuario($user, $pass)
{
    require("conexion.php");

    $sql = "SELECT us.*, r.id_rol, r.nombre_rol 
            FROM usuarios_soporte us
            INNER JOIN roles r ON us.id_rol = r.id_rol
            WHERE us.usuario = '$user' AND us.contrasena = '$pass'";

    $res = mysqli_query($con, $sql);

    $datos = array();
    while ($fila = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
        $datos[] = $fila;
    }

    mysqli_close($con);
    return $datos;
}


function ActualizarUsuario($id_usuario, $nombre, $apellido, $usuario, $contrasena,$id_rol)
{
    require("conexion.php");

    $sql = "UPDATE usuarios_soporte SET 
        nombre = '$nombre', 
        apellido = '$apellido',
        usuario = '$usuario',
        contrasena = '$contrasena',
        id_rol = '$id_rol'    
        WHERE id_soporte = '$id_usuario'";

    $res = mysqli_query($con, $sql);
    mysqli_close($con);

    return $res ? "SI" : "NO";
}
