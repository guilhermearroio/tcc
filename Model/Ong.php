<?php 

require_once 'Usuarios.php';

Class Ong extends Usuarios {

    // ATRIBUTTS
    private $codUser;
    private $cnpj;
    private $razaoSocial;
    private $nomeFantasia;
    private $telefone;
    private $celular;
    private $descricao;
    private $cep;
    private $logradouro;
    private $numero;
    private $complemento;
    private $bairro;
    private $cidade;
    private $estado;
    private $email;
    private $senha;

    // SPECIAL METHODS
    public function __construct(){
        
    }

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

    public function getCnpj(){
        return $this->cnpj;
    }

    public function setCnpj($cnpj){
        $this->cnpj = $cnpj;
    }

    public function getRazaoSocial(){
        return $this->razaoSocial;
    }

    public function setRazaoSocial($razaoSocial){
        $this->razaoSocial = $razaoSocial;
    }

    public function getNomeFantasia(){
        return $this->nomeFantasia;
    }

    public function setNomeFantasia($nomeFantasia){
        $this->nomeFantasia = $nomeFantasia;
    }

    public function getTelefone(){
        return $this->telefone;
    }

    public function setTelefone($telefone){
        $this->telefone = $telefone;
    }

    public function getCelular(){
        return $this->celular;
    }

    public function setCelular($celular){
        $this->celular = $celular;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }

    public function getCep(){
        return $this->cep;
    }

    public function setCep($cep){
        $this->cep = $cep;
    }

    public function getLogradouro(){
        return $this->logradouro;
    }

    public function setLogradouro($logradouro){
        $this->logradouro = $logradouro;
    }

    public function getNumero(){
        return $this->numero;
    }

    public function setNumero($numero){
        $this->numero = $numero;
    }

    public function getComplemento(){
        return $this->complemento;
    }

    public function setComplemento($complemento){
        $this->complemento = $complemento;
    }

    public function getBairro(){
        return $this->bairro;
    }

    public function setBairro($bairro){
        $this->bairro = $bairro;
    }

    public function getCidade(){
        return $this->cidade;
    }

    public function setCidade($cidade){
        $this->cidade = $cidade;
    }

    public function getEstado(){
        return $this->estado;
    }

    public function setEstado($estado){
        $this->estado = $estado;
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

    // MEHTODS

    public function cadastro($codUser, $cnpj, $razaoSocial, $nomeFantasia, $telefone, $celular, $descricao, $cep, $logradouro, $numero, $complemento, $bairro, $cidade, $estado, $email, $senha){
        
        $this->setCnpj($cnpj);
        $this->setRazaoSocial($razaoSocial);
        $this->setNomeFantasia($nomeFantasia);
        $this->setTelefone($telefone);
        $this->setCelular($celular);
        $this->setDescricao($descricao);
        $this->setCep($cep);
        $this->setLogradouro($logradouro);
        $this->setNumero($numero);
        $this->setComplemento($complemento);
        $this->setBairro($bairro);
        $this->setCidade($cidade);
        $this->setEstado($estado);
        $this->setEmail($email);
        $this->setSenha($senha);
        $this->setCodUser($codUser);

        $sql = new Conn();

        $result = $sql->insert("INSERT INTO usuario (codUser, email, senha, celular, dataCadastro, tipoUsuario) VALUES (:CODUSERONG ,:EMAILONG, :SENHAONG, :CELULAR, NOW(), 1)", [
            ":CODUSERONG" => $codUser,
            ":EMAILONG" => $email,
            ":SENHAONG"  => $senha,
            ":CELULAR"  => $celular
        ]);

        if($result > 0){
            $results = $sql->select("SELECT * FROM usuario WHERE email = :EMAILUSER AND senha = :PASSWORD AND tipoUsuario = 1", [
                ":EMAILUSER" => $email,
                ":PASSWORD"  => $senha
            ]);
            if(count($results) > 0){
                $result2 = $sql->insert("INSERT INTO ong (idUsuario, cnpj, razaoSocial, nomeFantasia, telefone, descricao, cep, logradouro, numero, complemento, bairro, cidade, estado) VALUES (:USERID, :ONGCNPJ, :ONGRAZAOSOCIAL, :ONGNOMEFANTASIA, :ONGTELEFONE, :ONGDESCRICAO, :ONGCEP, :ONGLOGRADOURO, :ONGNUMERO, :ONGCOMPLEMENTO, :ONGBAIRRO, :ONGCIDADE, :ONGESTADO)", [
                    ":USERID" => $results[0]['id'],
                    ":ONGCNPJ" => $cnpj,
                    ":ONGRAZAOSOCIAL"  => $razaoSocial,
                    ":ONGNOMEFANTASIA"  => $nomeFantasia,
                    ":ONGTELEFONE" => $telefone,
                    ":ONGDESCRICAO" => $descricao,
                    ":ONGCEP" => $cep,
                    ":ONGLOGRADOURO" => $logradouro,
                    ":ONGNUMERO" => $numero,
                    ":ONGCOMPLEMENTO" => $complemento,
                    ":ONGBAIRRO" => $bairro,
                    ":ONGCIDADE" => $cidade,
                    ":ONGESTADO" => $estado
                ]);
                if($result2 > 0){
                    return $this->setData($results[0]);
                } else {
                    header('Location: ../register.php?ong=error');
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
        $this->setRazaoSocial($data['razaoSocial']);
        $this->setNomeFantasia($data['nomeFantasia']);
        $this->setTelefone($data['telefone']);
        $this->setDescricao($data['telefone']);
        $this->setCep($data['cep']);
        $this->setLogradouro($data['logradouro']);
        $this->setBairro($data['bairro']);
        $this->setCidade($data['cidade']);
        $this->setEstado($data['estado']);
        $this->setEmail($data['email']);
        $this->setSenha($data['senha']);
    }

}

?>