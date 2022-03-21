<?php
require_once "../../../model/dao/AssinanteDAO.php";
require_once "../../../model/Assinante.php";
require_once __DIR__ . "/../../../service/LoginFilterService.php";
require_once __DIR__ . "/../../../path.php";

LoginFilterService::isLogged();

$dao = new AssinanteDAO();
$assinantes = array();
$assinantes = $dao->consultarAssinantesComInteresse();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Dashboard | Gerenciar Assinantes</title>
    <link rel="icon" sizes="500x500" href="../../../../public/images/favicon.png">
    <link rel="stylesheet" href="../../../../public/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
</head>
<body class="bodyFundo">
<?php include("../../includes/sidebarAdmin.php"); ?>
<div>
    <div class="py-5">
        <div class="container">
            <div class="d-flex flex-column">
                <div>
                    <div class="container-fluid">
                        <h1 class="text-light mb-4">Leads</h1>
                        <div class="card text-light bg-light shadow">
                            <div class="card-header py-3">
                                <p class="text-primary m-0 fw-bold">Assinantes</p>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                    <table class="table my-0 text-black" id="dataTable">
                                        <thead class="text-uppercase">
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Nome</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Telefone</th>
                                            <th scope="col">Mensagem</th>
                                            <th scope="col">Interesse</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($assinantes as $assinante): ?>
                                            <tr class="mb-4">
                                                <th><?php echo $assinante['idAssinante'] ?></th>
                                                <td><?php echo $assinante['nomeAssinante'] ?></td>
                                                <td><?php echo $assinante['emailAssinante'] ?></td>
                                                <td><?php echo $assinante['telefoneAssinante'] ?></td>
                                                <td><?php echo substr($assinante['mensagemAssinante'], 0, 50) ?> ...</td>
                                                <td><?php echo ($assinante['nomeCursoMentoria'] == null ? 'FAQ' : $assinante['nomeCursoMentoria'] )?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    <div id="toast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <img src="..." class="rounded me-2" alt="...">
            <strong class="me-auto">Bootstrap</strong>
            <small>11 mins ago</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
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


        if (getSearchParams('acao') == "cadastro-sucesso") {

            $('#toast .toast-body').html("aaaaaaaaaaaaaaaaaaaaaaaa");

            $('#toast').toast('show');
        }

        if (getSearchParams('acao') == "cadastro-sucesso") {
            $('#toast .toast-body').html(<?php $_SESSION['suc_msg']?>);
            $('#toast').toast('show');
            <?php unset($_SESSION['suc_msg']); ?>
        }
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