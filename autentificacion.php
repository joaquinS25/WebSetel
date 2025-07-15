<?php
/*session_start();

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
    */


session_start();

$user = $_REQUEST['user'];
$pass = $_REQUEST['pass'];

require("modelo/m_usuario.php");
$datosUsuario = ValidarUsuario($user, $pass);

// SI EXISTE ESTE USUARIO
if ($datosUsuario != null) {
    foreach ($datosUsuario as $key => $value) {
        $id_soporte     = $value['id_soporte'];
        $nombre         = $value['nombre'];
        $apellido       = $value['apellido'];
        $nombre_usuario = $value['usuario'];
        $contrasena     = $value["contrasena"];
        $id_rol         = $value["id_rol"];
        $nombre_rol     = $value["nombre_rol"]; // ← desde tabla roles
    }

    // CREAR VARIABLES DE SESIÓN
    $_SESSION['autentificado']        = TRUE;
    $_SESSION['id_session']           = $id_soporte;
    $_SESSION['id_soporte']           = $id_soporte;
    $_SESSION['nom_completo_session'] = $nombre . " " . $apellido;
    $_SESSION['nom_session']          = $nombre;
    $_SESSION['ape_session']          = $apellido;
    $_SESSION['usuario']              = $nombre_usuario;
    $_SESSION['contrasena']           = $contrasena;
    // NUEVAS VARIABLES PARA ROL
    $_SESSION['id_rol']  = $id_rol;
    $_SESSION['rol']     = $nombre_rol;

    header('location: inicio.php');
} else {
    header('location: index.php');
}

?>
