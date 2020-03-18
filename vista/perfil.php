<?php  
    
    include_once '../modelo/configuracion.php';
    include_once '../modelo/conexion.php';
    include_once '../modelo/repositorioUsuario.php';
    include_once '../modelo/validarLogin.php';
    include_once '../modelo/controlSesion.php';
    
    if(!controlSesion :: sesion_iniciada()){ //Si la sesión No está iniciada.
        header("Location: ../index.php");
    }
    conexion::abrir_conexion();
    if (controlSesion::sesion_iniciada()){
        if ($_SESSION['$nombre'] != 'Administrador'){
            require 'perfil_user.php';    
        }else if($_SESSION['$nombre']=="Administrador"){
            require 'perfil_admin.php';
        }
    }
?>

