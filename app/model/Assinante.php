<?php

class Assinante {

    private $id;
    private $nome;
    private $email;
    private $telefone;
    private $mensagem;
    private $interesse;

    /**
     * @return mixed
     */
    public function getMensagem() {
        return $this->mensagem;
    }

    /**
     * @param mixed $mensagem
     */
    public function setMensagem($mensagem): void {
        $this->mensagem = $mensagem;
    }

    /**
     * @return mixed
     */
    public function getInteresse() {
        return $this->interesse;
    }

    /**
     * @param mixed $interesse
     */
    public function setInteresse($interesse): void {
        $this->interesse = $interesse;
    }

    /**
     * @return mixed
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNome() {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome): void {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getTelefone() {
        return $this->telefone;
    }

    /**
     * @param mixed $telefone
     */
    public function setTelefone($telefone): void {
        $this->telefone = $telefone;
    }

}