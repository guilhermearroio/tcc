<?php 
    require('../Model/Ong.php');
    session_start();

    $cnpj = $_POST['cnpj'];
    $razaoSocial = $_POST['razaoSocial'];
    $nomeFantasia = $_POST['nomeFantasia'];
    $telefone = $_POST['telefone'];
    $celular = $_POST['celular'];
    $descricao = $_POST['descricao'];
    
    $cep = $_POST['cep'];
    $logradouro = $_POST['logradouro'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    
    $email = $_POST['email'];
    $senha = md5($_POST['senha']);
    $confirmSenha = md5($_POST['confirmSenha']);
    $codUser = md5(date('Y-m-d H:m:s') . $email);

    if($senha !== $confirmSenha){
        header('Location: ../register.php?error=senha');
    }

    $ong = new Ong;

    $user = $ong->cadastro($codUser, $cnpj, $razaoSocial, $nomeFantasia, $telefone, $celular, $descricao, $cep, $logradouro, $numero, $complemento, $bairro, $cidade, $estado, $email, $senha);
    
    $nick = explode(' ', $ong->getRazaoSocial());
    $_SESSION["codUser"] = $ong->getCodUser();
    $_SESSION["tipoUsuario"] = $ong->getTipoUsuario();
    $_SESSION["userName"] = $ong->getNomeFantasia();
    $_SESSION["userEmail"] = $ong->getEmail();

    header('Location: ../home.php');
?>