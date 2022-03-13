<?php
require_once "../../../model/dao/UsuarioDAO.php";
require_once "../../../model/Usuario.php";

$dao = new UsuarioDAO();


if (isset($_POST["usuario_id"])) {
    $usuarioModal = array();
    $usuarioModal = $dao->consutarEditor($_POST['usuario_id']);

    $resultado = '<div class="modal-header">';
    $resultado .= '<h5 class="modal-title" id="TituloModalCentralizado">Tem certeza?</h5>';
    $resultado .= '<button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>';
    $resultado .= '</div>';
    $resultado .= '<div class="modal-body">';
    $resultado .= '<p>A ação não pode ser desfeita. Você não vai mais ver esse conteúdo. </p>';
    $resultado .= '</div>';
    $resultado .= '<div class="modal-footer">';
    $resultado .= '<a type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</a>';
    $resultado .= '<a type="button"  href="usuarioIndex.php?delete_id='. $usuarioModal['idUsuario'].'" class="btn btn-danger">Excluir</a>';
    $resultado .= '</div>';

    echo $resultado;

}


