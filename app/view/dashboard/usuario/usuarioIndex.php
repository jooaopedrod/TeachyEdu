<?php
require_once "../../../model/dao/UsuarioDAO.php";
require_once "../../../model/Usuario.php";
require_once __DIR__ . "/../../../service/LoginFilterService.php";
require_once __DIR__ . "/../../../path.php";

LoginFilterService::filterUserbyRole(0, "/admin.php");

$dao = new UsuarioDAO();
$usuarios = array();
$usuarios = $dao->consutarEditores();


if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $dao->excluirEditor($id);
    header('location: ' . BASE_URL . 'app/view/dashboard/usuario/usuarioIndex.php');
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
    <title>Dashboard | Gerenciar Editor</title>
    <link rel="stylesheet" href="../../../../public/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>

</head>

<body>
<?php include("../../includes/sidebarAdmin.php"); ?>

<div class="py-5">
    <div class="container ">
        <div class="row d-flex justify-content-center">
            <div class="col-md-9">
                <div class="mb-4">
                    <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#modalEditor">Cadastrar novo</a>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead class="text-uppercase" >
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Email</th>
                            <th scope="col">Remover</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($usuarios as $usuario): ?>
                            <tr class="mb-4">
                                <th><?php echo $usuario['idUsuario'] ?></th>
                                <td><?php echo $usuario['nomeUsuario'] ?></td>
                                <td><?php echo $usuario['emailUsuario'] ?></td>
                                <td class="text-center"><a style="text-decoration: none" data-toggle="modal" data-target="#modalUsuarioExcluir" id="<?php echo $usuario['idUsuario'] ?>"
                                       class=" btn btn-danger fa fa-trash usuario_data"></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalEditor">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content rounded-5 shadow">
            <div class="modal-header p-5 pb-4 border-bottom-0">
                <h3 class="fw-bold mb-0">Adicionar novo editor</h3>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-5 pt-0">
                <form method="post" action="../../../controller/UsuarioController.php" enctype="multipart/form-data">
                    <div class="form-group row mb-3">
                        <div class="col-12">
                            <label class="col-2 col-form-label ">Nome</label>
                            <input type="text" class="form-control rounded-4" name="nome" required placeholder="Insira o nome aqui">
                        </div>
                    </div>
                    <div class="form-group row   mb-3">
                        <div class="col-12">
                            <label class="col-2 col-form-label">Email</label>
                            <input type="email" class="form-control rounded-4" name="email" required placeholder="Insira o email aqui">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" name="requisicao" value="preCadastroEditor" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalUsuarioExcluir" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div id="modalContentExcluir" class="modal-content">
        </div>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function () {
        $(document).on('click', '.usuario_data', function () {
            var usuario_id = $(this).attr('id');
            if (usuario_id !== '') {
                $.post('excluirUsuario.php', {'usuario_id': usuario_id}, function (retorna) {
                    $("#modalContentExcluir").html(retorna);
                })
            }

        });
    });
</script>
</body>

</html>