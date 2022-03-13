<?php
require_once __DIR__ . "/../model/dao/CursoMentoriaDAO.php";
require_once __DIR__ . "/../model/CursoMentoria.php";

$dao = new CursoDAO();
$cursos = array();
$cursos = $dao->consultarCursos();
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
<?php include("includes/navbar.php"); ?>
<div class="py-5 text-center text-white h-100 align-items-center d-flex"
     style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, .75), rgba(0, 0, 0, .75)), url(../../public/images/bg.png);  background-position: center center, center center;  background-size: cover, cover;  background-repeat: repeat, repeat;">
    <div class="container py-5">
        <div class="row">
            <div class="mx-auto col-lg-8 col-md-10">
                <h1 class="display-3 mb-4">Cursos</h1>
            </div>
        </div>
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="row">
            <?php foreach ($cursos as $curso): ?>
                <div class="col-md-4 mb-5">
                    <a href="cursoDetalhado.php?idCurso=<?php echo $curso['idCurso']; ?>" class="text-decoration-none">
                        <div class="card"><img class="card-img-top" src="<?php echo '../../public/images/curso/' . $curso['imagemCurso']; ?>" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title text-center text-dark"><?php echo $curso['nomeCurso'] ?></h4>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>