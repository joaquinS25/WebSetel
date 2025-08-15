<?php
require("m_ComputadorasDonadas.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $IdCompDonadas = $_POST['IdCompDonadas'] ?? null;

    if ($IdCompDonadas) {
        $rpta = EliminarComputadoraDonada($IdCompDonadas);
        echo json_encode(['status' => $rpta]);
    } else {
        echo json_encode(['status' => 'NO_ID']);
    }
}
?>
