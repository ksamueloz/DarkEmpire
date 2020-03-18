
<?php
    class conexion 
    {
        
        private static $conexion; //Objeto a usar en la BDD.
        
        public static function abrir_conexion(){
            if(!isset(self::$conexion)){ //Si la conexión es NULL, self, desde esta pág.
               try{
                   include_once 'configuracion.php'; //Incluyo exclusivamente la clase config.
                   //Ahora inicio la conexión
                   self::$conexion = new PDO('mysql:host='.NOMBRE_SERVIDOR.'; dbname='.NOMBRE_BDD, NOMBRE_USUARIO,PASSWORD); //Tipo BDD,Nombre BDD, Usuario, Password.
                   self::$conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Mandar MSM Error.
                   self::$conexion ->exec("SET CHARACTER SET utf8"); //Lenguaje Global.
               } catch (PDOException $ex) {
                   print "ERROR: " .$ex -> getMessage(). "<br>";
                   die(); //Termino la conexión.
               } 
            }
        }
        public static function cerrar_conexion(){
            if(isset(self::$conexion)){ //Si la conexión está iniciada.
            self::$conexion = NULL;
            }
        }
        //Obtengo la conexión fuera de éste Class
        public static function obtener_conexion(){
            return self::$conexion;
        }
    }
?>