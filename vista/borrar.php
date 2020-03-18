<?php  
	require '../controlador/borrar_dato.php';
?>

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
  <title>Borrar Usuario</title>
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
  <div class="formulario_fondo">
        <div class="reg-sesion">
        <h3 class="registro ">Borrar Información Del Usuario</h3>
     </div>
  <form action="#" method="POST">
        <?php  if ($resultado = $consulta->fetch(PDO::FETCH_ASSOC)) { ?>
        <fieldset class="scheduler-border">
                <legend class="scheduler-border">Nombre De Usuario <i class="fa fa-user"></i></legend>
                <input type="text" name="user" placeholder="Nombre De Usuario" class="form-control" 
                value="<?php echo $resultado['nombre_usuario']; ?>" required readonly/>
        </fieldset>
        <fieldset class="scheduler-border">
            <legend class="scheduler-border">Nombre Completo <i class="fa fa-address-book"></i></legend>
            <input type="text" name="nombre" placeholder="Nombre Completo" class="form-control" 
            value="<?php echo $resultado['nombre_completo']; ?>" required readonly/>
        </fieldset>
        <fieldset class="scheduler-border">
                <legend class="scheduler-border">Email <i class="fa fa-envelope"></i></legend>
                <input type="email" name="email" placeholder="Correo" class="form-control" 
                value="<?php echo $resultado['email']; ?>" required readonly/>
        </fieldset>
        <fieldset class="scheduler-border">
                <legend class="scheduler-border">Edad <i class="fa fa-user"></i></legend>
                <input type="number" name="edad" placeholder="Edad" min="0" max="120" class="form-control" 
                value="<?php echo $resultado['edad']; ?>" required readonly/>
         </fieldset>
        <fieldset class="scheduler-border" class="icono-s">
                <legend class="scheduler-border">Sexo <i class="fas fa-venus-mars"></i></legend>
                <input type="text" name="sexo" placeholder="Sexo (M o F)" maxlength="1" onkeyup="this.value=this.value.toUpperCase();" class="form-control" pattern="M|F" 
                value="<?php echo $resultado['sexo']; ?>" required readonly/>
        </fieldset>
         <fieldset class="scheduler-border">
                <legend class="scheduler-border"> Borrar Usuario <i class="fa fa-envelope"></i></legend>
                <input type="submit" name="borrar" value="Enviar" class="btn-primary form-control">
        </fieldset> 
    <?php } ?>
  </form>
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