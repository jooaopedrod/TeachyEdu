<?php

class CursoMentoria {
    private $id;
    private $nome;
    private $imagem;
    private $descricacao;
    private $video;
    private $valor;
    private $tipo;
    private $usuario;

    /**
     * @return mixed
     */
    public function getTipo() {
        return $this->tipo;
    }

    /**
     * @param mixed $tipo
     */
    public function setTipo($tipo): void {
        $this->tipo = $tipo;
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
    public function getDescricacao() {
        return $this->descricacao;
    }

    /**
     * @param mixed $descricacao
     */
    public function setDescricacao($descricacao): void {
        $this->descricacao = $descricacao;
    }

    /**
     * @return mixed
     */
    public function getVideo() {
        return $this->video;
    }

    /**
     * @param mixed $video
     */
    public function setVideo($video): void {
        $this->video = $video;
    }

    /**
     * @return mixed
     */
    public function getValor() {
        return $this->valor;
    }

    /**
     * @param mixed $valor
     */
    public function setValor($valor): void {
        $this->valor = $valor;
    }

}