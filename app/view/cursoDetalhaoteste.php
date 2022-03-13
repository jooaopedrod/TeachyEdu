<?php
require_once __DIR__ . "/../model/dao/CursoMentoriaDAO.php";
require_once __DIR__ . "/../model/CursoMentoria.php";


if (isset($_GET['idCurso'])) {
    $dao = new CursoDAO();
    $curso = array();
    $id = $_GET['idCurso'];
    $curso = $dao->consultarCurso($id);
    $modulos = array();
    $modulos = $dao->consultarModulosCursos($id);
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
          type="text/css">
    <link rel="stylesheet" href="https://static.pingendo.com/bootstrap/bootstrap-4.3.1.css">
</head>

<body>
<nav class="navbar navbar-dark bg-dark">
    <div class="container"><a class="navbar-brand" href="#">
            <i class="fa d-inline fa-lg fa-circle"></i>
            <b> TeachyEdu</b>
        </a></div>
</nav>
<div class="py-5 text-center"
     style="background-image: url('https://static.pingendo.com/cover-bubble-dark.svg');background-size:cover; background-attachment: fixed;">
    <div class="container">
        <div class="row">
            <div class="p-5 mx-auto col-md-8 col-10" style="">
                <i class="fa fa-2x fa-camera-retro"></i>
                <hr class="bg-dark">
                <h3 class=""><?php echo $curso['nomeCurso'] ?></h3>
            </div>
        </div>
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6" style="">
                <h1 class="">Atuação</h1>
                <p class=""><?php echo $curso['descricaoCurso'] ?></p>
            </div>
            <div class="ml-auto col-md-4" style="">
                <div class="card bg-light">
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-7">
                                <h3 class="mb-0">Preço</h3>
                            </div>
                            <div class="text-right">
                                <h2 class="mb-0"><b><?php echo $curso['valorCurso']?></b></h2 class="mb-0">
                            </div>
                        </div>
                        <p class="my-3">I sink under the weight of the splendour of these visions!</p>
                        <a class="btn btn-primary mt-3" href="#">adquira já</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if (!empty($curso['videoApresentacaoCurso'])) : ?>
    <div class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe src="<?php echo $curso['videoApresentacaoCurso']?>" allowfullscreen=""
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                frameborder="0" title="YouTube video player"></iframe>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
<?php endif; ?>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="accordion">
                    <h1 class="text-center mb-4">Módulos</h1>

                    <?php foreach ($modulos as $modulo): ?>
                        <div class="card">
                            <div class="card-header" id="heading">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" data-toggle="collapse"
                                            data-target="#collapse<?php echo $modulo['idModulo'] ?>"
                                            aria-expanded="true"
                                    ><?php echo $modulo['nomeModulo'] ?>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapse<?php echo $modulo['idModulo'] ?>" class="collapse"
                                 data-parent="#accordion">
                                <div class="card-body">
                                    <?php echo $modulo['descricaoModulo'] ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>


                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>
