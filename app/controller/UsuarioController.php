<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . "/../service/UsuarioService.php";
require_once __DIR__ . "/../path.php";

$service = new UsuarioService();

try {
    $service->verificarRequisicao();
} catch (Exception $e) {
    $_SESSION["erro_msg"] = $e->getMessage();
    header('location: ' . BASE_URL . 'app/view/login.php');

}
