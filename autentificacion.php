<?php

session_start();

$user = $_REQUEST['user'];
$pass = $_REQUEST['pass'];

require("modelo/m_usuario.php");
$usuario = ValidarUsuario($user, $pass);

//SI EXISTE ESTE USUARIO
if($usuario!=null)
{
    foreach ($usuario as $key => $value) {
        $id_usuario = $value['id_usuario'];
        $nombre = $value['nombre'];
        $apellido = $value['apellido'];
        $usuario = $value['usuario'];
        $contrasena = $value["contrasena"];
    }

    //CREAR VARIABLES DE SESSION
    $_SESSION['autentificado'] = TRUE;
    $_SESSION['id_session'] = $id_usuario;
    $_SESSION['nom_completo_session'] = $nombre." ".$apellido;
    $_SESSION['nom_session'] = $nombre;
    
    $_SESSION['ape_session'] = $apellido;
    $_SESSION['usuario'] = $usuario;
    $_SESSION['contrasena'] = $contrasena;
    
    header('location: inicio.php');
}
else
{
    header('location: index.php');
}
?>