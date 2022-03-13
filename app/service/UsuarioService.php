<?php
require_once __DIR__ . "/../model/dao/UsuarioDAO.php";
require_once __DIR__ . "/../model/Usuario.php";
require_once('../src/PHPMailer.php');
require_once('../src/SMTP.php');
require_once('../src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class UsuarioService {

    private $requisicao;
    private $dao;
    private $usuario;

    function __construct() {
        $this->usuario = new Usuario();
        $this->dao = new UsuarioDAO();
        $this->requisicao = $_REQUEST["requisicao"];
    }

    function verificarRequisicao() {
        if ($this->requisicao == "logar") {
            try {
                $this->usuario->setEmail($_POST['email']);
                $this->usuario->setSenha($_POST['senha']);
                $this->dao->fazerLogin($this->usuario);
                header("Location: ../view/dashboard/agenda/agendaIndex.php");
            } catch (Exception $e) {
                $_SESSION["erro_mensg"] = $e->getMessage();
                header("Location: ../view/teste.php");
            }
        }

        if ($this->requisicao == "preCadastroEditor") {
            try {
                $this->usuario->setNome($_POST['nome']);
                $this->usuario->setEmail($_POST['email']);
                $this->usuario->setTipoUsuario(1);
                $this->usuario->setToken($this->gerarToken());
                $date = new DateTime();
                $date->add(new DateInterval('P1D'));
                $this->usuario->setValidadeToken($date->format('Y-m-d H:i:s'));

                $this->usuario->setValidacaoToken(0);
                //criar email de verificaçao

                $this->dao->criarEditor($this->usuario);
                $this->emailSenha($_POST['email'], $this->usuario->getToken());
                header("Location: ../view/dashboard/usuario/usuarioIndex.php");

            } catch (Exception $e) {

            }
        }
        if ($this->requisicao == "CadastrarSenha") {
            $this->usuario->setId($_POST['id']);
            $senha = sha1($_POST['senha']);
            $this->usuario->setSenha($senha);
            $this->usuario->setValidacaoToken(1);
            $this->dao->atualizarSenha($this->usuario);
        }
//        if ($this->requisicao == "recuperarSenha") {
//            //"SELECT * FROM `usuario`"
//        }
        if ($this->requisicao == "sair") {
            unset($_SESSION['usuarioSessao']);
            header("Location: ../view/index.php");
        }
        if ($this->requisicao == "Continuar") {
            $editor = $this->dao->consutarEditorPorEmail($_POST['email']);
            if (empty($this->usuario)){
                throw new \Exception('Usuario não encontrado');
            }else{
                $this->usuario->setId($editor['idUsuario']);
                $this->usuario->setToken($this->gerarToken());
                $date = new DateTime();
                $date->add(new DateInterval('P1D'));
                $this->usuario->setValidadeToken($date->format('Y-m-d H:i:s'));
                $this->usuario->setValidacaoToken(0);
                $this->dao->novaSenha($this->usuario);
                $this->emailSenha($_POST['email'], $this->usuario->getToken());
                header("Location: ../view/login.php");
            }
        }
    }

    function gerarToken(): string {
        $tamanho = 16;
        $a = str_split("ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789");
        $token = array();

        for ($i = 0; $i < $tamanho; $i++) {
            $r = rand(0, (sizeof($a) - 1));
            $token[$i] = $a[$r];
        }

        $token = join("", $token);

        return $token;

    }


    function emailSenha($email, $token) {

        $mail = new PHPMailer(true);

        try {
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'teachyedu.pfc@gmail.com';
            $mail->Password = 'senhadaconta';
            $mail->Port = 587;

            $mail->setFrom('teachyedu.pfc@gmail.com');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Nova senha';
            $mail->Body = 'http://localhost/TeachyEdu-PFC/app/view/dashboard/usuario/definirSenha.php?t=' . $token;


            if ($mail->send()) {
                echo 'email enviado';
            } else {
                echo 'email nao enviado';
            }
        } catch (Exception $e) {
            echo "ERRO AO ENVIAR O EMAIL: {$mail->ErrorInfo}";
        }
    }

}