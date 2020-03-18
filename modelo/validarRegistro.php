<?php 
    
    require_once 'repositorioUsuario.php';
    class validarRegistro
    {
        //Defino mis Atributos
        private $usuario; //Nombre Usuario.
        private $password; //Contraseña.
        private $nombre; //Nombre Completo.
        private $sexo; //Sexo.
        private $email; //Correo.
        private $edad; //Edad de la persona.

        private $aviso_inicio;
        private $aviso_cierre;
        private $error_usuario;
        /*..::Defino mis Metodos::..*/
        /*Trabajo con variables = $this -> */
        public function __construct($usuario, $password, $nombre, $sexo, $email, $edad, $conexion)
        {
            $this -> usuario = $usuario;
            $this -> password = $password;
            $this -> nombre = $nombre;
            $this -> sexo = $sexo;
            $this -> email = $email;
            $this -> edad = $edad;

            $this -> aviso_inicio = "<br><div class='alert alert-danger' role ='alert'>";
            $this -> aviso_cierre = "</div>";

            $this -> error_usuario = $this -> validar_usuario($conexion, $usuario);
        }
        /*..::Mis funciones Getters And Setters, son privadas::..*/
        /*Getters*/
        public function getUsuario(){
            return $this -> usuario;
        }
        public function getPassword(){
            return $this -> password;
        }
        public function getNombre(){
            return $this -> nombre;
        }
        public function getSexo(){
            return $this -> sexo;
        }
        public function getEmail(){
            return $this -> email;
        }
        public function getEdad(){
            return $this -> edad;
        }
        public function obtener_error_usuario(){
            return $this -> error_usuario;
        }
        /*Setters*/
        public function setUsuario($usuario){
            $this -> usuario = $usuario;
        }
        public function setPassword($password){
            $this -> password = $password;
        }
        public function setNombre($nombre){
            $this -> nombre = $nombre;
        }
        public function setSexo($sexo){
            $this -> sexo = $sexo;
        }
        public function setEmail($email){
            $this -> email = $email;
        }
        public function setPuntaje($puntaje){
            $this -> puntaje = $puntaje;
        }
        public function setEdad($edad){
            $this -> edad = $edad;
        }
        //Mostraré el nombre en caso de que exista un error en otro lugar
        public function mostrar_usuario(){
            if($this -> usuario !== ""){
               echo 'value = "' . $this -> usuario. '"';
            }
        }
        public function mostrar_error_usuario(){
            if($this -> error_usuario !== ""){
                echo $this -> aviso_inicio . $this -> error_usuario . $this -> aviso_cierre;
            }
        }
         private function variable_iniciada($variable){
            if(isset($variable) && !empty($variable)){
                return true;
            }else{
                return false;
            }
        }
        
        private function validar_usuario($conexion, $usuario){
            if(!$this-> variable_iniciada($usuario)){
                return "Debes escribir un nombre de usuario";
            }else{
                $this -> usuario = $usuario;
            }
            
            if(repositorioUsuario :: usuario_existe($conexion, $usuario)){
                
                return "Nombre de usuario en uso, use otro";
            }
            return "";
        }
        public function registro_valido(){
            if($this -> error_usuario === ""){
               return true;
            }else{
                return false;
            }
        }
    }
 ?>

