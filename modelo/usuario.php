<?php 

	class usuario
	{
		//Defino mis Atributos
		private $usuario; //Nombre Usuario.
		private $password; //Contraseña.
		private $nombre; //Nombre Completo.
		private $sexo; //Sexo.
		private $email; //Correo.
		private $edad; //Edad de la persona.

		/*..::Defino mis Metodos::..*/
		/*Trabajo con variables = $this -> */
		public function __construct($usuario, $password, $nombre, $sexo, $email, $edad)
		{
			$this -> usuario = $usuario;
			$this -> password = $password;
			$this -> nombre = $nombre;
			$this -> sexo = $sexo;
			$this -> email = $email;
			$this -> edad = $edad;
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
	}
 ?>

