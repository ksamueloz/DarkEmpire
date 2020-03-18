<?php 

    require '../modelo/controlSesion.php';
    require '../modelo/conexion.php';
    if(controlSesion :: sesion_iniciada()) {
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Luis Puello">
    <link rel="stylesheet" href="../vista/style.css">
    <link rel="stylesheet" href="../style.css">
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script&display=swap" rel="stylesheet">
    <script type="text/javascript" src="../js/logicanumeromagico.js"></script>
    <title>Número Mágico</title>
    <link rel="icon" href="../img/core-img/logoEye.png">

    <!-- Stylesheet -->
</head>
<body onload="init()">
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
                                                    <li><a href="../games/ajedrez.php">Ir Ajedrez</a></li>
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
    <section class = "formulario_fondo gameA">
        <div class="container">
            <fieldset class="scheduler-border">
            <legend class="scheduler-border">Nombre <i class="fa fa-address-book"></i></legend>
            <input type="text" name="nombre" placeholder="Ingresa tu nombre" maxlength="20" id="nombre" class="form-control" required/>
            </fieldset>
            <fieldset class="scheduler-border">
            <legend class="scheduler-border">Ingresa Un Número</legend>
            <input type="number" name="numero" placeholder="Elige un número de 1-1000" min=1 max=100 id="numero" class="form-control" required/>
            </fieldset>
            <fieldset class="scheduler-border">
            <legend class="scheduler-border"><i class="fa fa-envelope"></i></legend>
            <button type="submit" id="e-juego" class="btn-primary form-control btn-block">Jugar</button> 
            </fieldset> 
           <div class="mensage">&nbsp;</div>
            <p id="msm-1"></p><br> <!--msm-1: Mensaje 1-->
            <p id="msm-2"></p> <!--msm-2: Mensaje 2-->
        </div>
    </section>

    <script src="../js/vista.js"></script>

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
</body>
</html>
<?php } else { header("Location: ../vista/login.php");} ?>