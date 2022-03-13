<?php
require_once __DIR__ . "/../../database/Connection.php";

class ModuloDAO {

    private $conn;

    function __construct() {
        $this->conn = Connection::getConnection();
    }

    public function criarModulo(Modulo $modulo) {
        try {
            $sql = "INSERT INTO `modulos` (`nomeModulo`, `descricaoModulo`, `idCursoModulo`) 
            VALUES (
            '" . $modulo->getNome() . "', 
            '" . $modulo->getDescricao() . "', 
            '" . $modulo->getCursoModulo() . "')";

            $statement = $this->conn->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            print($e->getMessage());
        }
    }

    public function consultarModulosCursos($id) {
    }

    public function consultarModulo(Modulo $modulo) {

    }

    public function atualizarModulo(Modulo $modulo) {

    }

    public function excluirModulos($id) {
        try {
            $sql = "DELETE FROM `modulos` WHERE idCursoModulo = $id";

            $statement = $this->conn->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            print($e->getMessage());
        }
    }
}