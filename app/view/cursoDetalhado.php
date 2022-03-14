<?php
require_once __DIR__ . "/../model/dao/CursoMentoriaDAO.php";
require_once __DIR__ . "/../model/CursoMentoria.php";
require_once __DIR__ . "/../path.php";


if (isset($_GET['idCurso'])) {
    $dao = new CursoMentoriaDAO();
    $curso = array();
    $id = $_GET['idCurso'];
    $curso = $dao->consultarCursoMentoriaCompleto($id);
    $modulos = array();
    $modulos = $dao->consultarModulosCursosMentorias($id);

    if (empty($curso)){
        header("location:" . BASE_URL ."app/view/indexCurso.php");
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $curso['nomeCursoMentoria'] ?> - TeachyEdu</title>
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
        @import url('https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        nav {
            font-family: 'Work Sans', sans-serif;
        }

        * {
            font-family: "Open Sans", "Helvetica Neue", Arial, sans-serif;
        }

        .cabecalho {
            height: 650px;
        }

        .secao {
            padding: 5rem 0;
        }

        .btnLattes {
            border-radius: 300px;
            padding: 1rem 2rem;
            font-weight: 700;
            font-size: 1rem;
            text-transform: uppercase;
        }

        .btn:focus, .btn:active:focus, .btn.active:focus {
            outline: 0 none;
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
            opacityelement.style: .9
        }

        .footer-basic .copyright {
            margin-top: 15px;
            text-align: center;
            font-size: 13px;
            color: #aaa;
            margin-bottom: 0
        }

        .noBorder:focus {
            outline: none;
            box-shadow: none;
        }

        .noBorder:active:focus {
            outline: none;
            box-shadow: none;
        }
    </style>
</head>

<body style="background: #e9ecef;">
<?php include("includes/nav.php"); ?>
<div class="py-5 text-center text-white align-items-center d-flex cabecalho"
     style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, .75), rgba(0, 0, 0, .75)), url(<?php echo '../../public/images/curso/' . $curso['imagemCursoMentoria']; ?>);  background-position: center center, center center;  background-size: cover, cover;  background-repeat: repeat, repeat;">
    <div class="container my-auto">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <h1 class="text-center" style="text-align: left;"><strong><?php echo $curso['nomeCursoMentoria'] ?></strong></h1>
            </div>
        </div>
    </div>
</div>
<div class="secao mx-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-4">
                <h2 style="font-weight: 800" class="mb-4 text-uppercase">Descrição</h2>
                <p class=""><?php echo $curso['descricaoCursoMentoria'] ?>.</p>
            </div>
            <div class="col-md-6">
                <div class="card text-dark bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-header text-uppercase">Investimento</div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">R$<?php echo $curso['valorCursoMentoria'] ?><small class="text-muted fw-light"></small></h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>Consultar formas de pagamento disponíveis</li>
                        </ul>
                    </div>
                    <button type="button" class="btn btn-primary noBorder" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        COMPRAR
                    </button>
                </div>
            </div>
        </div>
        <?php if (!empty($curso['videoCursoMentoria'])) : ?>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <?php if (!empty($curso['videoCursoMentoria'])) : ?>
                        <div class="row">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe src="<?php echo $curso['videoCursoMentoria'] ?>" allowfullscreen="" class="embed-responsive-item"></iframe>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<div class="py-5">
    <div class="container align-items-center">
        <div class="row mb-3 text-center">
            <h2 style="font-weight: 800" class="text-uppercase">Módulos</h2>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <div class="accordion" id="accordionExample">
                    <?php foreach ($modulos as $modulo): ?>
                        <div class="accordion-item">
                            <h2 style="font-weight: 400" class="accordion-header" id="heading<?php echo $modulo['idModulo'] ?>">
                                <button class="accordion-button collapsed noBorder" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $modulo['idModulo'] ?>"
                                        aria-expanded="true" aria-controls="collapse<?php echo $modulo['idModulo'] ?>">
                                    <?php echo $modulo['nomeModulo'] ?>
                                </button>
                            </h2>
                            <div id="collapse<?php echo $modulo['idModulo'] ?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo $modulo['idModulo'] ?>"
                                 data-bs-parent="#accordionExample">
                                <div class="accordion-body">
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

<?php include("includes/footer.php"); ?>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tenho interesse</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="../controller/AssinanteController.php" enctype="multipart/form-data">
                    <div class="form-group row mb-3">
                        <div class="col-12 ">
                            <label class="col-2 col-form-label">Nome</label>
                            <input type="text" placeholder="Nome" class="form-control" name="nomeAssinante" required>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <div class="col-12">
                            <label class="col-2 col-form-label">E-mail</label>
                            <input type="email" placeholder="E-mail" class="form-control" name="emailAssinante" required>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <div class="col-12" >
                            <label class="col-form-labe">Telefone</label>
                            <input type="number" placeholder="(__) _ ____-____" class="form-control" name="telefoneAssinante" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" name="aceitoAssinante" required>
                            <label class="form-check-label" for="flexCheckDefault">
                                Ao enviar os dados acima, eu concordo em receber e-mails e mensagens através do WhatsApp da TeachyEdu.
                            </label>
                        </div>
                    </div>
                    <input type="hidden" name="interesseAssinante" value="<?php echo $curso['idCursoMentoria']?>">
                    <div class="modal-footer noBorder justify-content-center">
                        <button type="submit" name="requisicao" value="cadastrarAssinanteCursoMentoria" class="btn btn-primary">Me inscrever</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="../../public/javascript/javascript.js"></script>
</body>
</html>