<?php
require_once __DIR__ . "/../service/CursoMentoriaService.php";
$service = new CursoMentoriaService();

try {
    $service->verificarRequisicao();
} catch (Exception $e) {
    echo $e->getMessage();
}
