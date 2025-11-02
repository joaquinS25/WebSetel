<?php
require_once "conexion.php";

$mes = isset($_GET['mes']) ? $_GET['mes'] : date('Y-m');

$sql = "SELECT DATE(fecha_inicio) AS dia, COUNT(*) AS total 
        FROM incidencias
        WHERE DATE_FORMAT(fecha_inicio, '%Y-%m') = '$mes'
        GROUP BY DATE(fecha_inicio)
        ORDER BY dia";

$result = $con->query($sql);

$dias = [];
$totales = [];

while ($fila = $result->fetch_assoc()) {
    $dias[] = $fila['dia'];
    $totales[] = $fila['total'];
}

echo json_encode(['dias' => $dias, 'totales' => $totales]);
?>
