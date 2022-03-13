<?php
require_once "../../../model/dao/CursoMentoriaDAO.php";
require_once "../../../model/CursoMentoria.php";
require_once __DIR__ . "/../../../service/LoginFilterService.php";
require_once __DIR__ . "/../../../path.php";

LoginFilterService::isLogged();

if (isset($_GET['update_id'])) {
    $id = $_GET['update_id'];
    $dao = new CursoMentoriaDAO();
    $cursoMentoria = array();
    $cursoMentoria = $dao->consultarCursoMentoriaComModulos($id);

    $id = $cursoMentoria['idCursoMentoria'];
    $imagem = $cursoMentoria['imagemCursoMentoria'];
    $nome = $cursoMentoria['nomeCursoMentoria'];
    $tipo = $cursoMentoria['tipoCursoMentoria'];
    $descricao = $cursoMentoria['descricaoCursoMentoria'];
    $video = $cursoMentoria['videoCursoMentoria'];
    $valor = $cursoMentoria['valorCursoMentoria'];
    $modulos = $cursoMentoria['Modulos'];
    $requisicao = 'atualizarCurso';
} else {
    $id = '';
    $imagem = '';
    $nome = '';
    $descricao = '';
    $video = '';
    $tipo = '';
    $valor = '';
    $modulos = array();
    $requisicao = 'cadastrarCurso';
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
        <div class="row mb-4">
            <div>
                <h1>Editar</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form enctype="multipart/form-data">
                    <div class="form-group row mb-3">
                        <label class="col-2 col-form-label mb-3">Tipo</label>
                        <?php if ($tipo != null): ?>
                            <?php if ($tipo == 1): ?>
                                <div class="col-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="tipo" id="tipoCursoCurso" value="curso" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            Curso
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="tipo" id="tipoCursoMentoria" value="mentoria">
                                        <label class="form-check-label" for="exampleRadios2">
                                            Mentoria
                                        </label>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="col-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="tipo" id="tipoCursoCurso" value="curso">
                                        <label class="form-check-label" for="exampleRadios1">
                                            Curso
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="tipo" id="tipoCursoMentoria" value="mentoria" checked>
                                        <label class="form-check-label" for="exampleRadios2">
                                            Mentoria
                                        </label>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php else: ?>
                            <div class="col-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tipo" id="tipoCursoCurso" value="curso" checked>
                                    <label class="form-check-label" for="exampleRadios1">
                                        Curso
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tipo" id="tipoCursoMentoria" value="mentoria">
                                    <label class="form-check-label" for="exampleRadios2">
                                        Mentoria
                                    </label>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="form-group row">
                        <input type="hidden" id="idCurso" value="<?php echo $id ?>">
                        <label class="col-2 col-form-label mb-3">Nome</label>
                        <div class="col-10">
                            <input type="text" class="form-control rounded-4" name="nome" id="nome" required value="<?php echo $nome ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label mb-3">Imagem</label>
                        <div class="col-10">
                            <img src="../../../../public/images/agenda/<?php echo $imagem; ?>" width="50px" alt="">
                            <input type="file" name="imagem" id="imagem" accept="image/png,image/jpeg" required value="<?php echo $imagem ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label mb-3" style="">Descrição</label>
                        <div class="col-10" style="">
                            <textarea class="form-control mb-3" name="descricao" id="descricao" required><?php echo $descricao ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label mb-3">Video</label>
                        <div class="col-10">
                            <input type="url" class="form-control rounded-4" name="video" id="video" value="<?php echo $video ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label mb-3">Preço</label>
                        <div class="col-10">
                            <input type="number" class="form-control rounded-4" name="valor" id="valor" required value="<?php echo $valor ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2 col-form-label mb-3">Modulos</label>
                        <div class="col-10">
                            <span class="btn btn-primary btn-sm fa fa-plus" id="addRow"></span>
                            <table id="tableModulos">
                                <thead>
                                <tr class="table-danger">
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Descrição</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody class="text-center">
                                <?php if ($modulos == null) { ?>
                                    <tr>
                                        <td><input name="id" type="hidden">#</td>
                                        <td><input class="form-control" name="nome" type="text"></td>
                                        <td><input class="form-control" name="descricao" type="text"></td>
                                        <td><span class="deleteRow fa fa-trash text-danger"></span></td>
                                    </tr>
                                <?php } ?>
                                <?php foreach ($modulos as $modulo) { ?>
                                    <tr>
                                        <td><input class="form-control" name="id" value="<?php echo $modulo['idModulo'] ?>" disabled></td>
                                        <td><input class="form-control" name="nome" value="<?php echo $modulo['nomeModulo'] ?>" type="text"></td>
                                        <td><input class="form-control" name="descricao" value="<?php echo $modulo['descricaoModulo'] ?>" type="text"></td>
                                        <td><span class="deleteRow fa fa-trash text-danger"></span></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="mt-4 modal-footer">
                        <a class="btn btn-outline-primary" id="btnFechar" href="cursoMentoriaIndex.php">Cancelar</a>
                        <button type="button" value="<?php echo $requisicao ?>" id="btnSubmit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        $("#addRow").click(function () {
            var table = document.getElementById("tableModulos");
            var row = table.insertRow(-1);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(0);
            var cell3 = row.insertCell(0);
            var cell4 = row.insertCell(0);
            cell4.innerHTML = '<input name="id"  type="hidden">#';
            cell3.innerHTML = '<input class="form-control" name="nome" type="text">';
            cell2.innerHTML = '<input class="form-control" name="descricao"  type="text">';
            cell1.innerHTML = '<span class="deleteRow fa fa-trash text-danger"></span>';

            $(".deleteRow").click(function () {
                event.target.parentElement.parentElement.remove();
            });
        });
        $(".deleteRow").click(function () {
            event.target.parentElement.parentElement.remove();
        });

        $("#btnSubmit").click(function () {
            var idCurso = document.getElementById("idCurso");

            var tipoCurso = "";

            if (document.getElementById("tipoCursoCurso").checked) {
                tipoCurso = "Curso";
            } else if (document.getElementById("tipoCursoMentoria").checked) {
                tipoCurso = "Mentoria";
            }

            var nomeCurso = document.getElementById("nome");
            var imagemCurso = $('#imagem').prop('files')[0];
            var descricaoCurso = document.getElementById("descricao");
            var videoCurso = document.getElementById("video");
            var valorCurso = document.getElementById("valor");
            var table = document.getElementById("tableModulos");
            var table_body = table.getElementsByTagName("tbody");
            var modulos = [];
            var btnSalvar = document.getElementById("btnSubmit");


            for (var i = 1; i < table.rows.length; i++) {
                var trs = table.getElementsByTagName("tr")[i];
                var tdId = trs.cells[0];
                var inputId = tdId.getElementsByTagName('input');
                var id = inputId[0].value;

                var tdName = trs.cells[1];
                var inputName = tdName.getElementsByTagName('input');
                var nome = inputName[0].value;

                var tdDescricao = trs.cells[2];
                var inputDescricao = tdDescricao.getElementsByTagName('input');
                var descricao = inputDescricao[0].value;

                modulos[i - 1] = {"id": id, "nome": nome, "descricao": descricao};
            }

            var curso = {
                "idCurso": idCurso.value,
                "tipoCurso": tipoCurso.value,
                "nome": nomeCurso.value,
                "descricao": descricaoCurso.value,
                "imagem": imagemCurso,
                "video": videoCurso.value,
                "valor": valorCurso.value,
                "modulos": modulos,
                "requisicao": btnSalvar.value
            }

            var formData = new FormData();

            formData.append("idCurso", idCurso.value);
            formData.append("tipo", tipoCurso);
            formData.append("nome", nomeCurso.value);
            formData.append("descricao", descricaoCurso.value);
            formData.append("imagem", imagemCurso);
            formData.append("video", videoCurso.value);
            formData.append("valor", valorCurso.value);
            formData.append("video", videoCurso.value);
            formData.append("modulos", JSON.stringify(modulos));
            formData.append("requisicao", btnSalvar.value);

            $.ajax({
                url: "../../../controller/CursoMentoriaController.php",
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (data) {
                    window.location = $('#btnFechar').attr('href');
                },
                error: function (error) {
                    console.log(error);
                    alert(error.responseText);
                },
            });
        });
    })
</script>
</body>
</html>
