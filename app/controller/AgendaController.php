<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ .  "/../service/AgendaService.php";
require_once __DIR__ . "/../path.php";

$service = new AgendaService();

try {
    $service->verificarRequisicao();
} catch (Exception $e) {
    $_SESSION["erro_msg"] = $e->getMessage();
//    echo $e->getMessage();
    header('location: ' . BASE_URL . 'app/view/dashboard/agenda/FormAgenda.php');
}


