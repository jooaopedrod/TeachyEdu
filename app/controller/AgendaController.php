<?php
require_once __DIR__ .  "/../service/AgendaService.php";

$service = new AgendaService();

try {
    $service->verificarRequisicao();
} catch (Exception $e) {
    echo $e->getMessage();
}


