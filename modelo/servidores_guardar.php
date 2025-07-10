<?php
require("../modelo/m_servidores.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre_servidor = $_POST['nombre_servidor'];
    $user = $_POST['user'];
    $contrasena = $_POST['contrasena'];
    $descripcion = $_POST['descripcion'];
    $usuario = $_POST['usuario'];

    $respuesta = RegistrarServidor($nombre_servidor, $user, $contrasena, $descripcion, $usuario);
    
    echo json_encode(['status' => $respuesta]);
}
?>
