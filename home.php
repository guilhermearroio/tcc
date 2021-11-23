<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rede de Doação para ONGs - Encontre a ONG que você se identifica</title>

    <link rel="stylesheet" href="assets/css/home.css">
    
    <?php 
        include('includes/header.php');
        $busca = $_GET['busca'] !== '' ? $_GET['busca'] : NULL;

        if(is_null($busca)){
            require_once ('Model/Usuarios.php');
            $usuario = new Usuarios();
            $ongs = $usuario->visualizaOng();
            echo 'usuario';
        } else {
            echo 'pesquisa: ' . $busca;
            require_once ('Model/Pesquisa.php');
            $pesquisa = new Pesquisa();
            $ongs = $pesquisa->buscarOng($busca);
            /* echo 'busca'; */
        }
    ?>

    <section class="content-separator">
        <div class="container">
            <div class="row my-4">
                <?php 
                    if(!empty($ongs)){
                        foreach($ongs as $values){
                 ?>
                    <div class="myCard">
                        <div class="col-12 col-md-3 pe-md-2">
                            <img class="w-100 img-fluid" src="assets/img/logo/<?php echo $values['codUser'] ?>.jpg" alt="">
                        </div>
                        <div class="col-12 col-md-9 ps-md-2 mt-4 mt-md-0">
                            <h2><?php echo empty($values['nomeFantasia']) ? $values['razaoSocial'] : $values['nomeFantasia']; ?></h2>
                            <p><?php echo $values['descricao']; ?></p>
                            <a href="ong.php?codOng=<?php echo $values['codUser'];?>" class="btnConhecer">Visitar</a>
                        </div>
                    </div>
                <?php
                        }
                    } else {
                ?>
                <div class="myCard">
                    <div class="col-12 text-center">
                        <p class="mb-0">Nenhuma ONG encontrada</p>
                    </div>
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </section>

    <script src="assets/js/home.js"></script>
    <?php include('includes/footer.php') ?>
</body>

</html>