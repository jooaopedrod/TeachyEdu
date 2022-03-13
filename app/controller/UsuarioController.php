<?php
require_once __DIR__ . "/../service/UsuarioService.php";

$service = new UsuarioService();

try {
    $service->verificarRequisicao();
} catch (Exception $e) {
    echo $e->getMessage();
}
