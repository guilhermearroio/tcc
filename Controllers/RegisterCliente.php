<?php 
    require('../Model/Cliente.php');
    session_start();

    $nomeUser = $_POST['nome'];
    $sobreNome = $_POST['sobrenome'];
    $celular = $_POST['celular'];
    $emailUser = $_POST['email'];
    $senhaUser = md5($_POST['senha']);
    $confirmSenha = md5($_POST['confirmSenha']);
    $codUser = md5(date('Y-m-d H:m:s') . $emailUser);

    if($senhaUser !== $confirmSenha){
        header('Location: ../register.php?error=senha');
    }

    $cliente = new Cliente;

    $user = $cliente->cadastro($codUser, $nomeUser, $sobreNome, $emailUser, $senhaUser, $celular);
    
    $nick = explode(' ', $cliente->getNome());
    $_SESSION["codUser"] = $cliente->getCodUser();
    $_SESSION["userName"] = $cliente->getNome();
    $_SESSION["userEmail"] = $cliente->getEmail();

    header('Location: ../home.php');
?>