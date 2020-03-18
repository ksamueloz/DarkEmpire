
<?php

include_once 'repositorioUsuario.php';
include_once 'usuario.php';

class validarLogin {

    private $usuario;
    private $error;

    public function __construct($usuario, $password, $conexion) {
        $this->error = "";
        if (!$this->variable_iniciada($usuario) || !$this->variable_iniciada($password)) {
            $this->usuario = null;
            $this->error = "Ingresa tu usuario y contraseña.";
        } else {
            $this->usuario = repositorioUsuario :: obtener_usuario($conexion, $usuario);
            if (!is_null($this->usuario) && password_verify($password, $this->usuario->getPassword())) {
               $this->error = "";
            } else {
                if (!is_null($this->usuario) || !password_verify($password, $this->usuario->getPassword())){
                 $this->error = "Datos incorrectos, intentelo de nuevo.";
                }  
            }
        }
    }

    private function variable_iniciada($variable) {
        if (isset($variable) && !empty($variable)) {
            return true;
        } else {
            return false;
        }
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function getError() {
        return $this->error;
    }

    public function mostrar_error() {
        if ($this->error !== '') {
            echo "<br><div class='alert alert-danger' role='alert'>";
            echo $this->error;
            echo "</div><br>";
        }
    }

}
