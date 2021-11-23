<?php

require('../model/Pesquisa.php');
session_start();

$pesquisa = $_POST['pesquisa'];

header('Location: ../home.php?busca=' . $pesquisa);

/* print_r($retorno); */