<?php
require_once "../../../model/dao/CursoMentoriaDAO.php";
require_once "../../../model/CursoMentoria.php";
require_once __DIR__ . "/../../../service/LoginFilterService.php";
require_once __DIR__ . "/../../../path.php";

LoginFilterService::isLogged();

$dao = new CursoMentoriaDAO();
$cursosMentorias = array();
$cursosMentorias = $dao->consultarCursosMentoriasComEditor();


if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $dao->excluirCursoMentoria($id);
    header('location: ' . BASE_URL . 'app/view/dashboard/cursoMentoria/cursoMentoriaIndex.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Dashboard | Gerenciar Cursos</title>
    <link rel="stylesheet" href="../../../../public/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
</head>
<body class="bodyFundo">
<?php include("../../includes/sidebarAdmin.php"); ?>
<?php if (!empty($_SESSION['suc_msg'])): ?>
    <div class="container pt-5">
        <div class="alert alert-success" role="alert">
            <?php echo $_SESSION['suc_msg'] ?>
            <?php unset($_SESSION['suc_msg']); ?>
        </div>
    </div>
<?php endif; ?>
<div>
    <div class="py-5">
        <div class="container">
            <div class="d-flex flex-column">
                <div>
                    <div class="container-fluid">
                        <h1 class="text-light mb-4">Cursos e Mentorias</h1>
                        <div class="card text-light bg-light shadow">
                            <div class="card-header py-3">
                                <a class="btn btn-primary" href="FormCursoMentoria.php">Cadastrar novo</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                    <table class="table my-0 text-black" id="dataTable">
                                        <thead class="text-uppercase">
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Nome curso</th>
                                            <th scope="col">Imagem</th>
                                            <th scope="col">Descrição</th>
                                            <th class="text-center" scope="col">Video</th>
                                            <th scope="col">Valor</th>
                                            <th scope="col">Editor</th>
                                            <th scope="col">Ações</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($cursosMentorias as $cursoMentoria): ?>
                                            <tr class="mb-4">
                                                <th><?php echo $cursoMentoria['idCursoMentoria'] ?></th>
                                                <td><?php echo $cursoMentoria['nomeCursoMentoria'] ?></td>
                                                <td> <img src="../../../../public/images/curso/<?php echo $cursoMentoria['imagemCursoMentoria'] ?>" width="50px" alt=""></td>
                                                <td><?php echo substr($cursoMentoria['descricaoCursoMentoria'], 0, 50) ?> ...</td>
                                                <?php if ($cursoMentoria['videoCursoMentoria'] != null ):?>
                                                    <td class="text-center"><a href="<?php echo $cursoMentoria['videoCursoMentoria'] ?>" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                                                <?php else: ?>
                                                    <td class="text-center"><i class="fa fa-eye-slash" aria-hidden="true"></i></a></td>
                                                <?php endif;?>
                                                <td><?php echo $cursoMentoria['valorCursoMentoria'] ?></td>
                                                <td><?php echo $cursoMentoria['nomeUsuario'] ?></td>
                                                <td><a style="text-decoration: none" href="FormCursoMentoria.php?update_id=<?php echo $cursoMentoria['idCursoMentoria'] ?>" class=" btn btn-success btn fa fa-pencil"></a></td>
                                                <td><a style="text-decoration: none" data-toggle="modal" data-target="#modalCursoExcluir" id="<?php echo $cursoMentoria['idCursoMentoria'] ?>"
                                                       class="btn btn-danger fa fa-trash cursoMentoria_data"></a>
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
<div class="modal fade" id="modalCursoExcluir" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div id="modalContentExcluir" class="modal-content">
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

        $(document).on('click', '.cursoMentoria_data', function () {
            var cursoMentoria_id = $(this).attr('id');
            if (cursoMentoria_id !== '') {
                $.post('excluirCursoMentoria.php', {'cursoMentoria_id': cursoMentoria_id}, function (retorna) {
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
    })
</script>

</body>

</html>