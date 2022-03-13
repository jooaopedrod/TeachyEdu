<?php

class Usuario {
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $telefone;
    private $imagem;
    private $tipoUsuario;
    private $token;
    private $validacaoToken;
    private $validadeToken;

    /**
     * @return mixed
     */
    public function getValidacaoToken() {
        return $this->validacaoToken;
    }

    /**
     * @param mixed $validacaoToken
     */
    public function setValidacaoToken($validacaoToken): void {
        $this->validacaoToken = $validacaoToken;
    }

    /**
     * @return mixed
     */
    public function getValidadeToken() {
        return $this->validadeToken;
    }

    /**
     * @param mixed $validadeToken
     */
    public function setValidadeToken($validadeToken): void {
        $this->validadeToken = $validadeToken;
    }

    /**
     * @return mixed
     */
    public function getToken() {
        return $this->token;
    }

    /**
     * @param mixed $token
     */
    public function setToken($token): void {
        $this->token = $token;
    }

    /**
     * @return mixed
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTipoUsuario() {
        return $this->tipoUsuario;
    }

    /**
     * @param mixed $tipoUsuario
     */
    public function setTipoUsuario($tipoUsuario): void {
        $this->tipoUsuario = $tipoUsuario;
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
    public function getSenha() {
        return $this->senha;
    }

    /**
     * @param mixed $senha
     */
    public function setSenha($senha): void {
        $this->senha = $senha;
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

    /**
     * @return mixed
     */
    public function getImagem() {
        return $this->imagem;
    }

    /**
     * @param mixed $imagem
     */
    public function setImagem($imagem): void {
        $this->imagem = $imagem;
    }


}