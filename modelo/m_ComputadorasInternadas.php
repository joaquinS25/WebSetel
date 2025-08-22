<?php
function ListarComputadorasInternadas()
{
    require("conexion.php");

    $sql = "SELECT ci.*, 
                   us.usuario AS usuario, 
                   us_mod.usuario AS usuario_modificador, 
                   s.nombre_seccion AS nombre_seccion
            FROM computadoras_internadas ci
            INNER JOIN usuarios_soporte us 
                ON ci.id_soporte = us.id_soporte
            INNER JOIN secciones s 
                ON ci.id_seccion = s.id_seccion
            LEFT JOIN usuarios_soporte us_mod 
                ON ci.actualizado_por = us_mod.id_soporte";

    $res = mysqli_query($con, $sql);

    $datos = [];
    while ($fila = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
        $datos[] = $fila;
    }

    mysqli_close($con);
    return $datos;
}

function RegistrarComputadorasInternadas($NSG_compInter, $resp_compInter, $seccion, $probl_compInter, $compo_compInter, $entrega_compInter, $usuario_soporte)
{
    require("conexion.php");

    // Buscar id_soporte del usuario logueado
    $sql = "SELECT id_soporte FROM usuarios_soporte WHERE usuario = '$usuario_soporte' LIMIT 1";
    $res = mysqli_query($con, $sql);

    if (!$res || mysqli_num_rows($res) == 0) {
        mysqli_close($con);
        return "NO";
    }

    $row = mysqli_fetch_assoc($res);
    $id_soporte = $row['id_soporte'];

    $fecha_creacion = date("Y-m-d H:i:s");

    $sql = "INSERT INTO computadoras_internadas (
                NSG_compInter, resp_compInter, id_seccion, probl_compInter, compo_compInter, 
                entrega_compInter, id_soporte, fecha_creacion
            ) VALUES (
                '$NSG_compInter', '$resp_compInter', '$seccion', '$probl_compInter',
                '$compo_compInter', '$entrega_compInter', '$id_soporte', '$fecha_creacion'
            )";

    $ok = mysqli_query($con, $sql);

    mysqli_close($con);
    return ($ok) ? "SI" : "NO";
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
function ListarSecciones() {
    require("conexion.php");
    $sql = "SELECT id_seccion, nombre_seccion FROM secciones";
    $resultado = $con->query($sql);

    $secciones = [];
    while ($fila = $resultado->fetch_assoc()) {
        $secciones[] = $fila;
    }

    return $secciones;
}

function EliminarComputadoraInternada($id_compInter)
{
    require("conexion.php");
    $sql = "DELETE FROM computadoras_internadas WHERE id_compInter = '$id_compInter'";
    $res = mysqli_query($con, $sql);
    mysqli_close($con);
    return ($res) ? "SI" : "NO";
}
function ConsultarComputadoraInternada($id_compInter)
{
    require("conexion.php");

    $sql = "SELECT computadoras_internadas.*, usuarios_soporte.usuario AS usuario
            FROM computadoras_internadas
            INNER JOIN usuarios_soporte ON computadoras_internadas.id_soporte = usuarios_soporte.id_soporte
            INNER JOIN secciones ON computadoras_internadas.id_seccion = secciones.id_seccion
            WHERE computadoras_internadas.id_compInter = '$id_compInter'";
    $res = mysqli_query($con, $sql);

    $datos = array();

    while ($fila = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
        $datos[] = $fila;
    }

    mysqli_close($con);
    return $datos;
}

function ActualizarComputadora_Internada($id_compInter, $NSG_compInter, $resp_compInter, $seccion, $probl_compInter, $compo_compInter, $entrega_compInter, $usuario_soporte)
{
    require("conexion.php");

    // Obtener id_soporte del usuario logueado
    $sql = "SELECT id_soporte FROM usuarios_soporte WHERE usuario = '$usuario_soporte' LIMIT 1";
    $res = mysqli_query($con, $sql);

    if (!$res || mysqli_num_rows($res) == 0) {
        mysqli_close($con);
        return "NO";
    }

    $row = mysqli_fetch_assoc($res);
    $id_soporte_mod = $row['id_soporte'];
    $fecha_actual   = date("Y-m-d H:i:s");

    $sql = "UPDATE computadoras_internadas 
            SET NSG_compInter   = '$NSG_compInter', 
                resp_compInter  = '$resp_compInter',
                id_seccion      = '$seccion',
                probl_compInter = '$probl_compInter',
                compo_compInter = '$compo_compInter',
                entrega_compInter = '$entrega_compInter',
                actualizado_el  = '$fecha_actual',
                actualizado_por = '$id_soporte_mod'
            WHERE id_compInter = '$id_compInter'";

    $resultado = mysqli_query($con, $sql);
    mysqli_close($con);

    return ($resultado) ? "SI" : "NO";
}



