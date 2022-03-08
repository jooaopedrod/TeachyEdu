<?php
require_once __DIR__ . "/../model/dao/AssinanteDAO.php";
require_once __DIR__ .  "/../model/Assinante.php";
include("../path.php");


class AssinanteService {

    private $requisicao;
    private $dao;
    private $assinante;

    function __construct() {
        $this->assinante = new Assinante();
        $this->dao = new AssinanteDAO();
        $this->requisicao = $_REQUEST["requisicao"];
    }

    function verificarRequisicao() {
        if ($this->requisicao == "cadastrarAssinante") {
            try {
                $this->assinante->setNome($_POST["nomeAssinante"]);
                $this->assinante->setEmail($_POST["emailAssinante"]);
                $this->assinante->setTelefone($_POST["telefoneAssinante"]);
                $this->assinante->setMensagem($_POST["mensagemAssinante"]);
                $this->assinante->setInteresse($_POST["interesseAssinante"]);
                $this->dao->criarAssinante($this->assinante);
                $_SESSION['suc_msg'] = 'Mensagem enviada com sucesso!';
                header('location: ' . BASE_URL . 'app/view/FAQ.php');
            }catch (Exception $e){
                print($e->getMessage());
            }
        }if ($this->requisicao == "cadastrarAssinanteCursoMentoria") {
            try {
                $this->assinante->setNome($_POST["nomeAssinante"]);
                $this->assinante->setEmail($_POST["emailAssinante"]);
                $this->assinante->setTelefone($_POST["telefoneAssinante"]);
                $this->assinante->setMensagem($_POST["mensagemAssinante"]);
                $this->assinante->setInteresse($_POST["interesseAssinante"]);
                $this->dao->criarAssinante($this->assinante);
                $_SESSION['suc_msg'] = 'Mensagem enviada com sucesso!';
                header('location: ' . BASE_URL . 'app/view/cursoDetalhado-2.php?idCurso='.$this->assinante->getInteresse() );
            }catch (Exception $e){
                print($e->getMessage());
            }
        }
    }
}