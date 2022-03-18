<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ .  "/../service/AssinanteService.php";

$service = new AssinanteService();

try {
    $service->verificarRequisicao();
} catch (Exception $e) {
    $_SESSION["erro_msg"] = $e->getMessage();
}

