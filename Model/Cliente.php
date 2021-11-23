<?php

require_once 'Usuarios.php';
require_once 'Conn.php';

Class Cliente extends Usuarios {
    
    // ATRIBUTTS
    private $codUser;
    private $nome;
    private $sobreNome;

    // SPECIAL METHODS
    public function __construct(){
        
    }

    public function getCodUser(){
        return $this->codUser;
    }

    public function setCodUser($codUser){
        $this->codUser = $codUser;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome  = $nome;
    }

    public function getSobreNome(){
        return $this->sobreNome;
    }

    public function setSobreNome($sobreNome){
        $this->sobreNome = $sobreNome;
    }

    // MEHTODS
    public function cadastro($codUser, $nomeUser, $sobreNome, $email, $senha, $celular){

        $this->setNome($nomeUser);
        $this->setSobreNome($sobreNome);
        $this->setEmail($email);
        $this->setSenha($senha);
        $this->setCelular($celular);
        $this->setCodUser($codUser);

        $sql = new Conn();

        $result = $sql->insert("INSERT INTO usuario (codUser, email, senha, celular, dataCadastro, tipoUsuario) VALUES (:CODUSER, :EMAILUSER, :SENHAUSER, :CELULAR, NOW(), 0)", [
            ":CODUSER" => $codUser,
            ":EMAILUSER" => $email,
            ":SENHAUSER"  => $senha,
            ":CELULAR"  => $celular
        ]);

        if($result > 0){
            $results = $sql->select("SELECT * FROM usuario WHERE email = :EMAILUSER AND senha = :PASSWORD AND tipoUsuario = 0", [
                ":EMAILUSER" => $email,
                ":PASSWORD"  => $senha
            ]);
            if(count($results) > 0){
                $result2 = $sql->insert("INSERT INTO cliente (idUsuario, nome, sobreNome) VALUES (:USERID, :USERNOME, :USERSOBRENOME)", [
                    ":USERID" => $results[0]['id'],
                    ":USERNOME"  => $nomeUser,
                    ":USERSOBRENOME"  => $sobreNome
                ]);
                if($result2 > 0){
                    return $this->setData($results[0]);
                } else {
                    header('Location: ../register.php?cliente=error');
                    throw new Exception("Dados Inválidos.", 1550);
                }
            } else {
                header('Location: ../register.php?validated=error');
                throw new Exception("Dados Inválidos.", 1550);
            }
        } else {
            header('Location: ../register.php?create=error');
            throw new Exception("Dados Inválidos.", 1550);
        }
    }

    public function setData($data){
        $this->setId($data['id']);
        $this->setNome($data['nome']);
        $this->setSobreNome($data['sobreNome']);
        $this->setEmail($data['email']);
        $this->setSenha($data['senha']);
    }
    
}