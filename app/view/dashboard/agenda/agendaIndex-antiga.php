<?php
require_once "../../../model/dao/AgendaDAO.php";
require_once "../../../model/Agenda.php";
require_once __DIR__ . "/../../../service/LoginFilterService.php";
require_once __DIR__ . "/../../../path.php";

LoginFilterService::isLogged();

$dao = new AgendaDAO();
$agendas = array();
$agendas = $dao->consultarAgendas();

if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $dao->excluirAgenda($id);
    header('location: ' . BASE_URL . 'app/view/dashboard/agenda/agendaIndex.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    <title>Dashboard | Gerenciar Eventos</title>
    <link rel="stylesheet" href="../../../../public/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
</head>
<body>
<?php include("../../includes/sidebarAdmin.php"); ?>
<div class="py-5">
    <div class="container">
        <div class="row mb-3">
            <div>
                <h1 class="text-dark">Agenda</h1>
            </div>
        </div>
        <div class="row mb-4">
            <div>
                <a class="btn btn-primary" href="FormAgenda.php">Cadastrar novo</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="text-uppercase">
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Título</th>
                            <th scope="col">Capa</th>
                            <th scope="col">Data do evento</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Editor</th>
                            <th scope="col">Editar / Remover</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($agendas as $agenda): ?>
                            <tr class="mb-4">
                                <th><?php echo $agenda['idAgenda'] ?></th>
                                <td><?php echo $agenda['tituloAgenda'] ?></td>
                                <td> <img src="../../../../public/images/agenda/<?php echo $agenda['imagemAgenda'] ?>" width="50px" alt=""></td>
                                <td><?php echo date('d/m/Y H:s', strtotime($agenda['dataHoraAgenda'])); ?></td>
                                <td><?php echo substr($agenda['descricaoAgenda'], 0, 50) ?>...</td>
                                <td><?php echo $agenda['autorAgenda'] ?></td>
                                <td>
                                    <a style="text-decoration: none" href="FormAgenda.php?update_id=<?php echo $agenda['idAgenda'] ?>" class="btn btn-success fa fa-pencil"></a>
                                    <a style="text-decoration: none" data-toggle="modal" data-target="#modalAgendaExcluir" id="<?php echo $agenda['idAgenda'] ?>"
                                       class="btn btn-danger fa fa-trash agenda_data"></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalAgendaExcluir" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div id="modalContentExcluir" class="modal-content">
        </div>
    </div>
</div>
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    <div id="toast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header toastBg">
            <img src="../../../../public/images/favicon.png" class="rounded me-2" width="24px" alt="...">
            <strong class="me-auto">Ola, <?php echo $_SESSION['usuarioSessao']['nomeUsuario']?></strong>
            <small></small>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            Hello, world! This is a toast message.
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        //if (getSearchParams('acao') == "cadastro-sucesso") {
        //
        //    $('#toast .toast-body').html("aaaaaaaaaaaaaaaaaaaaaaaa");
        //
        //    $('#toast').toast('show');
        //}
        //
        //if (getSearchParams('acao') == "cadastro-sucesso") {
        //    $('#toast .toast-body').html(<?php //$_SESSION['suc_msg']?>//);
        //    $('#toast').toast('show');
        //    <?php //unset($_SESSION['suc_msg']); ?>
        //}
        $(document).on('click', '.agenda_data', function () {
            var agenda_id = $(this).attr('id');
            if (agenda_id !== '') {
                $.post('excluirAgenda.php', {'agenda_id': agenda_id}, function (retorna) {
                    $("#modalContentExcluir").html(retorna);
                })
            }
        });
        function getSearchParams(k) {
            var p = {};
            location.search.replace(/[?&]+([^=&]+)=([^&]*)/gi, function (s, k, v) {
                p[k] = v
            })
            return k ? p[k] : p;
        }
    });
</script>
</body>
</html>