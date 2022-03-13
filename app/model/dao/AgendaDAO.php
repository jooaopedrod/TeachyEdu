<?php
require __DIR__ . "/../../database/Connection.php";

class AgendaDAO {

    private $conn;

    function __construct() {
        $this->conn = Connection::getConnection();
    }

    public function criarAgenda(Agenda $agenda) {
        try {
            $sql = "INSERT INTO `agendas` (`tituloAgenda`, `imagemAgenda`,`dataHoraAgenda`,  `descricaoAgenda`, `autorAgenda`) 
            VALUES (
            '" . $agenda->getTitulo() . "', 
            '" . $agenda->getImagem() . "', 
            '" . $agenda->getData() . "', 
            '" . $agenda->getDescricao() . "', 
            '" . $agenda->getUsuario() . "')";

            $statement = $this->conn->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            print($e->getMessage());
        }
    }

    public function consultarAgendas() {
        try {
            $sql = "SELECT * FROM `agendas`";
            $statement = $this->conn->prepare($sql);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;

        } catch (Exception $e) {
            print($e->getMessage());
        }
    }

    public function consultarAgendas30dias() {
        try {
            $sql = "SELECT * FROM `agendas` where date_add(dataHoraAgenda, INTERVAL 30 DAY) > NOW()";

            $statement = $this->conn->prepare($sql);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;

        } catch (Exception $e) {
            print($e->getMessage());
        }
    }

    public function consultarAgenda($id) {
        try {
            $sql = "SELECT * FROM `agendas` WHERE idAgenda = $id";
            $statement = $this->conn->prepare($sql);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e) {
            print($e->getMessage());
        }
    }

    public function atualizarAgenda(Agenda $agenda) {
        try {
            $sql = "UPDATE `agendas` SET 
            `tituloAgenda` = '" . $agenda->getTitulo() . "', 
            `dataHoraAgenda` = '" . $agenda->getData() . "', 
            `descricaoAgenda` = '" . $agenda->getDescricao() . "' 
            WHERE idAgenda = '" . $agenda->getId() . "'";

            $statement = $this->conn->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            print($e->getMessage());
        }

        if (!empty($agenda->getImagem())) {
            $this->atualizarImagemAgenda($agenda);
        }
    }

    public function atualizarImagemAgenda(Agenda $agenda) {
        try {
            $sql = "UPDATE `agendas` SET 
        `imagemAgenda` = '" . $agenda->getImagem() . "' 
        WHERE idAgenda = '" . $agenda->getId() . "'";

            $statement = $this->conn->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            print($e->getMessage());
        }
    }

    public
    function excluirAgenda($id) {
        try {
            $sql = "DELETE FROM `agendas` WHERE idAgenda = $id";
            $statement = $this->conn->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            print($e->getMessage());
        }
    }
}

