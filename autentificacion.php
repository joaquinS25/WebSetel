<?php
session_start();

$user = $_REQUEST['user'];
$pass = $_REQUEST['pass'];

require("modelo/m_usuario.php");
$datosUsuario = ValidarUsuario($user, $pass);

//SI EXISTE ESTE USUARIO
if ($datosUsuario != null) {
    foreach ($datosUsuario as $key => $value) {
        $id_soporte = $value['id_soporte']; // ✅ CORREGIDO
        $nombre = $value['nombre'];
        $apellido = $value['apellido'];
        $nombre_usuario = $value['usuario'];
        $contrasena = $value["contrasena"];
    }

    //CREAR VARIABLES DE SESIÓN
    $_SESSION['autentificado'] = TRUE;
    $_SESSION['id_session'] = $id_soporte;
    $_SESSION['id_soporte'] = $id_soporte; // ← este es el que usarás en mantenimiento
    $_SESSION['nom_completo_session'] = $nombre . " " . $apellido;
    $_SESSION['nom_session'] = $nombre;
    $_SESSION['ape_session'] = $apellido;
    $_SESSION['usuario'] = $nombre_usuario;
    $_SESSION['contrasena'] = $contrasena;

    header('location: inicio.php');
} else {
    header('location: index.php');
}
?>
