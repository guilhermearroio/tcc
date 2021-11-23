<?php 
error_reporting(0);
require_once('Model/Usuarios.php');
session_start();
$ongs = new Usuarios();

$codOng = $_GET['codOng'];
$codCliente = $_SESSION["codUser"];
$tipoUsuario = $_SESSION["tipoUsuario"];

$ong = $ongs->recuperaOng($codOng);
$ong = $ong[0];

$galeria = $ongs->recuperaGaleriaOng($codOng);

$perguntas = $ongs->recuperaPergunta($codOng);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo empty($ong['nomeFantasia']) ? $ong['razaoSocial'] : $ong['nomeFantasia']; ?> - Doe Comida e Salve Vidas !</title>
    
    <link rel="stylesheet" href="libs/owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="libs/owlcarousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/ong.css">

    <?php include('includes/header.php') ?>

    <section class="ong-top content-separator">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-2 mb-5 mb-md-0 d-flex align-items-center justify-content-center">
                    <img class="img-fluid imgOng" src="assets/img/logo/<?php echo $ong['codUser'] ?>.jpg" alt="">
                </div>
                <div class="col-12 col-md-10">
                    <h1><?php echo empty($ong['nomeFantasia']) ? $ong['razaoSocial'] : $ong['nomeFantasia']; ?></h1>
                    <p><?php echo $ong['descricao']; ?></p>
                </div>
            </div>
        </div>
    </section>

    <section class="content-separator">
        <div class="container">
            <div class="row">
                <?php if(!empty($ong['rua'])){ ?>
                    <div class="col-12 col-md-4">
                        <h4 class="text-center">Doação Presencial</h4>
                        <ul class="doacaoList">
                            <li></li>
                            <li>Rua: <?php echo $ong['rua']; ?></li>
                            <li>Bairro: <?php echo $ong['bairro']; ?></li>
                            <li>Cidade: <?php echo $ong['cidade']; ?></li>
                            <li>Estado: <?php echo $ong['estado']; ?></li>
                            <li>Cep: <?php echo $ong['cep']; ?></li>
                            <li>Contato: <?php echo $ong['contato']; ?></li>
                            <!-- <li><a href="https://www.institutoalimentar.org.br/">https://www.institutoalimentar.org.br/</a></li> -->
                        </ul>
                    </div>
                <?php } if(!empty($ong['banco'])){ ?>
                <div class="col-12 col-md-4">
                    <h4 class="text-center">Doação Bancária</h4>
                    <ul class="doacaoList">
                        <li><span>Razão Social:</span> <?php echo empty($ong['nomeFantasia']) ? $ong['razaoSocial'] : $ong['nomeFantasia']; ?></li>
                        <li>Banco: <?php echo $ong['banco']; ?></li>
                        <li>Agencia: <?php echo $ong['agencia']; ?></li>
                        <li>C/C: <?php echo $ong['conta']; ?></li>
                    </ul>
                </div>
                <?php } if(!empty($ong['imgPix']) || !empty($ong['chavePix'])){ ?>
                <div class="col-12 col-md-4 d-flex align-items-center flex-column">
                    <h4 class="text-center">Pix </h4>
                    <?php if(!empty($ong['imgPix'])){ ?><img class="w-50" src="assets/img/pix/<?php echo $ong['imgPix']; ?>"> <?php } ?>
                    <?php if(!empty($ong['chavePix'])){ ?><p>Chave Pix: <?php echo $ong['chavePix']; ?></p> <?php } ?>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <?php
        if(count($galeria) > 0){
    ?>
    <section class="content-separator">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4 class="ms-4">Galeria (<?php echo count($galeria); ?>)</h4>
                </div>
                <div class="col-12">
                    <div class="owl-carousel">
                        <?php foreach($galeria as $value){ ?>
                            <div>
                                <img src="assets/img/galeria/<?php echo $value['imgGaleria']; ?>" title="<?php echo $value['imgTitulo']; ?>" alt="<?php echo $value['imgDescricao']; ?>">
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
        }    
    ?>

    <section class="content-separator">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 offset-md-3">
                    <?php if(isset($codOng) && isset($codCliente) && $tipoUsuario == 0){ ?>
                        <h4>Pergunte a ONG</h4>
                        <!-- <form action="Controllers/PerguntaController.php" method="post"> -->
                            <div class="input-group mb-3 perguntaGroup" data-codOng="<?php echo $codOng ?>" data-codCliente="<?php echo $codCliente ?>">
                                <input type="text" class="form-control" placeholder="Escreva sua pergunta..." aria-label="Recipient's username" aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon2">Perguntar</button>
                            </div>
                        <!-- </form> -->
                    <?php } ?>
                    <h5 class="titlePerguntas mt-3 mt-md-5">Últimas perguntas feitas (<?php echo count($perguntas) ?>)</h5>
                    <?php foreach($perguntas as $pergunta){ ?>
                        <div class="boxPergunta my-4">
                            <span class="pergunta" data-codPergunta="<?php echo $pergunta['id'] ?>"><?php echo $pergunta['pergunta'] ?></span>
                            <?php if($pergunta['resposta'] == NULL){ ?>
                                <span class="semResposta">*Está pergunta ainda não foi respondida*</span>
                            <?php } else { ?>
                                <span class="resposta"><?php echo $pergunta['resposta'] ?></span>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>

    <script src="libs/jquery.min.js"></script>
    <script src="libs/owlcarousel/owl.carousel.min.js"></script>
    <script src="assets/js/ong.js"></script>
    <?php include('includes/footer.php') ?>

    <script>
        $(document).ready(function(){
            var tipoUsuario = "<?php echo $_SESSION['tipoUsuario'] ?>";
            var codUser = "<?php echo $_SESSION['codUser'] ?>";
            if(tipoUsuario == 1 && codUser !== null){
                $('span.semResposta, span.resposta').addClass("ongUserResposta");
                $('.ongUserResposta').on('click', function(){
                    var codPergunta = $(this).prev('.pergunta').attr('data-codPergunta');
                    $('.formResposta').remove();
                    $('.ongUserResposta').removeClass('d-none');
                    var formHtml = '<form class="d-flex formResposta" action="controllers/RespostaController.php" method="POST"><input type="hidden" name="codPergunta" value="' + codPergunta + '"><input class="form-control me-2" name="resposta" type="search" placeholder="Digite a sua resposta" aria-label="Search"><button class="btn btn-outline-success btnPesquisar" type="submit">Responder</button></form>';
                    $(this).after(formHtml);
                    $(this).addClass('d-none');
                });
            }
        });
    </script>
</body>

</html>