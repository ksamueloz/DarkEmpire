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
    <title>Juego Memorama</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <meta name="author" content="Samuel Ortiz">
    <link rel="stylesheet" href="../vista/style.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script&display=swap" rel="stylesheet">

    <link rel="icon" href="../img/core-img/logoEye.png">
</head>
<body>
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
                                <div>
                                    <p><a href="../index.php">Inicio</a></p>
                                </div>
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
    <div id = "creditos"></div>
    <div id = "container">
        <ul></ul>
        <div id = "inicio">
            <img src="img/memoria.png" width="100%" height="100%">
            <div id = "inferior">
                <p>Juego De Memoria</p>
                <input type="button" value="Jugar"id="btngame">
            </div>
        </div>
        <div id="contador">
            <p>Diviertete Jugando</p>
        </div>
    </div>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/memory.js"></script>

    <script src="../js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="../js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="../js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="../js/active.js"></script>

    <script src="../js/all.min.js"></script>
    <div class ="index-footer">
    <footer class="footer-area">
        <!-- Main Footer Area -->

        <!-- Copywrite Area -->
        <div class="copywrite-content">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12 col-sm-5">
                        <!-- Copywrite Text -->
                        <p class="copywrite-text"><a href="#"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Creado por, Luis Puello & Samuel Moreno <br>
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos los derechos reservados <i class="far fa-heart" aria-hidden="true"></i><a href="https://colorlib.com" target="_blank"></a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                    <div class="col-12 col-sm-7">
                        <!-- Footer Nav -->
                        <div class="footer-nav">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    </div>
</body>
</html>
<?php } else { header("Location: ../vista/login.php");} ?>