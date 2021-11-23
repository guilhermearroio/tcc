<?php

require_once 'Conn.php';

Class Perguntas {
    
    // ATRIBUTTS
    private $codCliente;
    private $codOng;
    private $pergunta;
    private $resposta;
    private $codPergunta;

    // SPECIAL METHODS
    public function __construct(){
        
    }

    public function getCodCliente(){
        return $this->codCliente;
    }

    public function setCodCliente($codCliente){
        $this->codCliente  = $codCliente;
    }

    public function getCodOng(){
        return $this->codOng;
    }

    public function setCodOng($codOng){
        $this->codOng  = $codOng;
    }

    public function getPergunta(){
        return $this->pergunta;
    }

    public function setPergunta($pergunta){
        $this->pergunta  = $pergunta;
    }

    public function getResposta(){
        return $this->resposta;
    }

    public function setResposta($resposta){
        $this->resposta  = $resposta;
    }

    public function getCodPergunta(){
        return $this->codPergunta;
    }

    public function setCodPergunta($codPergunta){
        $this->codPergunta  = $codPergunta;
    }


    // METHODS
    public function enviarPergunta($codCliente, $codOng, $pergunta){

        $this->setCodCliente($codCliente);
        $this->setCodOng($codOng);
        $this->setPergunta($pergunta);

        $sql = new Conn();

        $buscaIds = $sql->select("SELECT id FROM usuario WHERE codUser = :CODCLIENTE OR codUser = :CODONG ORDER BY tipoUsuario ASC", [
            ":CODCLIENTE" => $codCliente,
            ":CODONG" => $codOng
        ]);

        $codCliente = $buscaIds[0]['id'];
        $codOng = $buscaIds[1]['id'];
        $this->setCodCliente($codCliente);
        $this->setCodOng($codOng);

        $result = $sql->insert("INSERT INTO perguntas (idOng, idCliente, pergunta, resposta, dataPergunta, dataResposta) VALUES (:CODONG, :CODCLIENTE, :PERGUNTA, NULL, NOW(), NULL)", [
            ":CODCLIENTE" => $codCliente,
            ":CODONG" => $codOng,
            ":PERGUNTA"  => $pergunta
        ]);

        if($result < 1){
            throw new Exception("Erro ao realizar pergunta", 1550);
        }
    }

    public function enviarResposta($codPergunta, $resposta){

        $this->setCodPergunta($codPergunta);
        $this->setResposta($resposta);

        $sql = new Conn();

        $result = $sql->query("UPDATE perguntas SET resposta = :RESPOSTA, dataResposta = NOW() WHERE id = :CODPERGUNTA", [
            ":CODPERGUNTA" => $codPergunta,
            ":RESPOSTA"  => $resposta
        ]);

        if($result > 0){
            return true;
        }  else {
            throw new Exception("Erro ao realizar pergunta", 1550);
        }

    }
   
}