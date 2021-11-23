<?php

require('../Model/Perguntas.php');

$codPergunta = $_POST['codPergunta'];
$resposta = $_POST['resposta'];

$perguntas = new Perguntas();

$retorno = $perguntas->enviarResposta($codPergunta, $resposta);

if($retorno){
    header(sprintf('location: %s', $_SERVER['HTTP_REFERER']));
}

/* print_r($retorno); */