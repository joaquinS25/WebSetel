<?php
session_start();
require("modelo/m_usuario.php");

if (isset($_POST['actualizar'])) {
    $id_usuario = $_POST['id_usuario'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    $rpta = ActualizarUsuario($id_usuario, $nombre, $apellido, $usuario, $contrasena);

    if ($rpta == "SI") {
        // ACTUALIZAR SESIÓN
        $_SESSION['nom_session'] = $nombre;
        $_SESSION['ape_session'] = $apellido;
        $_SESSION['usuario'] = $usuario;
        $_SESSION['contrasena'] = $contrasena;

        echo "<script>alert('SE ACTUALIZÓ CORRECTAMENTE'); location.href='perfil.php';</script>";
        exit;
    } else {
        echo "<script>alert('ERROR AL ACTUALIZAR'); history.back();</script>";
        exit;
    }
} else {
    echo "<script>alert('ACCESO NO VÁLIDO'); location.href='perfil.php';</script>";
    exit;
}
