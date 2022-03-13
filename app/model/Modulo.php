<?php

class Modulo {
    private $id;
    private $nome;
    private $descricao;
    private $cursoModulo;

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
    public function getDescricao() {
        return $this->descricao;
    }

    /**
     * @param mixed $descricao
     */
    public function setDescricao($descricao): void {
        $this->descricao = $descricao;
    }

    /**
     * @return mixed
     */
    public function getCursoModulo() {
        return $this->cursoModulo;
    }

    /**
     * @param mixed $cursoModulo
     */
    public function setCursoModulo($cursoModulo): void {
        $this->cursoModulo = $cursoModulo;
    }


}