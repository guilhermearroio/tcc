<?php

require('../model/Usuarios.php');
session_start();

$email = $_POST['email'];
$senha = md5($_POST['confirmSenha']);

$usuario = new Usuarios;

$usuario->login($email, $senha);

/* $nick = explode(' ', $user->getName()); */

$_SESSION["codUser"] = $usuario->getCodUser();
$_SESSION["tipoUsuario"] = $usuario->getTipoUsuario();
/* $_SESSION["nick"] = $nick[0]; */
$_SESSION["userEmail"] = $usuario->getEmail();

header('Location: ../home.php');