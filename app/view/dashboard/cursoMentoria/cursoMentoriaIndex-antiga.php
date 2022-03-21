<?php
require_once "../../../model/dao/CursoMentoriaDAO.php";
require_once "../../../model/CursoMentoria.php";
require_once __DIR__ . "/../../../service/LoginFilterService.php";
require_once __DIR__ . "/../../../path.php";

LoginFilterService::isLogged();

$dao = new CursoMentoriaDAO();
$cursosMentorias = array();
$cursosMentorias = $dao->consultarCursosMentorias();


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
    <title>Dashboard | Gerenciar Cursos e Mentorias</title>
    <link rel="icon" sizes="500x500" href="../../../../public/images/favicon.png">
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
                <h1 class="text-dark">Curso e mentoria</h1>
            </div>
        </div>
        <div class="row mb-4">
            <div>
                <a class="btn btn-primary" href="FormCursoMentoria.php">Cadastrar novo</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="text-uppercase">
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nome curso</th>
                            <th scope="col">Imagem</th>
                            <th scope="col">Descrição</th>
                            <th class="text-center" scope="col">Video</th>
                            <th scope="col">Valor</th>
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
        // $("#addRow").click(function () {
        //
        //     var table = document.getElementById("tableModulos");
        //     var row = table.insertRow(-1);
        //     var cell1 = row.insertCell(0);
        //     var cell2 = row.insertCell(0);
        //     var cell3 = row.insertCell(0);
        //     cell3.innerHTML = '<input name="nome" type="text">';
        //     cell2.innerHTML = '<input name="descricao"  type="text">';
        //     cell1.innerHTML = '<span class="deleteRow fa fa-trash"></span>';
        //
        //     $(".deleteRow").click(function () {
        //         event.target.parentElement.parentElement.remove();
        //     });
        //
        // });
        // $(".deleteRow").click(function () {
        //     event.target.parentElement.parentElement.remove();
        //
        // });
        //
        // $("#btnSubmit").click(function () {
        //     var nomeCurso = document.getElementById("nome");
        //     var imagemCurso = document.getElementById("imagem");
        //     var descricaoCurso = document.getElementById("descricao");
        //     var videoCurso = document.getElementById("video");
        //     var valorCurso = document.getElementById("valor");
        //     var visibilidade = document.getElementById("visibilidade");
        //     var table = document.getElementById("tableModulos");
        //     var table_body = table.getElementsByTagName("tbody");
        //     var modulos = [];
        //
        //     for (var i = 1; i < table.rows.length; i++) {
        //         var trs = table.getElementsByTagName("tr")[i];
        //         var tdName = trs.cells[0];
        //         var inputName = tdName.getElementsByTagName('input');
        //         var nome = inputName[0].value;
        //
        //         var tdDescricao = trs.cells[1];
        //         var inputDescricao = tdDescricao.getElementsByTagName('input');
        //         var descricao = inputDescricao[0].value;
        //
        //         modulos[i - 1] = {"nome": nome, "descricao": descricao};
        //
        //     }
        //
        //     var curso = {
        //         "nome": nomeCurso.value,
        //         "descricao": descricaoCurso.value,
        //         "imagem": imagemCurso.value,
        //         "video": videoCurso.value,
        //         "valor": valorCurso.value,
        //         "visibilidade": visibilidade.value,
        //         "modulos": modulos,
        //         "requisicao": "cadastrarCurso"
        //     }
        //
        //     $.post('../../../controller/CursoController.php', curso, function (retorna) {
        //
        //     })
        //
        // });

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