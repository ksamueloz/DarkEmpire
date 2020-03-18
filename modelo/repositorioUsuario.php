
<?php
class repositorioUsuario {
    public static function insertar_usuario($conexion, $usuario) {
        $usuario_insertado = false; //Me permitirá saber si la operación se realizó con éxito

        if (isset($conexion)) { //Verificaré si existe una conexión
            try {
                $sql = "INSERT INTO usuario (nombre_usuario, contrasena, nombre_completo, sexo, email,  edad) VALUES(:nombre_usuario, :contrasena, :nombre_completo, :sexo, :email, :edad)"; //Sentencia SQL, Añadirá un usuario
                $sentencia = $conexion->prepare($sql); //La sentencia estará preparada.
                $datos = array( //para que no genere error el SQl uso esta variable auxiliar que almacenará los datos registrados.
                            $usuario -> getUsuario(),
                            $usuario -> getPassword(),
                            $usuario -> getNombre(),
                            $usuario -> getSexo(),
                            $usuario -> getEmail(),
                            $usuario -> getEdad()
                );
                $sentencia->bindParam(':nombre_usuario', $datos[0], PDO::PARAM_STR); //Atar parámetros.
                $sentencia->bindParam(':contrasena', $datos[1], PDO::PARAM_STR); //Atar parámetros.
                $sentencia->bindParam(':nombre_completo', $datos[2], PDO::PARAM_STR); //Atar parámetros.
                $sentencia->bindParam(':sexo', $datos[3], PDO::PARAM_STR); //Atar parámetros.
                $sentencia->bindParam(':email', $datos[4], PDO::PARAM_STR); //Atar parámetros.
                $sentencia->bindParam(':edad', $datos[5], PDO::PARAM_STR); //Atar parámetros.
                //Las sestencias asegurarán la BDD.
                $usuario_insertado = $sentencia->execute(); //Ejecuto la sentencia.
            } catch (PDOException $ex) {
                print 'ERROR,' . $ex->getMessage();
            }
        }
        return $usuario_insertado;
    }
    public static function usuario_existe($conexion, $usuario) {
        $usuario_existe = true;

        if (isset($conexion)) {
            try {
                $sql = "SELECT * FROM usuario WHERE nombre_usuario = :usuario";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':usuario', $usuario, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    $usuario_existe = true;
                } else {
                    $usuario_existe = false;
                }
            } catch (Exception $ex) {
                print 'ERROR,' . $ex->getMessage();
            }
        }
        return $usuario_existe;
    }
    public static function obtener_usuario($conexion, $usuario) {
        if (isset($conexion)) {
            try {
                include_once 'usuario.php';
                $sql = "SELECT * FROM usuario WHERE nombre_usuario = :usuario";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':usuario', $usuario, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia -> fetch();
                
                if(!empty($resultado)){
                    $usuario = new usuario(
                                    $resultado['nombre_usuario'],
                                    $resultado['contrasena'],
                                    $resultado['nombre_completo'],
                                    $resultado['sexo'],
                                    $resultado['email'],
                                    $resultado['edad']);
                }
            } catch (PDOException $ex) {
                print 'ERROR ' . $ex->getMessage();
            }
        }
        return $usuario;
    }
    public static function obtener_usuarioNombre($conexion, $usuario) {
        if (isset($conexion)) {
            try {
                include_once 'usuario.php';
                $sql = "SELECT * FROM usuario WHERE nombre_completo = :usuario";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':usuario', $usuario, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia -> fetch();
                
                if(!empty($resultado)){
                    $usuario = new usuario(
                                    $resultado['nombre_usuario'],
                                    $resultado['contrasena'],
                                    $resultado['nombre_completo'],
                                    $resultado['sexo'],
                                    $resultado['email'],
                                    $resultado['edad']);
                }
            } catch (PDOException $ex) {
                print 'ERROR ' . $ex->getMessage();
            }
        }
        return $usuario;
    }
    
    public static function cambiar_password($conexion, $nombre, $new_password) {
        $password_actualizada = false;
        if(isset($conexion)) {
            try {
                $sql = "UPDATE usuario SET contrasena = :password WHERE nombre_completo = :nombre";
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> bindParam(':password', $new_password, PDO::PARAM_STR);
                $sentencia -> bindParam(':nombre', $nombre, PDO::PARAM_STR);
                $sentencia -> execute();
                $resultado = $sentencia -> rowCount();
                if(count($resultado)) //Si existe un resultado, ósea que sea mayor a 0
                {
                    $password_actualizada = true;
                } else {
                    $password_actualizada = false;
                }
                
            } catch (PDOException $ex) {
                print 'ERROR ' . $ex->getMessage();
            }
        }
        return $password_actualizada;
    }

    public static function obtener_todos($conexion) { //Indico que usaré la conexión
        $usuarios = array(); //Devolverá todo

        if (isset($conexion)) { //Verifico que esté abierta
            try {
                include_once 'usuario.php';

                $sql = "SELECT * FROM usuario WHERE nombre_usuario != 'Admin'"; //Instrucción que se ejecutará en la BDD
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute(); //Importante, Si no se ejecuta no se recuperará información.
                return $sentencia;
            } catch (PDOException $ex) {
                print "ERROR: " . $ex->getMessage();
            }
        }
    }
    public static function consultarUsuario($conexion, $nombre)
    {
        if (isset($conexion)) { //Verifico que esté abierta
            try {
                include_once 'usuario.php';
                $sql = "SELECT * FROM usuario WHERE nombre_usuario = '".$nombre."'"; //Instrucción que se ejecutará en la BDD
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute(); //Importante, Si no se ejecuta no se recuperará información
                return $sentencia;
            } catch (PDOException $ex) {
                print "ERROR: " . $ex->getMessage();
            }
        }
        
    }
    //Editará La información que tenga la persona en cada input
    public static function editarUsuario($conexion, $usuario, $nombre, $email, $edad, $sexo)
    {
        $usuario_actualizado = false;
        if(isset($conexion)) {
            try {
                //Solo se actualizarán los valores en la tabla.
                //Se identificará en la BDD por medio del Nombre de Usuario
                $sql = "UPDATE usuario SET nombre_usuario = :usuario, nombre_completo = :nombre, email = :email, edad = :edad, sexo = :sexo WHERE nombre_usuario = :usuario";
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> bindParam(':usuario', $usuario, PDO::PARAM_STR);
                $sentencia -> bindParam(':nombre', $nombre, PDO::PARAM_STR);
                $sentencia -> bindParam(':email', $email, PDO::PARAM_STR);
                $sentencia -> bindParam(':edad', $edad, PDO::PARAM_STR);
                $sentencia -> bindParam(':sexo', $sexo, PDO::PARAM_STR);
                $sentencia -> execute();
                $resultado = $sentencia -> rowCount();
                if(count($resultado)) //Si existe un resultado, ósea que sea mayor a 0
                {
                    $usuario_actualizado = true;
                } else {
                    $usuario_actualizado = false;
                }
                
            } catch (PDOException $ex) {
                print 'ERROR ' . $ex->getMessage();
            }
        }
        return $usuario_actualizado;
    }

    public static function borrarUsuario($conexion, $usuario, $nombre, $email, $edad, $sexo)
    {
        $usuario_borrado = false;
        if(isset($conexion)) {
            try {
                //Solo se actualizarán los valores en la tabla.
                //Se identificará en la BDD por medio del Nombre de Usuario
                $sql = "DELETE FROM usuario WHERE nombre_usuario = :usuario";
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> bindParam(':usuario', $usuario, PDO::PARAM_STR);
                $sentencia -> execute();
                $resultado = $sentencia -> rowCount();
                if(count($resultado)) //Si existe un resultado, ósea que sea mayor a 0
                {
                    $usuario_borrado = true;
                } else {
                    $usuario_borrado = false;
                }
                
            } catch (PDOException $ex) {
                print 'ERROR ' . $ex->getMessage();
            }
        }
        return $usuario_borrado;
    }


}

?>
