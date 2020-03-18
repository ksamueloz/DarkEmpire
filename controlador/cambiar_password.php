<?php  

    include_once '../modelo/configuracion.php';
    include_once '../modelo/conexion.php';
    include_once '../modelo/repositorioUsuario.php';
    include_once '../modelo/validarLogin.php';
    include_once '../modelo/controlSesion.php';

    conexion :: abrir_conexion();
    controlSesion :: sesion_iniciada();
    if(isset($_POST['cambiarPassword']))
    {
        $pass1 = $_POST['pass1'];
        $pass2 = $_POST['pass2'];

        if(strcmp($pass1, $pass2)===0)
        {
            $password_encriptada = password_hash($_POST['pass1'], PASSWORD_DEFAULT);
            $password_actualizada = repositorioUsuario :: cambiar_password(conexion::obtener_conexion(), $_SESSION['$nombre'], $password_encriptada);
            if($password_actualizada)
            {
                header("Location: ../index.php");
            }
        }
    }
    conexion :: cerrar_conexion();
?>




