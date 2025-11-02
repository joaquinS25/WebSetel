<?php
require_once "modelo/conexion.php"; // Ajusta la ruta si es necesario

// Contar computadoras donadas
$sql_donadas = $con->query("SELECT COUNT(*) AS total FROM computadoras_donadas");
$fila_donadas = $sql_donadas->fetch_assoc();
$total_donadas = $fila_donadas['total'];

// Contar computadoras internadas
$sql_internadas = $con->query("SELECT COUNT(*) AS total FROM computadoras_internadas");
$fila_internadas = $sql_internadas->fetch_assoc();
$total_internadas = $fila_internadas['total'];

// Devolver datos en formato JSON
echo json_encode([
    'donadas' => $total_donadas,
    'internadas' => $total_internadas
]);
?>
