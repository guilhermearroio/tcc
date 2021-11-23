<?php 

require_once 'Conn.php';

Class Usuarios {

    // ATRIBUTTS
    private $id;
    private $codUser;
    private $email;
    private $senha;
    private $celular;
    private $dataCadastro;
    private $tipoUsuario;

    // SPECIAL METHODS
    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getCodUser(){
        return $this->codUser;
    }

    public function setCodUser($codUser){
        $this->codUser = $codUser;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getSenha(){
        return $this->senha;
    }

    public function setSenha($senha){
        $this->senha = $senha;
    }

    public function getCelular(){
        return $this->celular;
    }

    public function setCelular($celular){
        $this->celular = $celular;
    }

    public function getDataCadastro(){
        return $this->dataCadastro;
    }

    public function setDataCadastro($dataCadastro){
        $this->dataCadastro = $dataCadastro;
    }

    public function getTipoUsuario(){
        return $this->tipoUsuario;
    }

    public function setTipoUsuario($tipoUsuario){
        $this->tipoUsuario = $tipoUsuario;
    }

     // MEHTODS
    public function login($email, $senha) {
        $sql = new Conn();
        
        $results = $sql->select("SELECT * FROM usuario WHERE email = :USERNAME AND senha = :PASSWORD", [
            ":USERNAME" => $email,
            ":PASSWORD"  => $senha
        ]);
        
        if(count($results) > 0)
        {
            return $this->setData($results[0]);
        } else {
            header('Location: ../login.php?login=error');
            throw new Exception("Login ou senha inválidos.", 1550);
        }
    }

    public function visualizaOng(){
        $sql = new Conn();
        
        $results = $sql->select("SELECT * FROM ong INNER JOIN usuario ON usuario.id = ong.idUsuario", []);

        return $results;
    }

    public function recuperaOng($codUser){

        $this->setCodUser($codUser);

        $sql = new Conn();
        
        $results = $sql->select("SELECT             usuario.id,
                                                    usuario.codUser,
                                                    usuario.celular,
                                                    ong.razaoSocial,
                                                    ong.nomeFantasia,
                                                    ong.descricao,
                                                    ong.telefone,
                                                    doacao_bancaria.banco,
                                                    doacao_bancaria.agencia,
                                                    doacao_bancaria.conta,
                                                    doacao_presencial.rua,
                                                    doacao_presencial.numero,
                                                    doacao_presencial.bairro,
                                                    doacao_presencial.cidade,
                                                    doacao_presencial.estado,
                                                    doacao_presencial.cep,
                                                    doacao_presencial.contato,
                                                    doacao_pix.img AS imgPix,
                                                    doacao_pix.codigo AS chavePix
                                FROM                ong
                                INNER JOIN          usuario
                                ON                  usuario.id = ong.idUsuario
                                LEFT JOIN           doacao_presencial
                                ON                  usuario.id = doacao_presencial.idOng
                                LEFT JOIN           doacao_bancaria
                                ON                  usuario.id = doacao_bancaria.idOng
                                LEFT JOIN           doacao_pix
                                ON                  usuario.id = doacao_pix.idOng
                                WHERE               usuario.codUser = :CODUSER
                                AND                 usuario.tipoUsuario = 1", [
            ":CODUSER" => $codUser
        ]);

        return $results;
    }

    public function recuperaGaleriaOng($codUser){

        $this->setCodUser($codUser);

        $sql = new Conn();
        
        $results = $sql->select("SELECT             galeria_ong.imgGaleria,
                                                    galeria_ong.imgTitulo,
                                                    galeria_ong.imgDescricao
                                FROM                galeria_ong
                                INNER JOIN          usuario
                                ON                  galeria_ong.idOng = usuario.id
                                WHERE               usuario.codUser = :CODUSER", [
            ":CODUSER" => $codUser
        ]);

        return $results;
    }

    public function recuperaPergunta($codUser){
        $this->setCodUser($codUser);

        $sql = new Conn();
        
        $results = $sql->select("SELECT         perguntas.pergunta,
                                                perguntas.resposta,
                                                perguntas.id
                                FROM            perguntas
                                INNER JOIN      usuario
                                ON              perguntas.idOng = usuario.id
                                WHERE           usuario.codUser = :CODUSER
                                AND             usuario.tipoUsuario = 1", [
            ":CODUSER" => $codUser
        ]);

        return $results;
    }

    public function setData($data){
        $this->setCodUser($data['codUser']);
        $this->setTipoUsuario($data['tipoUsuario']);
        $this->setEmail($data['email']);
        $this->setSenha($data['senha']);
    }


}

?>