<?php  
	session_start();
	/*Este comanando destruye la sesion inicialiazada anteriormente
		Luego me redireccionara a la pagina de inicio*/
	session_destroy();
	header("Location: ../index.php");
?>