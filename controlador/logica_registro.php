<?php
    include_once '../modelo/configuracion.php';
    include_once '../modelo/conexion.php';
    include_once '../modelo/usuario.php';
    include_once '../modelo/repositorioUsuario.php';
    include_once '../modelo/validarRegistro.php';
    include_once '../modelo/controlSesion.php';

    if(controlSesion :: sesion_iniciada()){
        if ($_SESSION['$nombre'] != 'Administrador'){
            header("Location: ../index.php");  
        }
    }

    if(isset($_POST['registrar'])){ //Si la persona unde en el botón de registrarse.
        //Para poder trabajar con la BDD debo Abrir y Cerrar la Conexión
        conexion :: abrir_conexion();

        $validador = new validarRegistro(
            $_POST['user'], $_POST['pass'], $_POST['nombre'], 
            $_POST['sexo'],$_POST['correo'], $_POST['edad'], conexion :: obtener_conexion());
        if($validador -> registro_valido()){
            $usuario = new usuario(
                $validador -> getUsuario(),
                password_hash($validador -> getPassword(), PASSWORD_DEFAULT),
                $validador -> getNombre(),
                $validador -> getSexo(),
                $validador -> getEmail(),
                $validador -> getEdad()
            );
            //Inserto el usuario llamando a Repositorio Usuario en el método Insertar
            $usuario_insertado = repositorioUsuario :: insertar_usuario(conexion :: obtener_conexion(), $usuario);
            
            if($usuario_insertado){
                if ($_SESSION['$nombre'] == 'Administrador'){
                    header("Location: ../vista/perfil.php");
                } else {
                    //Lo mando al login si todo va bien
                    header("Location: ../vista/login.php"); 
                }
            }
            //Si el usuario no se hubiera insertado correctamente es mejor que yo cierre la conexión.
            //Cierro la Conexión
            conexion :: cerrar_conexion();
        }
    }
?>