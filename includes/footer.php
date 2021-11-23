
    <?php 
        $uri = $_SERVER['REQUEST_URI'];
        if(stripos(basename($uri), 'login') !== 0 && stripos(basename($uri), 'register') !== 0){
    ?>
    <footer class="text-center bg-dark pt-5 pb-4">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <ul class="footerContato">
                        <li>Doação de Comida(Logo)</li>
                        <li>
                            <ul>
                                <li>Instagram</li>
                                <li>Twitter</li>
                                <li>Facebook</li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="col-12 col-md-6">
                    <ul class="siteMap">
                        <li>Doação de Comida</li>
                            <ul>
                                <li><a href="index.php">Home</a></li>
                                <li><a href="home.php">Ong's</a></li>
                            </ul>
                    </ul>
                    <p class="footerDevs">Desenvolvido por <a href="#">Guilherme Arroio</a> & <a href="#">Weslley Costa</a></p>
                </div>
            </div>
            <div class="col-12">
                <p class="my-4 mb-0 text-light">Rede de Doação para ONGs© Copyright 2021. Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>

    <?php 
        }
    ?>

    <script src="libs/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>