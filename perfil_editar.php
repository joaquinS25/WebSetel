<?php
session_start();
require("modelo/m_usuario.php");

if (isset($_POST['actualizarPerfil'])) {
    $id_usuario = $_POST['id_usuario'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $id_rol = $_POST['id_rol'];

    $rpta = ActualizarUsuario($id_usuario, $nombre, $apellido, $usuario, $contrasena,$id_rol);

    if ($rpta == "SI") {
        // ACTUALIZAR SESIÓN
        $_SESSION['nom_session'] = $nombre;
        $_SESSION['ape_session'] = $apellido;
        $_SESSION['usuario'] = $usuario;
        $_SESSION['contrasena'] = $contrasena;
        $_SESSION['id_rol'] = $id_rol;
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
