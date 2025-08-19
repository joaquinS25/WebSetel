<?php
function ListarComputadorasInternadas()
{
    require("conexion.php");

    $sql = "SELECT computadoras_internadas.*, usuarios_soporte.usuario AS usuario, secciones.nombre_seccion AS nombre_seccion
            FROM computadoras_internadas
            INNER JOIN usuarios_soporte ON computadoras_internadas.id_soporte = usuarios_soporte.id_soporte
            INNER JOIN secciones ON computadoras_internadas.id_seccion = secciones.id_seccion";
    $res = mysqli_query($con, $sql);

    $datos = array();

    while ($fila = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
        $datos[] = $fila;
    }

    mysqli_close($con);
    return $datos;
}

function RegistrarComputadorasInternadas($NSG_compInter, $resp_compInter, $seccion, $probl_compInter, $compo_compInter, 
                                    $entrega_compInter, $usuario)
{
    require("conexion.php");

    // Obtener id_soporte del usuario
    $sql = "SELECT id_soporte FROM usuarios_soporte WHERE usuario = '$usuario' LIMIT 1";
    $res = mysqli_query($con, $sql);

    if (!$res || mysqli_num_rows($res) == 0) {
        mysqli_close($con);
        return "NO"; // No se encontró el usuario
    }

    $row = mysqli_fetch_assoc($res);
    $id_soporte = $row['id_soporte'];

    $fecha_creacion = date("Y-m-d H:i:s");

    $sql = "INSERT INTO computadoras_internadas(
                NSG_compInter, resp_compInter, id_seccion, probl_compInter, compo_compInter, 
                entrega_compInter, id_soporte, fecha_creacion
            ) VALUES (
                '$NSG_compInter', '$resp_compInter', '$seccion', '$probl_compInter','$compo_compInter', 
                '$entrega_compInter', '$usuario', '$fecha_creacion'
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
    require("conexion.php"); // Asegúrate de que la conexión es correcta

    $sql = "SELECT id_seccion, nombre_seccion FROM secciones"; // Ajusta según tu BD
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

function ActualizarComputadora_Internada($id_compInter,$NSG_compInter, $resp_compInter, $seccion, $probl_compInter, $compo_compInter, 
                                    $entrega_compInter, $usuario) {
    require("conexion.php");

    $fecha_actual = date("Y-m-d H:i:s");

    // Solo actualiza campos editables + campos de modificación, sin tocar id_soporte ni fecha_creacion
    $sql = "UPDATE computadoras_internadas 
            SET NSG_compInter = '$NSG_compInter', 
                resp_compInter = '$resp_compInter',
                id_seccion = '$seccion',
                probl_compInter = '$probl_compInter',
                compo_compInter = '$compo_compInter',
                entrega_compInter = '$entrega_compInter',
                actualizado_el = '$fecha_actual',
                actualizado_por = '$usuario'
            WHERE id_compInter = '$id_compInter'";

    $resultado = mysqli_query($con, $sql);
    return ($resultado) ? "SI" : "NO";

    mysqli_close($con);
}


