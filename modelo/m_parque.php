<?php
function ListarParque()
{
    require("conexion.php");

    $sql = "SELECT 
                pi.id_equipo, 
                pi.id_seccion,
                pi.tipo_articulo, 
                pi.grado, 
                pi.responsable, 
                pi.cip_dni, 
                pi.cargo_fuera, 
                pi.nsg, 
                pi.descripcion, 
                pi.marca, 
                pi.procesador, 
                pi.generacion, 
                pi.ram, 
                pi.ssd, 
                pi.hdd, 
                pi.so, 
                pi.antivirus, 
                pi.situacion, 
                pi.ip, 
                pi.chasqui, 
                pi.mac, 
                pi.nombre_equipo, 
                pi.origen,
                pi.fecha_creacion,
                pi.fecha_modificacion,
                s.nombre_seccion AS seccion,
                sc.nombre AS creador,
                sm.nombre AS modificador
            FROM parque_informatico pi
            INNER JOIN secciones s ON pi.id_seccion = s.id_seccion
            LEFT JOIN usuarios_soporte sc ON pi.id_soporte_creacion = sc.id_soporte
            LEFT JOIN usuarios_soporte sm ON pi.id_soporte_modificacion = sm.id_soporte";

    $result = mysqli_query($con, $sql);
    if (!$result) {
        die("Error en ListarParque: " . mysqli_error($con));
    }

    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    mysqli_close($con);
    return $data;
}
function RegistrarParque($id_seccion,$tipo_articulo,$grado,$responsable,$cip_dni,$cargo_fuera,$nsg,$descripcion,
    $marca,$procesador,$generacion,$ram,$ssd,$hdd,$so,$antivirus,$situacion,$ip,$chasqui,$mac,$nombre_equipo,$origen)
{
    require("conexion.php");
    $id_soporte = $_SESSION['id_soporte']; // usuario logueado

    $sql = "INSERT INTO parque_informatico
            (id_seccion,tipo_articulo,grado,responsable,cip_dni,cargo_fuera,nsg,descripcion,
             marca,procesador,generacion,ram,ssd,hdd,so,antivirus,situacion,ip,chasqui,mac,nombre_equipo,origen,
             id_soporte_creacion,fecha_creacion)
            VALUES
            ('$id_seccion','$tipo_articulo','$grado','$responsable','$cip_dni','$cargo_fuera','$nsg','$descripcion',
             '$marca','$procesador','$generacion','$ram','$ssd','$hdd','$so','$antivirus','$situacion','$ip','$chasqui','$mac','$nombre_equipo','$origen',
             '$id_soporte',NOW())";

    $res = mysqli_query($con, $sql) or die("Error en RegistrarParque: " . mysqli_error($con));
    mysqli_close($con);
    return $res ? "SI" : "NO";
}

function ListarSecciones() {
    require("conexion.php");
    $sql = "SELECT id_seccion, nombre_seccion FROM secciones ORDER BY nombre_seccion";
    $resultado = mysqli_query($con, $sql) or die("Error en ListarSecciones: " . mysqli_error($con));

    $secciones = [];
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $secciones[] = $fila;
    }
    mysqli_close($con);
    return $secciones;
}

function EliminarParque($id_equipo)
{
    require("conexion.php");
    $sql = "DELETE FROM parque_informatico WHERE id_equipo='$id_equipo'";
    $res = mysqli_query($con, $sql) or die("Error en EliminarParque: " . mysqli_error($con));
    mysqli_close($con);
    return $res ? "SI" : "NO";
}
function ConsultarParque($id_equipo)
{
    require("conexion.php");

    $sql="SELECT pi.*, s.nombre_seccion AS nombre_seccion
          FROM parque_informatico pi
          LEFT JOIN secciones s ON pi.id_seccion = s.id_seccion
          WHERE pi.id_equipo = '$id_equipo'";
    $res = mysqli_query($con,$sql) or die("Error en ConsultarParque: " . mysqli_error($con));

    $datos = [];
    while ($fila = mysqli_fetch_assoc($res)) {
        $datos[] = $fila;
    }
    mysqli_close($con);
    return $datos;
}

function ActualizarParque($id_equipo,$id_seccion,$tipo_articulo,$grado,$responsable,$cip_dni,$cargo_fuera,$nsg,$descripcion,
    $marca,$procesador,$generacion,$ram,$ssd,$hdd,$so,$antivirus,$situacion,$ip,$chasqui,$mac,$nombre_equipo,$origen)
{
    require("conexion.php");
    $id_soporte = $_SESSION['id_soporte']; // usuario logueado

    $sql = "UPDATE parque_informatico SET
            id_seccion='$id_seccion',
            tipo_articulo='$tipo_articulo',
            grado='$grado',
            responsable='$responsable',
            cip_dni='$cip_dni',
            cargo_fuera='$cargo_fuera',
            nsg='$nsg',
            descripcion='$descripcion',
            marca='$marca',
            procesador='$procesador',
            generacion='$generacion',
            ram='$ram',
            ssd='$ssd',
            hdd='$hdd',
            so='$so',
            antivirus='$antivirus',
            situacion='$situacion',
            ip='$ip',
            chasqui='$chasqui',
            mac='$mac',
            nombre_equipo='$nombre_equipo',
            origen='$origen',
            id_soporte_modificacion='$id_soporte',
            fecha_modificacion=NOW()
            WHERE id_equipo='$id_equipo'";

    $res = mysqli_query($con, $sql) or die("Error en ActualizarParque: " . mysqli_error($con));
    mysqli_close($con);
    return $res ? "SI" : "NO";
}

?>
