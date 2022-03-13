<?php

class Agenda {

    private $id;
    private $titulo;
    private $imagem;
    private $data;
    private $descricao;
    private $usuario;

    /**
     * @return mixed
     */
    public function getUsuario() {
        return $this->usuario;
    }

    /**
     * @param mixed $usuario
     */
    public function setUsuario($usuario): void {
        $this->usuario = $usuario;
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
    public function getTitulo() {
        return $this->titulo;
    }

    /**
     * @param mixed $titulo
     */
    public function setTitulo($titulo): void {
        $this->titulo = $titulo;
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

    /**
     * @return mixed
     */
    public function getData() {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data): void {
        $this->data = $data;
    }

    /**
     * @return mixed
     */
    public function getDescricao() {
        return $this->descricao;
    }

    /**
     * @param mixed $descricao
     */
    public function setDescricao($descricao): void {
        $this->descricao = $descricao;
    }


}