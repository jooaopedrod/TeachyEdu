<?php
require_once __DIR__ . "/../model/dao/CursoMentoriaDAO.php";
require_once __DIR__ . "/../model/CursoMentoria.php";
require_once __DIR__ . "/../model/dao/ModuloDAO.php";
require_once __DIR__ . "/../model/Modulo.php";
include("../path.php");
session_start();

class CursoMentoriaService {

    private $requisicao;
    private $dao;
    private $daoModulo;
    private $cursoMentoria;
    private $modulo;

    function __construct() {
        $this->cursoMentoria = new CursoMentoria();
        $this->dao = new CursoMentoriaDAO();
        $this->daoModulo = new ModuloDAO();
        $this->modulo = new Modulo();
        $this->requisicao = $_REQUEST["requisicao"];
    }

    function verificarRequisicao() {
        if ($this->requisicao == "cadastrarCurso") {
            $this->isCursoMentoriaEmpty();
            $this->cursoMentoria->setNome($_POST["nome"]);
            $this->cursoMentoria->setDescricacao($_POST["descricao"]);
            $this->cursoMentoria->setVideo($_POST["video"]);
            $this->cursoMentoria->setValor($_POST["valor"]);

            if (($_POST['tipo']) == 'Curso') {
                $tipo = 1; //curso
            } else {
                $tipo = 0; //mentoria
            }

            $this->cursoMentoria->setTipo($tipo);

            if (!empty($_FILES['imagem']['name']) && strlen($_FILES['imagem']['name']) < 256) {
                $imagemCursoMentoria = time() . '_' . $_FILES['imagem']['name'];
                $destino = "../../public/images/curso/";

                $result = move_uploaded_file($_FILES['imagem']['tmp_name'], $destino . $imagemCursoMentoria);

                if ($result == true) {
                    $_POST['imagem'] = $imagemCursoMentoria;
                } else {
                    http_response_code(406);
                    throw new Exception("Falha ao carregar a imagem");
                }
            } else {
                http_response_code(406);
                throw new Exception("Imagem é necessaria");
            }
            $this->cursoMentoria->setImagem($imagemCursoMentoria);

            $this->cursoMentoria->setUsuario($_SESSION['usuarioSessao']['idUsuario']);
            $idCurso = $this->dao->criarCursoMentoria($this->cursoMentoria);
            print_r($idCurso);

            $arr = json_decode($_POST["modulos"]);
            foreach ($arr as $m) {
                $this->modulo->setNome($m->nome);
                $this->modulo->setDescricao($m->descricao);
                $this->modulo->setCursoModulo($idCurso);
                $this->daoModulo->criarModulo($this->modulo);
            }
            $_SESSION['suc_msg'] = "Cadastrado com sucesso";
        } else if ($this->requisicao == "atualizarCurso") {
            $this->isCursoMentoriaEmpty();
            $this->cursoMentoria->setId($_POST["idCurso"]);
            $this->cursoMentoria->setNome($_POST["nome"]);
            $this->cursoMentoria->setDescricacao($_POST["descricao"]);
            $this->cursoMentoria->setVideo($_POST["video"]);
            $this->cursoMentoria->setValor($_POST["valor"]);

            if (($_POST['tipo']) == 'Curso') {
                $tipo = 1; //curso
            } else {
                $tipo = 0; //mentoria
            }

            $this->cursoMentoria->setTipo($tipo);

            if (!empty($_FILES['imagem']['name']) && strlen($_FILES['imagem']['name']) < 256) {
                $imagemCurso = time() . '_' . $_FILES['imagem']['name'];
                $destino = "../../public/images/curso/";

                $result = move_uploaded_file($_FILES['imagem']['tmp_name'], $destino . $imagemCurso);

                if ($result == true) {
                    $_POST['imagem'] = $imagemCurso;
                } else {
                    http_response_code(406);
                    throw new Exception("Falha ao carregar a imagem");
                }
            }
            $this->cursoMentoria->setImagem($imagemCurso);
            $this->cursoMentoria->setUsuario($_SESSION['usuarioSessao']['idUsuario']);
            $this->dao->atualizarCursoMentoria($this->cursoMentoria);

            //excluir todos os modulos do curso
            $idCurso = $this->cursoMentoria->getId();

            $this->daoModulo->excluirModulos($idCurso);

            $arr = json_decode($_POST["modulos"]);
            foreach ($arr as $m) {
                $this->modulo->setNome($m->nome);
                $this->modulo->setDescricao($m->descricao);
                $this->modulo->setCursoModulo($idCurso);
                $this->daoModulo->criarModulo($this->modulo);
            }
            $_SESSION['suc_msg'] = "Atualizado com sucesso";
        }
    }

    function isCursoMentoriaEmpty() {
        if (empty($_POST["tipo"])) {
            http_response_code(406);
            throw new Exception("Tipo é obrigatório");
        }
        if (empty($_POST["nome"])) {
            http_response_code(406);
            throw new Exception("Nome é obrigatório");
        }
        if (empty($_POST["descricao"])) {
            http_response_code(406);
            throw new Exception("Descrição é obrigatória");
        }
        if (empty($_POST["valor"])) {
            http_response_code(406);
            throw new Exception("Preço é obrigatório");
        }
    }
}
