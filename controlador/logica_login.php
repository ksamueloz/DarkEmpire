<?php
    include_once '../modelo/configuracion.php';
    include_once '../modelo/conexion.php';
    include_once '../modelo/repositorioUsuario.php';
    include_once '../modelo/validarLogin.php';
    include_once '../modelo/controlSesion.php';

    if(controlSesion :: sesion_iniciada()){
     header("Location: ../index.php");
    }
    //Verifico que el usuario haya dado Click en Login Btn
    if(isset($_POST['ingresar'])){
        conexion :: abrir_conexion();
        $validador = new validarLogin($_POST['user'], $_POST['pass'], conexion::obtener_conexion());
        //Compruebo si todo va bien
      if($validador -> getError() === "" && !is_null($validador -> getUsuario())){
            //Iniciaré la sesión
             
             if ($validador->getUsuario()->getNombre() == "Administrador" && password_verify($_POST['pass'], $validador ->getUsuario()->getPassword())) {
                controlSesion :: iniciar_sesion_admin($validador -> getUsuario(), $validador -> getUsuario() -> getNombre());
             }else{
                controlSesion :: iniciar_sesion($validador -> getUsuario(), $validador -> getUsuario() -> getNombre());
             }
             header("Location: ../index.php");
        } else if(is_null($validador -> getUsuario() -> getNombre())) {
            echo "No existen los datos";
        }
        
        conexion :: cerrar_conexion();
    }
?>