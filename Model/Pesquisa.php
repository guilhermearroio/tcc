<?php

require_once 'Conn.php';

Class Pesquisa {
    
    // ATRIBUTTS
    private $pesquisa;

    // SPECIAL METHODS
    public function __construct(){
        
    }

    public function getPesquisa(){
        return $this->pesquisa;
    }

    public function setPesquisa($pesquisa){
        $this->pesquisa  = $pesquisa;
    }


    // METHODS
    public function buscarOng($pesquisa){

        $this->setPesquisa($pesquisa);

        $sql = new Conn();

        $result = $sql->select("SELECT          *
                                FROM            ong
                                INNER JOIN      usuario
                                ON              ong.idUsuario = usuario.id
                                WHERE           razaoSocial like concat('%', :USERPESQUISA, '%')
                                OR nomeFantasia like concat('%', :USERPESQUISA, '%')
                                OR descricao LIKE concat('%', :USERPESQUISA, '%')", [
            ":USERPESQUISA" => $pesquisa
        ]);

        return $result;
    }
   
}