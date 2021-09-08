
    <?php 
        $uri = $_SERVER['REQUEST_URI'];
        if(stripos(basename($uri), 'login') !== 0 && stripos(basename($uri), 'register') !== 0){
    ?>
    <footer class="text-center bg-dark py-4">
        <div class="container">
            <p class="m-0 text-light">Doação de Comida© Copyright 2020. Todos os direitos reservados.</p>
        </div>
    </footer>

    <?php 
        }
    ?>

    <script src="libs/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>