<?php
require("modelo/conexion.php");
global $conexion;

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=parque_informatico.xls");
header("Pragma: no-cache");
header("Expires: 0");

$sql = "
SELECT 
   s.nombre_seccion AS seccion,
   p.grado,
   p.responsable,
   p.cip_dni,
   p.cargo_fuera,
   p.nsg,
   p.descripcion,
   p.marca,
   p.procesador,
   p.generacion,
   p.ram,
   p.ssd,
   p.hdd,
   p.so,
   p.antivirus,
   p.situacion,
   p.ip,
   p.chasqui,
   p.mac,
   p.nombre_equipo,
   p.origen
FROM parque_informatico p
LEFT JOIN secciones s ON s.id_seccion = p.id_seccion
ORDER BY s.nombre_seccion ASC
";

$res = mysqli_query($con, $sql);

echo "
<table border='1'>
 <tr style='background:#d6eaff; font-weight:bold;'>
    <th>SECCIÓN</th>
    <th>GRADO</th>
    <th>RESPONSABLE</th>
    <th>CIP/DNI</th>
    <th>CARGO O FUERA DE</th>
    <th>NSG</th>
    <th>DESCRIPCION DEL ARTICULO</th>
    <th>MARCA</th>
    <th>PROCESADOR</th>
    <th>GENERACION</th>
    <th>RAM</th>
    <th>SSD</th>
    <th>HHD</th>
    <th>SO</th>
    <th>ANTIVIRUS</th>
    <th>SITUACION</th>
    <th>IP</th>
    <th>CHASQUI</th>
    <th>MAC</th>
    <th>NOMBRE DE EQUIPO</th>
    <th>ORIGEN</th>
 </tr>
";

while ($row = mysqli_fetch_assoc($res)) {
    echo "
    <tr>
        <td>{$row['seccion']}</td>
        <td>{$row['grado']}</td>
        <td>{$row['responsable']}</td>
        <td>{$row['cip_dni']}</td>
        <td>{$row['cargo_fuera']}</td>
        <td>{$row['nsg']}</td>
        <td>{$row['descripcion']}</td>
        <td>{$row['marca']}</td>
        <td>{$row['procesador']}</td>
        <td>{$row['generacion']}</td>
        <td>{$row['ram']}</td>
        <td>{$row['ssd']}</td>
        <td>{$row['hdd']}</td>
        <td>{$row['so']}</td>
        <td>{$row['antivirus']}</td>
        <td>{$row['situacion']}</td>
        <td>{$row['ip']}</td>
        <td>{$row['chasqui']}</td>
        <td>{$row['mac']}</td>
        <td>{$row['nombre_equipo']}</td>
        <td>{$row['origen']}</td>
    </tr>
    ";
}

echo "</table>";
