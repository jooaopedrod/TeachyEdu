<?php
require_once __DIR__ . "/../../service/LoginFilterService.php";
require_once __DIR__ . "/../../path.php";

LoginFilterService::isLogged();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Dashboard | Gerenciar Assinantes</title>
    <link rel="stylesheet" href="../../../public/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
</head>
<style>
    .bordaCartao {
        border-radius: 8px;
    }

    .bordaCartao img {
        border-radius: 8px;
    }
    .project-card:hover {
        box-shadow: 0 8px 15px 0 rgba(0, 0, 0, 0.5), 0 4px 20px 0 rgba(0, 0, 0, 0.49)!important;
    }

    .fonteIcone {
        font-weight: 400 !important;
    }

    .fonteIcone i {
        font-size: xxx-large;
    }

</style>
<body class="bodyFundo">
<?php include("../includes/sidebarAdmin.php"); ?>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-12 col-xs-12 mb-5">
                <a href="cursoMentoria/cursoMentoriaIndex.php">
                    <div class="card project-card shadow rounded">
                        <img class="card-img rounded" src="../../../public/images/fundoBranco.png" alt="Card image">
                        <div class="card-img-overlay d-flex justify-content-center align-items-center">
                            <h4 class="text-primary text-center fonteIcone"><i class="bx bx-pencil"></i><br>Cursos e mentoria</h4>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12 mb-5">
                <a href="usuario/usuarioIndex.php">
                    <div class="card project-card shadow rounded">
                        <img class="card-img rounded" src="../../../public/images/fundoBranco.png" alt="Card image">
                        <div class="card-img-overlay d-flex justify-content-center align-items-center">
                            <h4 class="text-primary text-center fonteIcone"><i class="bx bx-user"></i><br>Editores</h4>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12 mb-5">
                <a href="agenda/agendaIndex.php">
                    <div class="card project-card shadow rounded">
                        <img class="card-img rounded" src="../../../public/images/fundoBranco.png" alt="Card image">
                        <div class="card-img-overlay d-flex justify-content-center align-items-center">
                            <h4 class="text-primary text-center fonteIcone"><i class="bx bx-calendar"></i><br>Eventos</h4>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12 mb-5">
                <a href="assinante/indexAssinante.php">
                    <div class="card project-card shadow rounded">
                        <img class="card-img rounded" src="../../../public/images/fundoBranco.png" alt="Card image">
                        <div class="card-img-overlay d-flex justify-content-center align-items-center ">
                            <h4 class="text-primary text-center fonteIcone"><i class="bx bx-mail-send"></i><br>Leads</h4>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>