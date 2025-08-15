<?php
function ListarComputadorasDonadas()
{
    require("conexion.php");

    $sql = "SELECT computadoras_donadas.*, usuarios_soporte.usuario AS usuario
            FROM computadoras_donadas
            INNER JOIN usuarios_soporte ON computadoras_donadas.id_soporte = usuarios_soporte.id_soporte";
    $res = mysqli_query($con, $sql);

    $datos = array();

    while ($fila = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
        $datos[] = $fila;
    }

    mysqli_close($con);
    return $datos;
}

function RegistrarComputadorasDonadas($EncCompDonadas, $NSGCompDonadas, $DepCompDonadas, $ProbCompDonadas, $EstadiaCompDonadas, 
                                    $UsuAsigCompDonadas, $DescCompDonadas, $ProcCompDonadas, $GenCompDonadas, $RAMCompDonadas, 
                                    $DiscoDuroCompDonadas, $ModCompDonadas, $OBSCompDonadas, $usuario)
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

    $sql = "INSERT INTO computadoras_donadas(
                EncCompDonadas, NSGCompDonadas, DepCompDonadas, ProbCompDonadas, EstadiaCompDonadas, UsuAsigCompDonadas, 
                DescCompDonadas, ProcCompDonadas, GenCompDonadas, 
                RAMCompDonadas, DiscoDuroCompDonadas, ModCompDonadas, OBSCompDonadas, id_soporte, fecha_creacion
            ) VALUES (
                '$EncCompDonadas', '$NSGCompDonadas', '$DepCompDonadas', '$ProbCompDonadas','$EstadiaCompDonadas', 
                '$UsuAsigCompDonadas', '$DescCompDonadas', '$ProcCompDonadas', '$GenCompDonadas', '$RAMCompDonadas', 
                '$DiscoDuroCompDonadas', '$ModCompDonadas', '$OBSCompDonadas', '$id_soporte', '$fecha_creacion'
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

function EliminarComputadoraDonada($IdCompDonadas)
{
    require("conexion.php");
    $sql = "DELETE FROM computadoras_donadas WHERE IdCompDonadas = '$IdCompDonadas'";
    $res = mysqli_query($con, $sql);
    mysqli_close($con);
    return ($res) ? "SI" : "NO";
}

function ConsultarComputadoraDonada($IdCompDonadas)
{
    require("conexion.php");

    $sql = "SELECT computadoras_donadas.*, usuarios_soporte.usuario AS usuario
            FROM computadoras_donadas
            INNER JOIN usuarios_soporte ON credenciales_servidores.id_soporte = usuarios_soporte.id_soporte
            WHERE computadoras_donadas.IdCompDonadas = '$IdCompDonadas'";
    $res = mysqli_query($con, $sql);

    $datos = array();

    while ($fila = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
        $datos[] = $fila;
    }

    mysqli_close($con);
    return $datos;
}

function ActualizarComputadora_Donada($IdCompDonadas,$EncCompDonadas, $NSGCompDonadas, $DepCompDonadas, $ProbCompDonadas, $EstadiaCompDonadas, 
                                    $UsuAsigCompDonadas, $DescCompDonadas, $ProcCompDonadas, $GenCompDonadas, $RAMCompDonadas, 
                                    $DiscoDuroCompDonadas, $ModCompDonadas, $OBSCompDonadas, $usuarioSoporte) {
    require("conexion.php");

    $fecha_actual = date("Y-m-d H:i:s");

    // Solo actualiza campos editables + campos de modificación, sin tocar id_soporte ni fecha_creacion
    $sql = "UPDATE computadoras_donadas 
            SET EncCompDonadas = '$EncCompDonadas', 
                NSGCompDonadas = '$NSGCompDonadas',
                DepCompDonadas = '$DepCompDonadas',
                ProbCompDonadas = '$ProbCompDonadas',
                EstadiaCompDonadas = '$EstadiaCompDonadas',
                UsuAsigCompDonadas = '$UsuAsigCompDonadas',
                UsuAsigCompDonadas = '$UsuAsigCompDonadas',
                DescCompDonadas = '$DescCompDonadas',
                ProcCompDonadas = '$ProcCompDonadas',
                GenCompDonadas = '$GenCompDonadas',
                RAMCompDonadas = '$RAMCompDonadas',
                DiscoDuroCompDonadas = '$DiscoDuroCompDonadas',
                ModCompDonadas = '$ModCompDonadas',
                OBSCompDonadas = '$OBSCompDonadas',
                actualizado_el = '$fecha_actual',
                actualizado_por = '$usuarioSoporte'
            WHERE IdCompDonadas = '$IdCompDonadas'";

    $resultado = mysqli_query($con, $sql);
    return ($resultado) ? "SI" : "NO";

    mysqli_close($con);
}


