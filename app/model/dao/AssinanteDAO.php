<?php
require __DIR__ . "/../../database/Connection.php";

class AssinanteDAO {

    private $conn;

    function __construct() {
        $this->conn = Connection::getConnection();
    }

    public function criarAssinante(Assinante $assinante) {
        try {
            $sql = "INSERT INTO `assinantes` (`nomeAssinante`,`emailAssinante`,`telefoneAssinante`, `mensagemAssinante`, `interesseAssinante`) 
            VALUES (
            '" . $assinante->getNome() . "', 
            '" . $assinante->getEmail() . "', 
            '" . $assinante->getTelefone() . "', 
            '" . $assinante->getMensagem() . "', 
            '" . $assinante->getInteresse() . "')";
            $statement = $this->conn->prepare($sql); // ou conn->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            print($e->getMessage());
        }
    }

    public function consultarAssinantes() {
        try {
            $sql = "SELECT * FROM `assinantes`";
            $statement = $this->conn->prepare($sql);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;

        } catch (Exception $e) {
            print($e->getMessage());
        }
    }

    public function consultarAssinantesComInteresse() {
        try {
            $sql = "SELECT * FROM `assinantes`";
            $statement = $this->conn->prepare($sql);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;

        } catch (Exception $e) {
            print($e->getMessage());
        }
    }

}

