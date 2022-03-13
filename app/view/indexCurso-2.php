<?php
require_once __DIR__ . "/../model/dao/CursoMentoriaDAO.php";
require_once __DIR__ . "/../model/CursoMentoria.php";
require_once __DIR__ . "/../path.php";


if (!isset($_GET['filtro'])) {
    $dao = new CursoMentoriaDAO();
    $cursos = array();
    $cursos = $dao->consultarCursosMentorias();
}
if (isset($_GET['filtro'])) {
    $dao = new CursoMentoriaDAO();
    $curso = array();
    $id = $_GET['filtro'];
    $cursos = $dao->consultarPorTipo($id);
}

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cursos e mentorias - TeachyEdu</title>
    <link rel="icon" sizes="500x500" href="../../public/images/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
          type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
          crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/css/style.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">


    <style>
        @import url(https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,500,600,700,800);

        * {
            font-family: "Open Sans", "Helvetica Neue", Arial, sans-serif;
        }

        .cabecalho {
            height: 60vh;
        }

        .secao {
            padding: 8rem 0;
        }

        .btnLattes {
            border-radius: 300px;
            padding: 1rem 2rem;
            font-weight: 700;
            font-size: 1rem;
            text-transform: uppercase;
        }

        .footer-basic {
            padding: 40px 0;
            background-color: #1E3653;
            color: white;
        }

        .footer-basic ul {
            padding: 0;
            list-style: none;
            text-align: center;
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 0
        }

        .footer-basic li {
            padding: 0 10px
        }

        .footer-basic ul a {
            color: inherit;
            text-decoration: none;
            opacity: .8
        }

        .footer-basic ul a:hover {
            opacity: 1
        }

        .footer-basic .social {
            text-align: center;
            padding-bottom: 25px
        }

        .footer-basic .social > a {
            font-size: 24px;
            width: 50px;
            height: 50px;
            line-height: 50px;
            display: inline-block;
            text-align: center;
            border-radius: 50%;
            border: 1px solid #ccc;
            margin: 0 8px;
            color: inherit;
            opacity: .75
        }

        .footer-basic .social > a:hover {
            opacityelement .
            style: .9
        }

        .footer-basic .copyright {
            margin-top: 15px;
            text-align: center;
            font-size: 13px;
            color: #aaa;
            margin-bottom: 0
        }

        .bordaCartao {
            border-radius: 8px;
        }

        .bordaCartao img {
            border-radius: 8px;
        }


        .project-card::before {
            background-image: linear-gradient(0deg, #000, rgba(0, 0, 0, .8) 25%, rgba(0, 0, 0, .6) 50%, rgba(0, 0, 0, .4) 75%, rgba(0, 0, 0, .2));
            background-position: center;
            content: "";
            border-radius: 8px;
            bottom: 0;
            left: 0;
            position: absolute;
            right: 0;
            top: 0;
        }

        .project-card-content {
            color: white;
            opacity: 1;
            position: absolute;
            bottom: 0;
            margin-left: 1rem;
        }

        .project-card:hover {
            border: none;
            box-shadow: 0 8px 15px 0 rgba(0, 0, 0, 0.5), 0 4px 20px 0 rgba(0, 0, 0, 0.49)!important;
        }

        .font {
            font-weight: bold;
        }

        .filters {
            text-align: center;
            margin-bottom: 2rem;
        }

        .filters * {
            display: inline-block;
        }

        .filters h4 {
            padding: 0.5rem 1rem;
            margin-bottom: 0.25rem;
            border-radius: 2rem;
            min-width: 50px;
            line-height: normal;
            cursor: pointer;
            transition: all 0.1s;
        }

        .filters h4:hover {
            background: #1e3653;
            color: white;
        }
        .filters a {
            text-decoration: none;
            color: #111111;
        }

    </style>
</head>

<body>
<?php include("includes/nav.php"); ?>

<div class="py-5 text-center text-white align-items-center d-flex cabecalho"
     style="background-color: #1E3653;  background-position: center center, center center;  background-size: cover, cover;  background-repeat: repeat, repeat;">
    <div class="container my-auto">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <h1 class="text-center text-uppercase"><strong>cursos e mentorias</strong></h1>
            </div>
        </div>
    </div>
</div>
<div class="secao" style="background: #e9ecef;">
    <div class="d-flex justify-content-center bd-highlight mb-3">
        <div class="filters">
            <a href="indexCurso.php" ><h4>Todos</h4></a>
            <a href="indexCurso.php?filtro=1"><h4>Cursos</h4></a>
            <a href="indexCurso.php?filtro=0"><h4>Mentorias</h4></a>
        </div>
    </div>
    <div class="container">
        <div class="row text-center d-flex justify-content-center">
            <?php if ($cursos != null): ?>
                <?php foreach ($cursos as $curso): ?>
                    <div class="col-md-4 col-sm-12 col-xs-12 mb-5">
                        <a href="cursoDetalhado-2.php?idCurso=<?php echo $curso['idCursoMentoria']; ?>">
                            <div class="card shadow bordaCartao project-card">
                                <img class="card-img-top w-100 d-block" src="<?php echo '../../public/images/curso/' . $curso['imagemCursoMentoria']; ?>">
                                <div class="project-card-content">
                                    <p class="font"><?php echo $curso['nomeCursoMentoria'] ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<div class="text-white bg-dark secao">
    <div class="container text-center">
        <h2 class="mb-4">Conheça o trabalho da professora Patricia!</h2><a class="btn btn-light btnLattes" href="http://lattes.cnpq.br/0989579833207354" target="_blank">Conhecer</a>
    </div>
</div>
<?php include("includes/footer.php"); ?>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="../../public/javascript/javascript.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
</body>

</html>