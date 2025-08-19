<?php
require("m_ComputadorasInternadas.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_compInter = $_POST['id_compInter'] ?? null;

    if ($id_compInter) {
        $rpta = EliminarComputadoraInternada($id_compInter);
        echo json_encode(['status' => $rpta]);
    } else {
        echo json_encode(['status' => 'NO_ID']);
    }
}
?>
