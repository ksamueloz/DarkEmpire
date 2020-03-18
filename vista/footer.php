<!-- ##### Footer Area Start ##### -->
    <footer class="footer-area">
        <!-- Main Footer Area -->

        <!-- Copywrite Area -->
        <div class="copywrite-content">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12 col-sm-5">
                        <!-- Copywrite Text -->
                        <p class="copywrite-text"><a href="#"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Creado por, Kevin Samuel Ortiz & Luis Puello Palma<br>
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos los derechos reservados <i class="far fa-heart" aria-hidden="true"></i><a href="https://colorlib.com" target="_blank"></a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                    <div class="col-12 col-sm-7">
                        <!-- Footer Nav -->
                        <div class="footer-nav">
                            <ul><?php
                                    if(!controlSesion :: sesion_iniciada()){
                                ?>
                                <li><a href="./vista/login.php">Iniciar Sesion</a></li>
                                <?php }?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="./js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="./js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="./js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="./js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="./js/active.js"></script>

    <script src="./js/all.min.js"></script>
    <script type="text/javascript" src="./js/logica.js"></script>
</body>
</html>