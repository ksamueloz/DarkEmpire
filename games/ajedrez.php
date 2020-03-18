<!--

	Creado por, Luis Puello && Samuel Moreno

	© Santa Martha - Colombia

	Universidad del Magdalena

-->
<?php 

	require '../modelo/controlSesion.php';
	require '../modelo/conexion.php';
	if(controlSesion :: sesion_iniciada()) {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Ajedrez</title>

    <!-- Favicon -->
    <link rel="icon" href="../img/core-img/logoEye.png">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="../style.css">

</head>

<body>
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
 <!-- ##### Header Area Start ##### -->
    <header class="header-area wow fadeInDown" data-wow-delay="500ms">
        <!-- Top Header Area -->
        <div class="top-header-area">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12 d-flex align-items-center justify-content-between">
                        <!-- Logo Area -->
                        <div class="logo">
                            <a href="../index.php"><img src="../img/core-img/logoEye.png" alt="" height="70" width="70">Sientete Como En Tu Hogar</a>
                        </div>

                        <!-- Search & Login Area -->
                        <div class="search-login-area d-flex align-items-center">
                            <!-- Top Search Area -->
                            	
                        	<a href="../vista/perfil.php">
                        		<i class="fas fa-user"></i>
                        		<span>
                        			<?php  
										/* Aca mostramos la variable row, mostrando el nombre del usuario de manera dinamica */
										echo $_SESSION['$nombre'];
									?>		
								</span>
							</a>		
                                
                            <!-- Login Area -->
                            <div class="login-area">	
                                <a href="../controlador/salir.php"><i class="fas fa-sign-out-alt"></i><span> Cerrar Sesion</span></a>	
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navbar Area -->
        <div class="egames-main-menu" id="sticker">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="egamesNav">

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="../index.php">Inicio</a></li>
                                    <?php if(controlSesion :: sesion_iniciada()) { 
                                        if ($_SESSION['$nombre'] != 'Administrador'){?>
                                            <li><a href="#">Opciones</a>
                                                <ul class="dropdown">
                                                	<li><a href="../games/numeromagico.php">Ir a Número mágico</a></li>
                                                    <li><a href="../vista/perfil.php">Ver Perfil</a></li>
                                                    <li><a href="../controlador/salir.php">Cerrar Sesion</a></li>
                                                </ul>
                                            </li>  
                                        <?php }else if($_SESSION['$nombre']=="Administrador"){ ?> 
                                            <li><a href="#">Opciones</a>
                                                <ul class="dropdown">
                                                    <li><a href="../vista/perfil.php">Ver Usuarios</a></li>
                                                    <li><a href="../vista/registro.php">Registrar Usuario</a></li>
                                                    <li><a href="../controlador/salir.php">Cerrar Sesion</a></li>
                                                </ul>
                                            </li>
                                        
                                        <?php } ?>
                                        
                                    <?php } ?> 
                                </ul>
                            </div>
                            <!-- Nav End -->
                        </div>

                        <!-- Top Social Info -->
                        <div class="top-social-info">
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fab fa-pinterest" aria-hidden="true"></i></a>
                            <a href="https://www.facebook.com" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fab fa-facebook" aria-hidden="true"></i></a>
                            <a href="https://www.twitter.com" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Dribbble"><i class="fab fa-dribbble" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Behance"><i class="fab fa-behance" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Linkedin"><i class="fab fa-linkedin" aria-hidden="true"></i></a>
                            <a href="https://www.instagram.com/infinitywar.marvel/" data-toggle="tooltip" data-placement="top" title="Marvel"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->
<style type="text/css">
	@import url("../style.css");
</style>


	<div class="contenedor">
		<header>
				<div class="columna12 ">
						<h1>Ajedrez</h1>
				</div>
		</header>
		<section>
			<!------------------------------------------------fila Coordenada numerica----------------------------------------------->	
			<div class="fila">
				<div class="columnatransparente"></div>
				<div class="columnatransparente"></div>
				<div class="columnatransparente"> 1 </div>
				<div class="columnatransparente"> 2 </div>
				<div class="columnatransparente"> 3 </div>
				<div class="columnatransparente"> 4 </div>
				<div class="columnatransparente"> 5 </div>
				<div class="columnatransparente"> 6 </div>
				<div class="columnatransparente"> 7 </div>
				<div class="columnatransparente"> 8 </div>
				<div class="columnatransparente"></div>
				<div class="columnatransparente"></div>
			</div>
			<!------------------------------------------------------ Primera fila ------------------------------------------------------>	
			<div class="fila">
				<div class="columnatransparente"></div>
				<div class="columnatransparente"> A </div>
				<div id="a1" class="columna1 negro" ondrop="soltar(event)" ondragover="activarSoltar(event)">
					<img id="torrenegra1" src="../img/torrenegra.png" height="64" draggable="true" ondragstart="agarrar(event)">
				</div>
				<div id="a2" class="columna1 blanco" ondrop="soltar(event)" ondragover="activarSoltar(event)">
					<img id="caballonegro1" src="../img/caballonegro.png" height="64" draggable="true" ondragstart="agarrar(event)">
				</div>
				<div id="a3" class="columna1 negro" ondrop="soltar(event)" ondragover="activarSoltar(event)">
					<img id="alfilnegro1" src="../img/alfilnegro.png" height="64" draggable="true" ondragstart="agarrar(event)">
				</div>
				<div id="a4" class="columna1 blanco" ondrop="soltar(event)" ondragover="activarSoltar(event)">
					<img id="reinanegra" src="../img/reinanegra.png" height="64" draggable="true" ondragstart="agarrar(event)">
				</div>
				<div id="a5" class="columna1 negro" ondrop="soltar(event)" ondragover="activarSoltar(event)">
					<img id="reynegro" src="../img/reynegro.png" height="64" draggable="true" ondragstart="agarrar(event)">
				</div>
				<div id="a6" class="columna1 blanco" ondrop="soltar(event)" ondragover="activarSoltar(event)">
					<img id="alfilnegro2" src="../img/alfilnegro.png" height="64" draggable="true" ondragstart="agarrar(event)">
				</div>
				<div id="a7" class="columna1 negro" ondrop="soltar(event)" ondragover="activarSoltar(event)">
					<img id="caballonegro2" src="../img/caballonegro.png" height="64" draggable="true" ondragstart="agarrar(event)">
				</div>
				<div id="a8" class="columna1 blanco" ondrop="soltar(event)" ondragover="activarSoltar(event)">
					<img id="torrenegra2" src="../img/torrenegra.png" height="64" draggable="true" ondragstart="agarrar(event)">
				</div>
				<div class="columnatransparente"> A </div>
				<div class="columnatransparente"></div>
			</div>
			<!----------------------------------------- segunda fila--------------------------------------------------------------->
			
			<div class="fila">
				<div class="columnatransparente"></div>
				<div class="columnatransparente"> B </div>
				<div id="b1" class="columna1 blanco" ondrop="soltar(event)" ondragover="activarSoltar(event)" ondragstart="agarrar(event)">
					<img id="peonnegro1" src="../img/peonegro.png" height="64" draggable="true" ondragstart="agarrar(event)" >
				</div>

				<div id="b2" class="columna1 negro" ondrop="soltar(event)" ondragover="activarSoltar(event)">
					<img id="peonnegro2" src="../img/peonegro.png" height="64" draggable="true" ondragstart="agarrar(event)">
				</div>
				<div id="b3" class="columna1 blanco" ondrop="soltar(event)" ondragover="activarSoltar(event)">
					<img id="peonnegro3"  src="../img/peonegro.png" height="64" draggable="true" ondragstart="agarrar(event)">
				</div>
				<div id="b4" class="columna1 negro" ondrop="soltar(event)" ondragover="activarSoltar(event)">
					<img id="peonnegro4" src="../img/peonegro.png" height="64" draggable="true" ondragstart="agarrar(event)">
				</div>
				<div id="b5" class="columna1 blanco" ondrop="soltar(event)" ondragover="activarSoltar(event)">
					<img id="peonnegro5" src="../img/peonegro.png" height="64" draggable="true" ondragstart="agarrar(event)">
				</div>
				<div id="b6" class="columna1 negro" ondrop="soltar(event)" ondragover="activarSoltar(event)">
					<img id="peonnegro6" src="../img/peonegro.png" height="64" draggable="true" ondragstart="agarrar(event)">
				</div>
				<div id="b7" class="columna1 blanco" ondrop="soltar(event)" ondragover="activarSoltar(event)">
					<img id="peonnegro7" src="../img/peonegro.png" height="64" draggable="true" ondragstart="agarrar(event)">
				</div>
				<div id="b8" class="columna1 negro" ondrop="soltar(event)" ondragover="activarSoltar(event)">
					<img id="peonnegro8" src="../img/peonegro.png" height="64" draggable="true" ondragstart="agarrar(event)">
				</div>
				<div class="columnatransparente"> B </div>
				<div class="columnatransparente"></div>
			</div>
			<!---------------------------------------------- tercera fila--------------------------------------------------------->
			
			<div class="fila">
				<div class="columnatransparente"></div>
				<div class="columnatransparente"> C </div>
				<div id="c1" class="columna1 negro" ondrop="soltar(event)" ondragover="activarSoltar(event)">
					
				</div>
				<div id="c2" class="columna1 blanco" ondrop="soltar(event)" ondragover="activarSoltar(event)">
					
				</div>
				<div id="c3" class="columna1 negro" ondrop="soltar(event)" ondragover="activarSoltar(event)">
					
				</div>
				<div id="c4" class="columna1 blanco" ondrop="soltar(event)" ondragover="activarSoltar(event)">
					
				</div>
				<div id="c5" class="columna1 negro" ondrop="soltar(event)" ondragover="activarSoltar(event)">
					
				</div>
				<div id="c6" class="columna1 blanco" ondrop="soltar(event)" ondragover="activarSoltar(event)">
					
				</div>
				<div id="c7" class="columna1 negro" ondrop="soltar(event)" ondragover="activarSoltar(event)">
					
				</div>
				<div id="c8" class="columna1 blanco" ondrop="soltar(event)" ondragover="activarSoltar(event)">
					
				</div>
				<div class="columnatransparente"> C </div>
				<div class="columnatransparente"></div>
			</div>
			<!------------------------------------------------------cuarta fila---------------------------------------------------->
			
			<div class="fila">
				<div class="columnatransparente"></div>
				<div class="columnatransparente"> D </div>
				<div id="d1" class="columna1 blanco" ondrop="soltar(event)" ondragover="activarSoltar(event)">
					
				</div>
				<div id="d2" class="columna1 negro" ondrop="soltar(event)" ondragover="activarSoltar(event)">
					
				</div>
				<div id="d3" class="columna1 blanco" ondrop="soltar(event)" ondragover="activarSoltar(event)">
					
				</div>
				<div id="d4" class="columna1 negro " ondrop="soltar(event)" ondragover="activarSoltar(event)">
					
				</div>
				<div id="d5" class="columna1 blanco" ondrop="soltar(event)" ondragover="activarSoltar(event)">
					
				</div>
				<div id="d6" class="columna1 negro " ondrop="soltar(event)" ondragover="activarSoltar(event)">
					
				</div>
				<div id="d7" class="columna1 blanco" ondrop="soltar(event)" ondragover="activarSoltar(event)">
					
				</div>
				<div id="d8" class="columna1 negro" ondrop="soltar(event)" ondragover="activarSoltar(event)">
					
				</div>
				<div class="columnatransparente"> D </div>
				<div class="columnatransparente"></div>
			</div>
			<!------------------------------------------------------quinta fila---------------------------------------------------->
			
			<div class="fila">
				<div class="columnatransparente"></div>
				<div class="columnatransparente"> E </div>
				<div id="e1" class="columna1 negro" ondrop="soltar(event)" ondragover="activarSoltar(event)">
					
				</div>
				<div id="e2" class="columna1 blanco" ondrop="soltar(event)" ondragover="activarSoltar(event)">
					
				</div>
				<div id="e3" class="columna1 negro" ondrop="soltar(event)" ondragover="activarSoltar(event)">
					
				</div>
				<div id="e4" class="columna1 blanco" ondrop="soltar(event)" ondragover="activarSoltar(event)">
					
				</div>
				<div id="e5" class="columna1 negro" ondrop="soltar(event)" ondragover="activarSoltar(event)">
					
				</div>
				<div id="e6" class="columna1 blanco" ondrop="soltar(event)" ondragover="activarSoltar(event)">
					
				</div>
				<div id="e7" class="columna1 negro" ondrop="soltar(event)" ondragover="activarSoltar(event)">
					
				</div>
				<div id="e8" class="columna1 blanco" ondrop="soltar(event)" ondragover="activarSoltar(event)">
					
				</div>
				<div class="columnatransparente"> E </div>
				<div class="columnatransparente"></div>
			</div>
			<!------------------------------------------------------ sexta fila ---------------------------------------------------->
			
			<div class="fila">
				<div class="columnatransparente"></div>
				<div class="columnatransparente"> F </div>
				<div id="f1" class="columna1 blanco" ondrop="soltar(event)" ondragover="activarSoltar(event)">
					
				</div>
				<div id="f2" class="columna1 negro" ondrop="soltar(event)" ondragover="activarSoltar(event)">
					
				</div>
				<div id="f3" class="columna1 blanco" ondrop="soltar(event)" ondragover="activarSoltar(event)">
					
				</div>
				<div id="f4" class="columna1 negro" ondrop="soltar(event)" ondragover="activarSoltar(event)">
					
				</div>
				<div id="f5" class="columna1 blanco" ondrop="soltar(event)" ondragover="activarSoltar(event)">
					
				</div>
				<div id="f6" class="columna1 negro" ondrop="soltar(event)" ondragover="activarSoltar(event)">
					
				</div>
				<div id="f7" class="columna1 blanco" ondrop="soltar(event)" ondragover="activarSoltar(event)">
					
				</div>
				<div id="f8" class="columna1 negro" ondrop="soltar(event)" ondragover="activarSoltar(event)">
					
				</div>
				<div class="columnatransparente"> F </div>
				<div class="columnatransparente"></div>
			</div>
			<!------------------------------------------------------ septima fila -------------------------------------------------->
			
			<div class="fila">
				<div class="columnatransparente"></div>
				<div class="columnatransparente"> G </div>
				<div id="g1" class="columna1 negro" ondrop="soltar(event)" ondragover="activarSoltar(event)">
					<img id="peonblanco1" src="../img/peonblanco.png" height="64" draggable="true" ondragstart="agarrar(event)">
				</div>
				<div id="g2" class="columna1 blanco" ondrop="soltar(event)" ondragover="activarSoltar(event)">
					<img id="peonblanco2" src="../img/peonblanco.png" height="64" draggable="true" ondragstart="agarrar(event)">
				</div>
				<div id="g3" class="columna1 negro" ondrop="soltar(event)" ondragover="activarSoltar(event)">
					<img id="peonblanco3" src="../img/peonblanco.png" height="64" draggable="true" ondragstart="agarrar(event)">
				</div>
				<div id="g4" class="columna1 blanco" ondrop="soltar(event)" ondragover="activarSoltar(event)">
					<img id="peonblanco4" src="../img/peonblanco.png" height="64" draggable="true" ondragstart="agarrar(event)">
				</div>
				<div id="g5" class="columna1 negro" ondrop="soltar(event)" ondragover="activarSoltar(event)">
					<img id="peonblanco5" src="../img/peonblanco.png" height="64" draggable="true" ondragstart="agarrar(event)">
				</div>
				<div id="g6" class="columna1 blanco" ondrop="soltar(event)" ondragover="activarSoltar(event)">
					<img id="peonblanco6" src="../img/peonblanco.png" height="64" draggable="true" ondragstart="agarrar(event)">
				</div>
				<div id="g7" class="columna1 negro" ondrop="soltar(event)" ondragover="activarSoltar(event)">
					<img id="peonblanco7" src="../img/peonblanco.png" height="64" draggable="true" ondragstart="agarrar(event)">
				</div>
				<div id="g8" class="columna1 blanco" ondrop="soltar(event)" ondragover="activarSoltar(event)">
					<img id="peonblanco8" src="../img/peonblanco.png" height="64" draggable="true" ondragstart="agarrar(event)">
				</div>
				<div class="columnatransparente"> G </div>
				<div class="columnatransparente"></div>
			</div>
			<!------------------------------------------------------octava fila---------------------------------------------------->
			
			<div class="fila">
				<div class="columnatransparente"></div>
				<div class="columnatransparente"> H </div>
				<div id="h1" class="columna1 blanco" ondrop="soltar(event)" ondragover="activarSoltar(event)">
					<img id="torreblanca1" src="../img/torreblanca.png" height="64" draggable="true" ondragstart="agarrar(event)">
				</div>
				<div id="h2" class="columna1 negro" ondrop="soltar(event)" ondragover="activarSoltar(event)">
					<img id="caballoblanco1" src="../img/caballoblanco.png" height="64" draggable="true" ondragstart="agarrar(event)">
				</div>
				<div id="h3" class="columna1 blanco" ondrop="soltar(event)" ondragover="activarSoltar(event)">
					<img id="alfilblanco1" src="../img/alfilblanco.png" height="64" draggable="true" ondragstart="agarrar(event)">
				</div>
				<div id="h4" class="columna1 negro" ondrop="soltar(event)" ondragover="activarSoltar(event)">
					<img id="reinablanca" src="../img/reinablanca.png" height="64" draggable="true" ondragstart="agarrar(event)">
				</div>
				<div id="h5" class="columna1 blanco" ondrop="soltar(event)" ondragover="activarSoltar(event)">
					<img id="reyblanco" src="../img/reyblanco.png" height="64" draggable="true" ondragstart="agarrar(event)">
				</div>
				<div id="h6" class="columna1 negro" ondrop="soltar(event)" ondragover="activarSoltar(event)">
					<img id="alfilblanco2" src="../img/alfilblanco.png" height="64" draggable="true" ondragstart="agarrar(event)">
				</div>
				<div id="h7" class="columna1 blanco" ondrop="soltar(event)" ondragover="activarSoltar(event)">
					<img id="caballoblanco2"src="../img/caballoblanco.png" height="64" draggable="true" ondragstart="agarrar(event)">
				</div>
				<div id="h8" class="columna1 negro" ondrop="soltar(event)" ondragover="activarSoltar(event)">
					<img id="torreblanca2" src="../img/torreblanca.png" height="64" draggable="true" ondragstart="agarrar(event)">
				</div>
				<div class="columnatransparente"> H </div>
				<div class="columnatransparente"></div>
			</div>
			<!-------------------------------------------------fila Coordenada numerica -------------------------------------------->
			
			<div class="fila">
				<div class="columnatransparente"></div>
				<div class="columnatransparente"></div>
				<div class="columnatransparente"> 1 </div>
				<div class="columnatransparente"> 2 </div>
				<div class="columnatransparente"> 3 </div>
				<div class="columnatransparente"> 4 </div>
				<div class="columnatransparente"> 5 </div>
				<div class="columnatransparente"> 6 </div>
				<div class="columnatransparente"> 7 </div>
				<div class="columnatransparente"> 8 </div>
				<div class="columnatransparente"></div>
				<div class="columnatransparente"></div>
			</div>
		</div>
		</section>
	</div>
	
	<script src="../js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="../js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="../js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="../js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="../js/active.js"></script>

    <script src="../js/all.min.js"></script>

    <script type="text/javascript" src="../js/logica.js"></script>
<?php } else { header("Location: ../vista/login.php");} ?>
