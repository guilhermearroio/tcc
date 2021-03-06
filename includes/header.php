<?php 
    ini_set('display_errors', 0);
    error_reporting(0);
    session_cache_expire(5);
    session_start();
    //session_destroy();
?>

    <meta name="description" content="Desenvolvimento de uma aplicação web com intuito de auxiliar nas doações para entidades que ajudam pessoas carentes e necessitadas no Brasil.">
    <meta name="keywords" content="doação, doar, comida, como doar, como doar, como doar comida">
    <meta name="abstract" content="Rede de Doação para ONGs">
    <meta name="robots" content="index, follow">
    <meta name="robots" content="ALL">
    <meta name="application-name" content="https://www.doacao-de-comida.com.br">
    <meta property="og:image" content="https://www.doacao-de-comida.com.br/images/bg-negocios.jpg">
    <meta property="og:image:type" content="image/svg">
    <meta property="og:image:width" content="800">
    <meta property="og:image:height" content="600">
    <meta property="publisher" content="Rede de Doação para ONGs - Venha ajudar ONG's a concluirem seus objetivos na sociedade, faça sua parte.">
    <meta property="og:locale" content="pt_BR">
    <meta property="og:type" content="company">
    <meta property="og:country-name" content="Brasil">
    <meta property="og:title" content="Rede de Doação para ONGs - Venha ajudar ONG's a concluirem seus objetivos na sociedade, faça sua parte.">
    <meta property="og:site_name" content="Rede de Doação para ONGs">
    <meta property="og:url" content="https://www.doacao-de-comida.com.br">
    <meta name="author" content="Guilherme Arroio & Weslley Costa">
    <meta property="og:description" content="Encontre ONG's ajudeas, para que elas consigam cumprir seus objetivos na sociedade, faça sua parte e ajude o Brasil.">

    <link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">

</head>

<body>
    <?php 
        $uri = $_SERVER['REQUEST_URI'];
        if(stripos(basename($uri), 'login') !== 0 && stripos(basename($uri), 'register') !== 0){
    ?>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">RDO</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSubMenu" aria-controls="navbarSubMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSubMenu">
                <form class="d-flex" action="controllers/PesquisaController.php" method="POST">
                    <input class="btnPesquisa form-control me-2" name="pesquisa" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success btnPesquisar" type="submit">Search</button>
                </form>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link text-light" href="home.php" title="Página de login">ONG's</a>
                    </li>
                    <li class="nav-item">
                        <?php
                            if($_SESSION['codUser'] == TRUE){
                        ?>
                        <form action="controllers/Sair.php" method="post">
                            <button type="submit" class="btn text-light">
                                Sair
                            </button>
                        </form>
                        <?php 
                            } else {
                        ?>
                            <a class="nav-link text-light" href="login.php" title="Página de login">Login</a>
                        <?php 
                            }
                        ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <?php 
        }
    ?>