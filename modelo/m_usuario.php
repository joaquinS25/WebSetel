<?php
    function ListarUsuario()
    {
        require("conexion.php");

        $sql="SELECT * FROM usuarios_soporte";
        $res = mysqli_query($con,$sql);

        $datos = array();

        while ($fila = mysqli_fetch_array($res,MYSQLI_ASSOC))
        {
            $datos[] = $fila;
        }

        return $datos;

        mysqli_close($con);
    }
    function RegistrarParque($nombre,$apellido,$usuario,$contrasena)
    {
        require("conexion.php");
        $sql="INSERT INTO usuarios_soporte() VALUES(NULL, '$nombre', '$apellido', '$usuario', '$contrasena')";
        mysqli_query($con,$sql);

        return "SI";

        mysqli_close($con);
    }
    function EliminarUsuario($id_usuario)
    {
        require("conexion.php");
        $sql="DELETE FROM usuarios_soporte WHERE id_soporte = '$id_usuario'";
        $res = mysqli_query($con,$sql);
        if($res) 
        {
            return "SI";
        }
        else
        {
            return "NO";
        }

        mysqli_close(($con));
    }
    function ConsultarUsuario($id_usuario)
    {
        require("conexion.php");

        $sql="SELECT * FROM usuarios_soporte WHERE id_soporte='$id_usuario'";
        $res = mysqli_query($con,$sql);

        $datos = array();

        while ($fila = mysqli_fetch_array($res,MYSQLI_ASSOC))
        {
            $datos[] = $fila;
        }

        return $datos;

        mysqli_close($con);
    }
    function ValidarUsuario($user, $pass)
    {
        require("conexion.php");
    
        $sql="SELECT * FROM usuarios_soporte
        WHERE usuario = '$user'
        AND contrasena = '$pass'";
        $res = mysqli_query($con,$sql);
    
        $datos = array();
    
        while ($fila = mysqli_fetch_array($res,MYSQLI_ASSOC))
        {
            $datos[] = $fila;
        }
    
        return $datos;
    
        mysqli_close($con);
    
    }

    function ActualizarUsuario($id_usuario,$nombre,$apellido,$usuario,$contrasena)
    {
        require("conexion.php");  
    
        $sql="UPDATE usuarios_soporte SET 
        nombre = '$nombre', 
        apellido = '$apellido',
        usuario = '$usuario',
        contrasena = '$contrasena'
        
        
        WHERE id_soporte = '$id_usuario'";
        $res = mysqli_query($con,$sql);
        if($res) 
        {
            return "SI";
        }
        else
        {
            return "NO";
        }
    
        mysqli_close(($con));   
    }
?>