<?php
require_once __DIR__ .  "/../service/AssinanteService.php";

$service = new AssinanteService();

try {
    $service->verificarRequisicao();
} catch (Exception $e) {
    echo $e->getMessage();
}

