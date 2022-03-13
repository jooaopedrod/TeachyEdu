<?php
require_once __DIR__ . "/../model/dao/AgendaDAO.php";
require_once __DIR__ . "/../model/Agenda.php";

$dao = new AgendaDAO();

if (isset($_POST["agenda_id"])) {
    $agendaModal = array();
    $agendaModal = $dao->consultarAgenda($_POST['agenda_id']);

    $resultado = '<div class="modal-header">';
    $resultado .= '<h5 class="modal-title">' . $agendaModal["tituloAgenda"] . '</h5>';
    $resultado .= '<button type="button" class="btn-close" data-dismiss="modal"></button>';
    $resultado .= '</div>';
    $resultado .= '<div class="modal-body">';
    $resultado .= '<h6 class="">' . date("d F, Y", strtotime($agendaModal["dataHoraAgenda"])) . '</h6>';
    $resultado .= '<h6 class="">' . date("H:s", strtotime($agendaModal["dataHoraAgenda"])) . '</h6>';
    $resultado .= '<p class="">' . $agendaModal["descricaoAgenda"] . '</p>';
    $resultado .= '</div>';

    echo $resultado;

}

