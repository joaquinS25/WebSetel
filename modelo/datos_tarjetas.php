<?php
require_once("conexion.php");

header('Content-Type: application/json; charset=utf-8');

// Validar conexión
if (!$con) {
    echo json_encode(["error" => "Error de conexión con la base de datos."]);
    exit;
}

$sql = "SELECT s.nombre_seccion AS seccion, COUNT(p.id_equipo) AS total
        FROM parque_informatico p
        INNER JOIN secciones s ON p.id_seccion = s.id_seccion
        GROUP BY s.nombre_seccion
        ORDER BY s.nombre_seccion";

$resultado = $con->query($sql);

$tarjetas = [];

while ($fila = $resultado->fetch_assoc()) {
    $tarjetas[] = [
        'seccion' => $fila['seccion'],
        'total' => (int)$fila['total']
    ];
}

echo json_encode($tarjetas);
?>
