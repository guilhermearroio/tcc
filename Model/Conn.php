<?php 

Class Conn extends PDO {

    private $conn;

    public function __construct(){
        $this->conn = new PDO("mysql:host=localhost;dbname=doacao_de_comida", "root", "");
    }


    /**
     * Faz o bind de varios parametros de uma query
     * 
     * @param $stmt
     * @param $params
     */
    public function setParams($stmt, $params = []){
        foreach($params as $key => $value) {
            /* $stmt->bindParam($key, $value); */
            $this->setParam($stmt, $key, $value);
        }
    }


    /**
     * Seta apenas um parametro para a query
     * 
     * @param $stmt
     * @param $key
     * @param $vakue
     * 
     */

    public function setParam($stmt, $key, $value){
        $stmt->bindParam($key, $value);
    }


    /**
     * Prepara a query para ser executada
     * 
     * @param $rawquery
     * @param $params
     */

    public function query($rawquery, $params = []){
        $stmt = $this->conn->prepare($rawquery);
        $this->setParams($stmt, $params);
        $stmt->execute();
        return $stmt;
    }

    public function select($rawquery, $params = []){
        $stmt = $this->query($rawquery, $params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert($rawquery, $params = []){
        $stmt = $this->conn->prepare($rawquery);
        $this->setParams($stmt, $params);
        $stmt->execute();
        return $stmt->rowCount();
    }
}