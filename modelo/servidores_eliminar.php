<?php
require("m_servidores.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_credencial = $_POST['id_credencial'] ?? null;

    if ($id_credencial) {
        $rpta = EliminarServidor($id_credencial);
        echo json_encode(['status' => $rpta]);
    } else {
        echo json_encode(['status' => 'NO_ID']);
    }
}
?>
