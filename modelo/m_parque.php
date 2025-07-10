<?php
function ListarParque()
{
    require("conexion.php");

    $sql="SELECT parque_informatico.*, secciones.nombre_seccion AS nombre_seccion
          FROM parque_informatico
        INNER JOIN secciones ON parque_informatico.id_seccion = secciones.id_seccion";
    $res = mysqli_query($con,$sql);

    $datos = array();
    
    while ($fila = mysqli_fetch_array($res,MYSQLI_ASSOC))
    {
        $datos[] = $fila;
    }

    return $datos;

    mysqli_close($con);
}
function RegistrarParque($Tipo_producto,$nsg,$descripcion,$ip,$seccion,$responsable ,$AntInst,$AntAct,$NomEquipo)
{
    require("conexion.php");
    
    $sql="INSERT INTO parque_informatico() VALUES(NULL, '$Tipo_producto','$nsg','$descripcion','$ip','$seccion','$responsable' ,'$AntInst','$AntAct','$NomEquipo')"; 
    mysqli_query($con,$sql);

    return "SI";

    mysqli_close($con);
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

function EliminarParque($id_equipo)
{
    require("conexion.php");
    $sql="DELETE FROM parque_informatico WHERE id_equipo = '$id_equipo'";
    $res = mysqli_query($con,$sql);
    if($res) 
    {
        return "SI";
    }
    else
    {
        return "NO";
    }

    mysqli_close(($con));
}
function ConsultarParque($id_equipo)
{
    require("conexion.php");

    $sql="SELECT parque_informatico.*, secciones.nombre_seccion AS nombre_seccion
          FROM parque_informatico
        INNER JOIN secciones ON parque_informatico.id_seccion = secciones.id_seccion
        WHERE parque_informatico.id_equipo = '$id_equipo'"; // Filtra por ID";
    $res = mysqli_query($con,$sql);

    $datos = array();
    
    while ($fila = mysqli_fetch_array($res,MYSQLI_ASSOC))
    {
        $datos[] = $fila;
    }

    return $datos;

    mysqli_close($con);
}
function ActualizarParque($id_equipo,$Tipo_producto,$nsg,$descripcion,$NomEquipo,$ip,$id_seccion,$responsable ,$antivirus_instalado,$antivirus_activo)
{
    require("conexion.php");  
    
    $sql="UPDATE parque_informatico SET 
    tipo_articulo = '$Tipo_producto', 
    nsg = '$nsg',
    descripcion = '$descripcion',
    nombre_equipo = '$NomEquipo',
    ip = '$ip',
    id_seccion = '$id_seccion',
    responsable = '$responsable',
    antivirus_instalado = '$antivirus_instalado',
    antivirus_activo = '$antivirus_activo'
    WHERE id_equipo = '$id_equipo'";
    $res = mysqli_query($con,$sql);
    if($res) 
    {
        return "SI";
    }
    else
    {
        return "NO";
    }

    mysqli_close(($con));
}
?>