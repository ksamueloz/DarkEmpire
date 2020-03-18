<?php  
    /* Incluye las caracteristicas que contiene el archivo conexion.php */
    include("./modelo/conexion.php");
    include("./modelo/controlSesion.php");
    /* Inicializa una variable de session */
   conexion :: abrir_conexion();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Dark Empire</title>

    <!-- Favicon -->
    <link rel="icon" href="./img/core-img/logoEye.png">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="./style.css">

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
                            <a href="index.php"><img src="./img/core-img/logoEye.png" alt="" height="70" width="70">Sientete Como En Tu Hogar</a>
                        </div>

                        <!-- Search & Login Area -->
                        <div class="search-login-area d-flex align-items-center">
                            <!-- Register Area -->
                            <!--  -->

                           <?php if (controlSesion :: sesion_iniciada()) {  ?>
                           <a href="./vista/perfil.php">
                                <i class="fas fa-user"></i>
                                <span>
                                    <?php  
                                        echo $_SESSION['$nombre'];
                                    ?>      
                                </span>
                            </a>        
                           <div class="login-area">
                                <a href="./controlador/salir.php"><i class="fas fa-sign-out-alt"></i><span> Cerrar Sesión</span></a>   
                            </div>
                            <?php }else{ ?>
                            
                            <div class="login-area">
                                <a href="../ajedrez/vista/registro.php" title="Registrarse"><span>Registrarse </span> <i class="fas fa-plus" aria-hidden="true"></i></a>
                            </div>
                            <!-- Login Area -->
                            <div class="login-area">
                                <a href="../ajedrez/vista/login.php" title="Iniciar Sesión"><span>Iniciar Sesión </span> <i class="fa fa-sign-in-alt" aria-hidden="true"></i></a>
                            </div>
                            <?php } ?>
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
                                    <li><a href="index.php">Inicio</a></li>
                                    <li><a href="#">Juegos</a>
                                        <ul class="dropdown">
                                            <li><a href="./games/ajedrez.php">Ajedrez</a></li>
                                            <li><a href="./games/numeromagico.php">Número Mágico</a></li>
                                        </ul>
                                    </li>
                                    <?php if(controlSesion :: sesion_iniciada()) { 
                                        if ($_SESSION['$nombre'] != 'Administrador'){?>
                                            <li><a href="#">Opciones</a>
                                                <ul class="dropdown">
                                                    <li><a href="./vista/perfil.php">Ver Perfil</a></li>
                                                    <li><a href="./controlador/salir.php">Cerrar Sesión</a></li>
                                                </ul>
                                            </li>  
                                        <?php }else if($_SESSION['$nombre']=="Administrador"){ ?> 
                                            <li><a href="#">Opciones</a>
                                                <ul class="dropdown">
                                                    <li><a href="./vista/perfil.php">Ver Usuarios</a></li>
                                                    <li><a href="./vista/registro.php">Registrar Usuario</a></li>
                                                    <li><a href="./vista/password.php">Cambiar pass admin</a></li>
                                                    <li><a href="./controlador/salir.php">Cerrar Sesión</a></li>
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
        <?php /*if (isset($_GET['success'])) {
            if($_GET['success'] == 'true')
            {
                echo '<div class="container p-5">
                    <div class="alert alert-success" role="alert">
                      Registrado con exito
                    </div>
                </div>' ;
            }else if(isset($_GET['err'])){

                if($_GET['err'] == 1)
                {
                    echo '<div class="container p-5">
                        <div class="alert alert-danger" role="alert">
                          El usuario ya existe.
                        </div>
                    </div>' ;
                }
                if($_GET['err'] == 2)
                {
                    echo '<div class="container p-5">
                        <div class="alert alert-danger" role="alert">
                          Error en el servidor.
                        </div>
                    </div>' ;
                }
                if($_GET['err'] == 3)
                {
                    echo '<div class="container p-5">
                        <div class="alert alert-danger" role="alert">
                          Usuario o contraseña incorrecta.
                        </div>
                    </div>' ;
                }
            }
        }*/
        ?>
    </header>
    <!-- ##### Header Area End ##### -->

<?php
    //Incluyo el cuerpo principal del programa
    require_once("body.php");
?>