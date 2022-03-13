<?php
require_once __DIR__ .  "/../path.php";

class LoginFilterService {

    public static function isLogged(){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (empty($_SESSION['usuarioSessao']) || $_SESSION['usuarioSessao'] == null ){
            header('location: ' . BASE_URL. 'app/view/login.php');
        }
    }

    public function filterUserbyRole( int $type, string $urlWhenNotAllowed ){

        LoginFilterService::isLogged();

        if($_SESSION['usuarioSessao']['tipoUsuario'] > $type ) {
            header('location: ' . BASE_URL. $urlWhenNotAllowed);
        }

    }
}