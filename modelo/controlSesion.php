<?php 
    class controlSesion {
        
        public static function iniciar_sesion($usuario, $nombre){
            if(session_id() == ''){
                session_start();
            }
            $_SESSION['$usuario'] = $usuario;
            $_SESSION['$nombre'] = $nombre;
        }
        public static function cerrar_sesion(){
            if(session_id() == ''){
                session_start();
            }
            if(isset($_SESSION['$usuario'])){
                unset($_SESSION['$usuario']);
            }
            if(isset($_SESSION['$nombre'])){
                unset($_SESSION['$nombre']);
            }
            session_destroy();
        } 
        public static function sesion_iniciada(){
            if(session_id() == ''){
                session_start();
            }
            if(isset($_SESSION['$usuario'])){
                return true;
            }else if(isset($_SESSION['$nombre'])){
                return true;
            } else {
                return false;
            }
        }

        public static function iniciar_sesion_admin($usuario, $nombre){
            if(session_id() == ''){
                session_start();
            }
            $_SESSION['$usuario'] = $usuario;
            $_SESSION['$nombre'] = "Administrador";

        }
        
        
    }

?>