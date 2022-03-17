<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once "../../../model/dao/AgendaDAO.php";
require_once "../../../model/Agenda.php";
require_once __DIR__ . "/../../../service/LoginFilterService.php";
require_once __DIR__ . "/../../../path.php";

LoginFilterService::isLogged();

if (isset($_GET['update_id'])) {
    $id = $_GET['update_id'];
    $dao = new AgendaDAO();
    $agenda = array();
    $agenda = $dao->consultarAgenda($id);
    $id = $agenda['idAgenda'];
    $titulo = $agenda['tituloAgenda'];
    $data = $agenda['dataHoraAgenda'];
    $capa = $agenda['imagemAgenda'];
    $descricao = $agenda['descricaoAgenda'];
    $requisicao = 'atualizarAgenda';
} else {
    $id = '';
    $titulo = '';
    $data = null;
    $capa = '';
    $descricao = '';
    $requisicao = 'cadastrarAgenda';
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
          crossorigin="anonymous">
    <title>Dashboard | Gerenciar Eventos</title>
    <link rel="stylesheet" href="../../../../public/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">

</head>

<body>
<?php include("../../includes/sidebarAdmin.php"); ?>
<?php print_r($_SESSION); ?>

<?php if (!empty($_SESSION['erro_msg'])): ?>
    <div class="container">
        <div class="alert alert-danger" role="alert">
            <?php echo $_SESSION['erro_msg'] ?>
            <?php unset($_SESSION['erro_msg']); ?>
        </div>
    </div>
<?php endif; ?>

<div class="py-5">
    <div class="container">
        <div class="row mb-4 d-flex justify-content-center">
            <div class="col-10">
                <h1>Gerenciar evento</h1>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <form method="post" action="../../../controller/AgendaController.php" enctype="multipart/form-data">
                    <div class="form-group row mb-3">
                        <input type="hidden" name="idAgenda" value="<?php echo $id ?>">
                        <div class="col-10">
                            <label class="col-2 col-form-label labelFont">Título</label>
                            <input type="text" class="form-control rounded-4" name="titulo" required value="<?php echo $titulo; ?>">
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <div class="col-10">
                            <label class="col-2 col-form-label labelFont">Data</label>
                            <input type="datetime-local" name="data" class="form-control" value="<?php echo($data == null ? '' : (date("Y-m-d\TH:i", strtotime($data)))) ?>" required>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <div class="col-10">
                            <label class="col-2 col-form-label labelFont">Capa <img src="../../../../public/images/agenda/<?php echo $capa; ?>" width="50px" alt="">
                            </label>
                            <input type="file" name="imagem" class="form-control form-control-sm" value="<?php echo $capa; ?>" accept="image/png,image/jpeg">
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <div class="col-10">
                            <label class="col-2 col-form-label labelFont">Descrição</label>
                            <textarea class="form-control mb-3" name="descricao" id="descricao" required><?php echo $descricao; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <div class="col-10">
                            <div class="modal-footer">
                                <a class="btn btn-outline-primary" href="agendaIndex.php">Cancelar</a>
                                <button type="submit" name="requisicao" value="<?php echo $requisicao ?>" class="btn btn-primary">Salvar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>
