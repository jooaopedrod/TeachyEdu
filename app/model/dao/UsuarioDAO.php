<?php
session_start();
require __DIR__ . "/../../database/Connection.php";


class UsuarioDAO {

    private $conn;

    function __construct() {
        $this->conn = Connection::getConnection();
    }

    public function fazerLogin(Usuario $usuario) {
        session_unset();

        $sql = "SELECT * FROM `usuarios` WHERE `emailUsuario` = :email";
        $statement = $this->conn->prepare($sql);
        $statement->bindValue(':email', $usuario->getEmail());
        $statement->execute();
        if ($statement->rowCount()) {
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            if ($result['senhaUsuario'] == sha1($usuario->getSenha())) {
                $_SESSION['usuarioSessao'] = $result;
                return true;
            } else {
                throw new \Exception('A senha está incorreta');
            }
        }
        throw new \Exception('Usuário não existe');
    }


    public function consutarEditores() {
        try {
            $sql = "SELECT * FROM `usuarios` WHERE `tipoUsuario` = 1";
            $statement = $this->conn->prepare($sql);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e) {
            print($e->getMessage());
        }
    }

    public function criarEditor(Usuario $usuario) {
        $sql = "SELECT * FROM `usuarios` WHERE `emailUsuario` = :email";
        $statement = $this->conn->prepare($sql);
        $statement->bindValue(':email', $usuario->getEmail());
        $statement->execute();

        if (empty($statement->rowCount())) {
            try {
                $sql = "INSERT INTO `usuarios` (`nomeUsuario`, `emailUsuario`, `tokenUsuario`, `tipoUsuario`, `validacaoTokenUsuario`, `validadeTokenUsuario`) 
            VALUES (
            '" . $usuario->getNome() . "', 
            '" . $usuario->getEmail() . "', 
            '" . $usuario->getToken() . "', 
             '" . $usuario->getTipoUsuario() . "',
            '" . $usuario->getValidacaoToken() . "', 
            '" . $usuario->getValidadeToken() . "')";


                $statement = $this->conn->prepare($sql);
                $statement->execute();
            } catch (Exception $e) {
                print($e->getMessage());
            }
        } else {
            throw new \Exception('A email já está cadastrado');
        }

    }

    public function excluirEditor($id) {
        try {
            $sql = "DELETE  FROM `usuarios` WHERE `idUsuario` = $id";
            $statement = $this->conn->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            print($e->getMessage());
        }
    }

    public function consutarEditor($id) {
        try {
            $sql = "SELECT * FROM `usuarios` WHERE `idUsuario` = $id";
            $statement = $this->conn->prepare($sql);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e) {
            print($e->getMessage());
        }
    }

    public function consutarEditorPorToken($token) {
        try {
            $sql = "SELECT * FROM `usuarios` WHERE `tokenUsuario` = '" . $token . "'";
            $statement = $this->conn->prepare($sql);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            print($e->getMessage());
        }
        return $result;
    }

    public function atualizarSenha(Usuario $usuario) {
        try {
            $sql = "UPDATE `usuarios` SET 
            `senhaUsuario` = '" . $usuario->getSenha() . "',
            `validacaoTokenUsuario` = '" . $usuario->getValidacaoToken() . "'
            WHERE `idUsuario` = '" . $usuario->getId() . "'";

            $statement = $this->conn->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            print($e->getMessage());
        }
    }


    public function consutarEditorPorEmail($email) {
        try {
            $sql = "SELECT * FROM `usuarios` WHERE `emailUsuario` = '$email'";
            $statement = $this->conn->prepare($sql);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            print($e->getMessage());
        }
        return $result;
    }

    public function novaSenha(Usuario $usuario) {
        try {
            $sql = "UPDATE `usuarios` SET 
            `validadeTokenUsuario` = '" . $usuario->getValidadeToken() . "',
            `tokenUsuario` = '" . $usuario->getToken() . "',
            `validacaoTokenUsuario` = '" . $usuario->getValidacaoToken() . "'
            WHERE `idUsuario` = '" . $usuario->getId() . "'";

            $statement = $this->conn->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            print($e->getMessage());
        }
    }
}