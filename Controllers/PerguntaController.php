<?php

require('../Model/Perguntas.php');

$codCliente = $_POST['codCliente'];
$codOng = $_POST['codOng'];
$pergunta = $_POST['pergunta'];

$perguntas = new Perguntas();

$perguntas->enviarPergunta($codCliente, $codOng, $pergunta);

/* header('Location: ../home.php?busca=' . $pesquisa); */

/* print_r($retorno); */