<?php
require_once __DIR__ . "/../model/dao/AgendaDAO.php";
require_once __DIR__ . "/../model/Agenda.php";
include("../path.php");
session_start();

class AgendaService {

    private $requisicao;
    private $dao;
    private $agenda;

    function __construct() {
        $this->agenda = new Agenda();
        $this->dao = new AgendaDAO();
        $this->requisicao = $_REQUEST["requisicao"];
    }

    function verificarRequisicao() {
        if ($this->requisicao == "cadastrarAgenda") {
            try {
                $this->agenda->setTitulo($_POST["titulo"]);
                $this->agenda->setDescricao($_POST["descricao"]);
                $this->agenda->setData(date('Y-m-d H:i', strtotime($_POST['data'])));

                //criar verificaço para imagem
                if (!empty($_FILES['imagem']['name']) && strlen($_FILES['imagem']['name']) < 256) {
                    $imagemAgenda = time() . '_' . $_FILES['imagem']['name'];
                    $destino = "../../public/images/agenda/";

                    $result = move_uploaded_file($_FILES['imagem']['tmp_name'], $destino . $imagemAgenda);

                    if ($result == true) {
                        $_POST['imagem'] = $imagemAgenda;
                    } else {
                        //alert erro
                        throw new Exception("falha ao carregar a imagem ");
                    }
                } else {
                    //alert erro
                    throw new Exception("imagem é necessaria");
                }
                $this->agenda->setImagem($imagemAgenda);
                $this->agenda->setUsuario($_SESSION['usuarioSessao']['idUsuario']);
                $this->dao->criarAgenda($this->agenda);
                $_SESSION['suc_msg'] = "cadastrada com susseso";
                header('location: ' . BASE_URL . 'app/view/dashboard/agenda/agendaIndex.php?acao=cadastro-sucesso');
            } catch (Exception $e) {
                $_SESSION["erro_mnsg"] = $e->getMessage();
                header('location: ' . BASE_URL . 'app/view/dashboard/agenda/FormAgenda.php');

            }
        }
        if ($this->requisicao == "atualizarAgenda") {
            try {
                $this->agenda->setId($_POST["idAgenda"]);
                $this->agenda->setTitulo($_POST["titulo"]);
                $this->agenda->setDescricao($_POST["descricao"]);
                $this->agenda->setData(date('Y-m-d H:i', strtotime($_POST['data'])));
                //criar verificaço para imagem
                if (!empty($_FILES['imagem']['name']) && strlen($_FILES['imagem']['name']) < 256) {
                    $imagemAgenda = time() . '_' . $_FILES['imagem']['name'];
                    $destino = "../../public/images/agenda/";

                    $result = move_uploaded_file($_FILES['imagem']['tmp_name'], $destino . $imagemAgenda);

                    if ($result == true) {
                        $_POST['imagem'] = $imagemAgenda;
                    } else {
                        echo "falha ao carregar a imagem ";
                    }
                    $this->agenda->setImagem($imagemAgenda);
                }
                $this->agenda->setUsuario($_SESSION['usuarioSessao']['idUsuario']);
                $this->dao->atualizarAgenda($this->agenda);
                $_SESSION['suc_msg'] = "Atualizada com susseso";
                header('location: ' . BASE_URL . 'app/view/dashboard/agenda/agendaIndex.php');
            } catch (Exception $e) {
                $_SESSION["erro_mensg"] = $e->getMessage();
            }
        }
    }
}