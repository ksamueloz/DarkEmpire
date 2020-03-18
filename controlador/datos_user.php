<?php 
    include_once '../modelo/conexion.php';
    include_once '../modelo/repositorioUsuario.php';

    conexion :: abrir_conexion();
    //Creo una variable $consulta , en la Barra de navegación se ve el nombre de Usuario
    //Por ello uso el $_GET['nombre_usuario'] gracias a eso identifico al Usuario a Actualizar
    $consulta = repositorioUsuario :: consultarUsuario(conexion::obtener_conexion(),$_GET['nombre_usuario']);
    //Si la persona unde en el botón Editar, entonces creo una variable $Usuario Actualizado
    if(isset($_POST['editar']))
    {
        //Le paso los parámetros de los inputs.
       $user_actualizado = repositorioUsuario :: editarUsuario(conexion::obtener_conexion(), $_POST['user'], $_POST['nombre'], $_POST['email'], $_POST['edad'], $_POST['sexo']);
       //Si todo está correcto, entonces lo redirige al listado de Usuarios.
       //Ya con esto los datos estarán Actualizados.
       if($user_actualizado)
       {
         header("Location: ../vista/perfil.php");
       }
        
    }
    conexion :: cerrar_conexion();
 ?>

