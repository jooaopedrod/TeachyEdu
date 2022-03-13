<?php
require __DIR__ . "/../../database/Connection.php";

class CursoMentoriaDAO {

    private $conn;

    function __construct() {
        $this->conn = Connection::getConnection();
    }

    public function criarCursoMentoria(CursoMentoria $cursoMentoria) {
        try {
            $sql = "INSERT INTO `cursosMentorias` (`imagemCursoMentoria`, `nomeCursoMentoria`,`tipoCursoMentoria` ,`descricaoCursoMentoria`, `videoCursoMentoria`, `valorCursoMentoria`, `autorCursoMentoria`) 
            VALUES (
            '" . $cursoMentoria->getImagem() . "', 
            '" . $cursoMentoria->getNome() . "', 
            '" . $cursoMentoria->getTipo() . "', 
            '" . $cursoMentoria->getDescricacao() . "', 
            '" . $cursoMentoria->getVideo() . "', 
            '" . $cursoMentoria->getValor() . "', 
            '" . $cursoMentoria->getUsuario() . "')";

            $statement = $this->conn->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            print($e->getMessage());
        }

        return $this->conn->lastInsertId();
    }

    public function consultarCursosMentorias() {
        try {
            $sql = "SELECT * FROM `cursosMentorias`";
            $statement = $this->conn->prepare($sql);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e) {
            print($e->getMessage());
        }
    }

    public function consultarCursoMentoria($id) {
        try {
            $sql = "SELECT * FROM `cursosMentorias` WHERE idCursoMentoria = $id";
            $statement = $this->conn->prepare($sql);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e) {
            print($e->getMessage());
        }
    }

    public function consultarCursoMentoriaCompleto($id) {
        try {
            $sql = "SELECT c.idCursoMentoria, c.imagemCursoMentoria, c.nomeCursoMentoria, c.descricaoCursoMentoria, c.videoCursoMentoria, c.tipoCursoMentoria, c.valorCursoMentoria,
       m.idModulo ,m.nomeModulo, m.descricaoModulo 
                FROM cursosMentorias c,  modulos m WHERE c.idCursoMentoria = $id AND m.idCursoModulo = $id";

//
//            SELECT c.idCursoMentoria, c.imagemCursoMentoria, c.nomeCursoMentoria, c.descricaoCursoMentoria, c.videoCursoMentoria, c.visibilidadeCursoMentoria, c.valorCursoMentoria FROM cursosMentorias c WHERE c.idCursoMentoria = 1;
//
//SELECT m.idModulo ,m.nomeModulo, m.descricaoModulo FROM  modulos m WHERE m.idCursoModulo = 1;

            $statement = $this->conn->prepare($sql);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e) {
            print($e->getMessage());
        }
    }

    public function consultarCursoMentoriaComModulos($id) {
        try {
            //or seleciona 1, colocar o AND para curso exclusivo
            $sqlCursoMentoria = "SELECT c.idCursoMentoria, c.imagemCursoMentoria, c.nomeCursoMentoria, c.descricaoCursoMentoria, c.videoCursoMentoria, c.tipoCursoMentoria, c.valorCursoMentoria FROM cursosMentorias c WHERE c.idCursoMentoria = $id";


            $statement = $this->conn->prepare($sqlCursoMentoria);
            $statement->execute();
            $resultCursoMentoria = $statement->fetch(PDO::FETCH_ASSOC);

            $sqlModulos = "SELECT m.idModulo ,m.nomeModulo, m.descricaoModulo FROM  modulos m WHERE m.idCursoModulo = $id";
            $statement = $this->conn->prepare($sqlModulos);
            $statement->execute();
            $resultModulos = $statement->fetchAll(PDO::FETCH_ASSOC);

            $resultCursoMentoria["Modulos"] = $resultModulos;

            return $resultCursoMentoria;
        } catch (Exception $e) {
            print($e->getMessage());
        }
    }

    public function atualizarCursoMentoria(CursoMentoria $cursoMentoria) {
        try {
            $sql = "UPDATE `cursosMentorias` SET 
            `nomeCursoMentoria` = '" . $cursoMentoria->getNome() . "', 
            `descricaoCursoMentoria` = '" . $cursoMentoria->getDescricacao() . "', 
            `videoCursoMentoria` = '" . $cursoMentoria->getVideo() . "', 
            `valorCursoMentoria` = '" . $cursoMentoria->getValor() . "', 
            `tipoCursoMentoria` = '" . $cursoMentoria->getTipo() . "' 
            WHERE idCursoMentoria = '" . $cursoMentoria->getId() . "'";


            $statement = $this->conn->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            print($e->getMessage());
        }
        if (!empty($cursoMentoria->getImagem())) {
            $this->atualizarImagemCursoMentoria($cursoMentoria);
        }
    }

    public function atualizarImagemCursoMentoria(CursoMentoria $cursoMentoria) {
        try {
            $sql = "UPDATE `cursosMentorias` SET 
        `imagemCursoMentoria` = '" . $cursoMentoria->getImagem() . "' 
        WHERE `idCursoMentoria` = '" . $cursoMentoria->getId() . "'";

            $statement = $this->conn->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            print($e->getMessage());
        }
    }

    public function excluirCursoMentoria($id) {
        try {
            $sql = "DELETE FROM `cursosMentorias` WHERE idCursoMentoria = $id";
            $statement = $this->conn->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            print($e->getMessage());
        }
    }

    public function consultarModulosCursosMentorias($id) {
        try {
            $sql = "SELECT * FROM `modulos` WHERE idCursoModulo = $id";
            $statement = $this->conn->prepare($sql);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e) {
            print($e->getMessage());
        }
    }

    public function consultarPorTipo($id) {
        try {
            $sql = "SELECT * FROM `cursosMentorias` WHERE `tipoCursoMentoria` = $id";
            $statement = $this->conn->prepare($sql);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e) {
            print($e->getMessage());
        }
    }

}