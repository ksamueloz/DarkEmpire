
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="icon" href="../img/core-img/logoEye.png">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="../style.css">
    <!-- Title -->
    <title>Perfil</title>
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

                                    <li><a href="#">Opciones</a>
                                        <ul class="dropdown">
                                            <li><a href="../games/ajedrez.php">Ir Ajedrez</a></li>
                                            <li><a href="../games/numeromagico.php">ir A Número Mágico</a></li>
                                            <li><a href="../vista/password.php">Cambiar contraseña</a></li>
                                            <li><a href="../controlador/salir.php">Cerrar Sesion</a></li>
                                        </ul>
                                    </li>
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
    <!-- <?php 
    // if(isset($_POST['ingresar'])){
     // $validador -> mostrar_error(); } ?> -->
    <div class="formulario_fondo">
        <div class="reg-sesion">
            <h1 class="registro">
               <?php  
                    /* Aca mostramos la variable row, mostrando el nombre del usuario de manera dinamica */
                    echo "Datos del Perfil"
                ?>      
            </h1>
                <?php 
                    //Creo una variable usuario y le paso los datos a través de la $_SESSION por el nombre que está guardado allí.
                    //Si colocas obtener_usuario y le pasas el nombre te tira error
                    //En la consulta estamos verificando es el nombre que se guarda en la SESIÓN
                    $usuario= repositorioUsuario :: obtener_usuarioNombre(conexion::obtener_conexion(), $_SESSION['$nombre']);
                    $datos = array( //Creo un Array llamado $datos para acceder a ellos de una mejor forma.
                                  $usuario -> getNombre(),
                                  $usuario -> getUsuario(),
                                  $usuario -> getEdad(),
                                  $usuario -> getSexo(),
                                  $usuario -> getEmail()
                                  );
                    //$longitud = count($datos); //Esto es para recorrerlo todo de golpe, pero necesitamos uno a uno, creo.
                    if (!is_null($usuario)){ ?>
                        
                        <fieldset class="scheduler-border">
                                <legend class="scheduler-border"><i class="fa fa-address-book"></i> Nombre completo</legend>
                                <?php echo "". $datos[0]."";?>
                        </fieldset>
                        <fieldset class="scheduler-border">
                                <legend class="scheduler-border"><i class="fa fa-user"></i> Nombre de usuario</legend>
                                <?php echo "". $datos[1].""; ?>
                        </fieldset>
                        <fieldset class="scheduler-border">
                                <legend class="scheduler-border"><i class="fa fa-user"></i> Edad</legend>
                                <?php echo "". $datos[2]."";?>
                        </fieldset>
                        <fieldset class="scheduler-border">
                                <legend class="scheduler-border"><i class="fas fa-venus-mars"></i> Sexo</legend>
                                <?php echo "". $datos[3].""; ?>
                        </fieldset>
                        <fieldset class="scheduler-border">
                                <legend class="scheduler-border"><i class="fa fa-envelope"></i> Correo</legend>
                                <?php echo "". $datos[4]."";}?>
                        </fieldset>
        </div>
    </div>
    

    <!-- /*Añado los Script*/ -->
    <script src="../js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="../js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="../js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="../js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="../js/active.js"></script>
    <!-- All min js -->
    <script src="../js/all.min.js"></script>  
</html> 